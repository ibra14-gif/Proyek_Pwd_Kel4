<?php
require_once 'koneksi.php';

// Cegah akses langsung tanpa POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: form.php");
    exit;
}

// Ambil data dari form
$nama       = $_POST['nama_pasien'] ?? '';
$no_hp      = $_POST['no_hp'] ?? '';
$id_dokter  = (int)($_POST['id_dokter'] ?? 0);
$id_jadwal  = (int)($_POST['id_jadwal'] ?? 0);
$tanggal    = $_POST['tanggal'] ?? '';
$keluhan    = $_POST['keluhan'] ?? '';

// Ambil data dokter
$dokter = $conn->query("SELECT nama_dokter FROM dokter WHERE id_dokter = $id_dokter")->fetch_assoc();

// Ambil data jadwal
$jadwal = $conn->query("SELECT hari, jam_mulai, jam_selesai, kuota FROM jadwal WHERE id_jadwal = $id_jadwal")->fetch_assoc();

// Simpan ke database
$success = false;
$error = '';

if ($id_dokter && $id_jadwal && $nama && $no_hp && $tanggal && $keluhan) {

    // Cek kuota dulu
    if ($jadwal && $jadwal['kuota'] > 0) {

        $query = "INSERT INTO reservasi 
            (id_dokter, id_jadwal, nama_pasien, no_hp, tanggal, keluhan)
            VALUES 
            ('$id_dokter', '$id_jadwal', '$nama', '$no_hp', '$tanggal', '$keluhan')";

        if ($conn->query($query)) {

            // Kurangi kuota
            $conn->query("UPDATE jadwal SET kuota = kuota - 1 WHERE id_jadwal = $id_jadwal");

            $success = true;

        } else {
            $error = "Gagal menyimpan data: " . $conn->error;
        }

    } else {
        $error = "Kuota jadwal sudah habis.";
    }

} else {
    $error = "Data tidak lengkap.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Reservasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="card shadow p-4">

        <?php if ($success): ?>

            <h3 class="text-success mb-4">✅ Reservasi Berhasil!</h3>

            <p><strong>Nama:</strong> <?= htmlspecialchars($nama) ?></p>
            <p><strong>No HP:</strong> <?= htmlspecialchars($no_hp) ?></p>
            <p><strong>Dokter:</strong> <?= htmlspecialchars($dokter['nama_dokter'] ?? '-') ?></p>

            <p><strong>Jadwal:</strong> 
                <?= htmlspecialchars($jadwal['hari'] ?? '-') ?> 
                (<?= substr($jadwal['jam_mulai'] ?? '',0,5) ?> - <?= substr($jadwal['jam_selesai'] ?? '',0,5) ?>)
            </p>

            <p><strong>Tanggal:</strong> <?= htmlspecialchars($tanggal) ?></p>
            <p><strong>Keluhan:</strong> <?= htmlspecialchars($keluhan) ?></p>

            <a href="index.php" class="btn btn-primary mt-3">Kembali ke Beranda</a>

        <?php else: ?>

            <h3 class="text-danger mb-3">❌ Gagal</h3>
            <p><?= htmlspecialchars($error) ?></p>

            <a href="form.php" class="btn btn-secondary mt-3">Kembali ke Form</a>

        <?php endif; ?>

    </div>

</div>

</body>
</html>