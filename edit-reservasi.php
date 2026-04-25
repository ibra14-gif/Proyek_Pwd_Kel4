<?php
require_once 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login-admin.php");
    exit;
}

$id = (int)$_GET['id'];

// ambil data reservasi
$data = $conn->query("
    SELECT * FROM reservasi WHERE id_reservasi = $id
")->fetch_assoc();

// ambil dokter
$dokter = $conn->query("SELECT * FROM dokter");

// ambil jadwal sesuai dokter saat ini
$jadwal = $conn->query("
    SELECT * FROM jadwal WHERE id_dokter = {$data['id_dokter']}
");

// proses update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama_pasien'];
    $nohp = $_POST['no_hp'];
    $id_dokter = $_POST['id_dokter'];
    $id_jadwal = $_POST['id_jadwal'];
    $tanggal = $_POST['tanggal'];
    $keluhan = $_POST['keluhan'];

    $conn->query("UPDATE reservasi SET 
        nama_pasien='$nama',
        no_hp='$nohp',
        id_dokter='$id_dokter',
        id_jadwal='$id_jadwal',
        tanggal='$tanggal',
        keluhan='$keluhan'
        WHERE id_reservasi=$id
    ");

    header("Location: reservasi-admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Reservasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'header-admin.php'; ?>

<div class="container mt-5">
    <div class="form-box mx-auto" style="max-width:600px;">
        <h4 class="mb-4">Edit Reservasi</h4>
        <form method="POST">

            <label>Nama Pasien</label>
            <input type="text" name="nama_pasien" value="<?= $data['nama_pasien'] ?>" class="form-control mb-3" required>

            <label>No HP</label>
            <input type="text" name="no_hp" value="<?= $data['no_hp'] ?>" class="form-control mb-3" required>

            <label>Dokter</label>
            <select name="id_dokter" id="dokter" class="form-control mb-3">
                <?php while ($d = $dokter->fetch_assoc()): ?>
                    <option value="<?= $d['id_dokter'] ?>" <?= ($d['id_dokter']==$data['id_dokter'])?'selected':'' ?>>
                        <?= $d['nama_dokter'] ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label>Jadwal</label>
            <select name="id_jadwal" id="jadwal" class="form-control mb-3">
                <?php while ($j = $jadwal->fetch_assoc()): ?>
                    <option value="<?= $j['id_jadwal'] ?>" <?= ($j['id_jadwal']==$data['id_jadwal'])?'selected':'' ?>>
                        <?= $j['hari'] ?> (<?= substr($j['jam_mulai'],0,5) ?> - <?= substr($j['jam_selesai'],0,5) ?>)
                    </option>
                <?php endwhile; ?>
            </select>

            <label>Tanggal</label>
            <input type="date" name="tanggal" value="<?= $data['tanggal'] ?>" class="form-control mb-3" required>

            <label>Keluhan</label>
            <textarea name="keluhan" class="form-control mb-3"><?= $data['keluhan'] ?></textarea>

            <button class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>
<br><br>
<?php include 'footer.php'; ?>

<script>
document.getElementById("dokter").addEventListener("change", function() {
    let id_dokter = this.value;

    fetch("ambil_jadwal.php?id_dokter=" + id_dokter)
        .then(res => res.json())
        .then(data => {
            let jadwal = document.getElementById("jadwal");
            jadwal.innerHTML = "";

            data.forEach(function(item) {
                let option = document.createElement("option");
                option.value = item.id_jadwal;
                option.text = item.hari + " (" + item.jam_mulai.substring(0,5) + " - " + item.jam_selesai.substring(0,5) + ")";
                jadwal.appendChild(option);
            });
        });
});
</script>

</body>
</html>