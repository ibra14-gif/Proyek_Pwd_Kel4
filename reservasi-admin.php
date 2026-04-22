<?php
require_once 'koneksi.php';
// redirectIfNotAdmin();

// HAPUS DATA
if (isset($_GET['hapus'])) {
    $id = (int)$_GET['hapus'];
    $conn->query("DELETE FROM reservasi WHERE id_reservasi = $id");
    header("Location: reservasi_admin.php");
    exit;
}

// AMBIL DATA
$reservasi = $conn->query("
    SELECT r.*, d.nama_dokter, j.hari, j.jam_mulai, j.jam_selesai
    FROM reservasi r
    JOIN dokter d ON r.id_dokter = d.id_dokter
    JOIN jadwal j ON r.id_jadwal = j.id_jadwal
    ORDER BY r.tanggal DESC
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Reservasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'header-admin.php'; ?>

<section class="page-hero">
    <div class="container">
        <div class="section-label text-center" style="color:var(--gold-300);">Panel Admin</div>
        <h1 class="text-center mb-2">Manajemen Reservasi</h1>
        <p class="text-center mb-0">Kelola semua data reservasi pasien klinik</p>
    </div>
</section>

<div class="container mt-5">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No HP</th>
                <th>Dokter</th>
                <th>Jadwal</th>
                <th>Tanggal</th>
                <th>Keluhan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1; while ($r = $reservasi->fetch_assoc()): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($r['nama_pasien']) ?></td>
                <td><?= htmlspecialchars($r['no_hp']) ?></td>
                <td><?= $r['nama_dokter'] ?></td>
                <td>
                    <?= $r['hari'] ?> 
                    (<?= substr($r['jam_mulai'],0,5) ?> - <?= substr($r['jam_selesai'],0,5) ?>)
                </td>
                <td><?= $r['tanggal'] ?></td>
                <td><?= htmlspecialchars($r['keluhan']) ?></td>
                <td>
                    <a href="edit-reservasi.php?id=<?= $r['id_reservasi'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="?hapus=<?= $r['id_reservasi'] ?>" 
                       class="btn btn-sm btn-danger"
                       onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>

</body>
</html>