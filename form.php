<?php
include 'koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM dokter");

$query_jadwal = mysqli_query($conn, "
    SELECT jadwal.*, dokter.nama_dokter 
    FROM jadwal
    JOIN dokter ON jadwal.id_dokter = dokter.id_dokter
");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
    <style>
    .me-2 {
        width: 40px;
        height: 40px;
      }

    .custom-navbar {
        background-color: rgb(108, 217, 175);
      }

    </style>
    <title>Form Page</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg custom-navbar py-3">
      <div class="container-fluid px-5">
        <a class="navbar-brand d-flex align-items-center" href="index.php">
          <img src="assets/LogoRS.avif" alt="Logo" class="me-2" />
          <div class="brand-text fw-bold">Primary Hospital</div>
        </a>

        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto fw-bold">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="form.php">Reservasi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="biografi.php">Biografi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="biograph.php">About Us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container mt-5">
        <h2 class="mb-4">Reservasi</h2>
        <form action="landing.php" method="POST">

        <label>Nama Pasien</label>
        <input type="text" name="nama_pasien" required>

        <label>No HP</label>
        <input type="text" name="no_hp" required>

        <label>Pilih Dokter</label>
        <select name="id_dokter" required>
            <option value="">-- Pilih Dokter --</option>
            <?php while($data = mysqli_fetch_assoc($query)) { ?>
                <option value="<?= $data['id_dokter']; ?>">
                    <?= $data['nama_dokter']; ?> - <?= $data['spesialis']; ?>
                </option>
            <?php } ?>
        </select>

        <label>Pilih Jadwal</label>
        <select name="id_jadwal">
          <!-- dari database -->
        </select>

        <label>Tanggal</label>
        <input type="date" name="tanggal" required>

        <label>Keluhan</label>
        <textarea name="keluhan"></textarea>

        <button type="submit">Booking</button>

      </form>

    </div>

    
</body>
</html>