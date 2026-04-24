<?php
require_once 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login-admin.php");
    exit;
}

$id = (int)$_GET['id'];

// AMBIL DATA
$data = $conn->query("SELECT * FROM reservasi WHERE id_reservasi = $id")->fetch_assoc();
$dokter = $conn->query("SELECT * FROM dokter");

// UPDATE
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama_pasien'];
    $nohp = $_POST['no_hp'];
    $id_dokter = $_POST['id_dokter'];
    $tanggal = $_POST['tanggal'];
    $keluhan = $_POST['keluhan'];

    $conn->query("UPDATE reservasi SET 
        nama_pasien='$nama',
        no_hp='$nohp',
        id_dokter='$id_dokter',
        tanggal='$tanggal',
        keluhan='$keluhan'
        WHERE id_reservasi=$id
    ");

    header("Location: reservasi_admin.php");
    exit;
}
?>

<div class="container mt-5">
    <h3>Edit Reservasi</h3>

    <form method="POST">
        <input type="text" name="nama_pasien" value="<?= $data['nama_pasien'] ?>" class="form-control mb-2">
        <input type="text" name="no_hp" value="<?= $data['no_hp'] ?>" class="form-control mb-2">

        <select name="id_dokter" class="form-control mb-2">
            <?php while ($d = $dokter->fetch_assoc()): ?>
                <option value="<?= $d['id_dokter'] ?>" <?= ($d['id_dokter']==$data['id_dokter'])?'selected':'' ?>>
                    <?= $d['nama_dokter'] ?>
                </option>
            <?php endwhile; ?>
        </select>

        <input type="date" name="tanggal" value="<?= $data['tanggal'] ?>" class="form-control mb-2">

        <textarea name="keluhan" class="form-control mb-2"><?= $data['keluhan'] ?></textarea>

        <button class="btn btn-primary">Simpan</button>
    </form>

    <?php include 'footer.php'; ?>
    
</div>