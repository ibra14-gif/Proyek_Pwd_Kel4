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
    <?php include 'header-pasien.php'; ?>


    
</body>
</html>