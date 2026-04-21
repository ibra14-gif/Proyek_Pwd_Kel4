<?php
require_once 'koneksi.php';

// redirectIfNotLoggedIn();
$dokter_all = $conn->query("SELECT * FROM dokter ORDER BY id_dokter");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biografi Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
<style>
.doctor-card {
    background: var(--white);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    border: 1px solid rgba(0,0,0,.05);
    transition: all .3s ease;
    height: 100%;
    display: flex; flex-direction: column;
}
.doctor-card:hover {
    box-shadow: var(--shadow-lg);
    transform: translateY(-6px);
}

.doctor-card-header {
    background: linear-gradient(135deg, var(--green-800), var(--green-600));
    padding: 28px 24px 20px;
    text-align: center; position: relative;
}
.doctor-avatar {
    display: flex;                /* Menggunakan flexbox untuk mengatur posisi icon */
    align-items: center;          /* Icon tepat di tengah secara vertikal */
    justify-content: center;      /* Icon tepat di tengah secara horizontal */
    margin: 0 auto 15px;          /* Meletakkan avatar di tengah card dan memberi jarak bawah */
    color: #ffffff;               /* Warna icon jadi putih */
    font-size: 2.5rem;            /* Mengatur ukuran icon-nya */
    transition: all 0.3s ease;    /* Efek halus kalau nanti ada hover */
    font-size: 100px;
}

.doctor-name {
    font-family: var(--font-display);
    font-size: 17px; font-weight: 700;
    color: var(--white); margin-bottom: 6px;
}
.doctor-specialist {
    display: inline-block;
    background: rgba(201,162,39,.25);
    border: 1px solid rgba(201,162,39,.4);
    color: var(--gold-300);
    padding: 4px 12px; border-radius: 20px;
    font-size: 12px; font-weight: 500;
}

.doctor-card-body {
    padding: 20px 24px;
    flex: 1; display: flex; flex-direction: column;
}

.schedule-title {
    font-size: 12px; font-weight: 600;
    letter-spacing: 1px; text-transform: uppercase;
    color: var(--neutral-500); margin-bottom: 12px;
}

.schedule-list { list-style: none; padding: 0; margin: 0; }
.schedule-item {
    display: flex; justify-content: space-between; align-items: center;
    padding: 6px 0;
    border-bottom: 1px dashed var(--neutral-300);
    font-size: 13px;
}
.schedule-item:last-child { border-bottom: none; }
.schedule-day { color: var(--neutral-700); font-weight: 500; }
.schedule-time { color: var(--teal-600); font-weight: 600; }
.schedule-closed { color: var(--neutral-300); font-style: italic; }

.btn-green {
    background: var(--green-700) !important;
    color: var(--white) !important;
    border: none; font-weight: 600;
    padding: 10px 100px; 
    border-radius: 8px;
    transition: all .2s;
}
.btn-green:hover {
    background: var(--green-600) !important;
    transform: translateY(-1px);
    box-shadow: var(--shadow-md); 
}
</style>
</head>

<body>
   <?php include 'header-admin.php'; ?> coming soon

    <section class="page-hero py-5" style="background-color:var(--green-500);">
      <div class="container">
          <div class="section-label text-center" style="color:var(--gold-300);">Tim Medis Profesional</div>
          <h1 class="text-center mb-2">Kenali Dokter Kami</h1>
          <p class="text-center mb-0">Dokter-dokter berpengalaman siap melayani kesehatan Anda</p>
      </div>
    </section>

    <!-- Biografi -->
     <section class="py-5">
    <div class="container">
        <div class="row g-4">
            <?php while ($d = $dokter_all->fetch_assoc()):
                $jadwal = $conn->query("SELECT * FROM jadwal WHERE id_dokter = {$d['id_dokter']} ORDER BY FIELD(hari,'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu')");
                $jadwal_rows = $jadwal->fetch_all(MYSQLI_ASSOC);
            ?>
            <div class="col-lg-4 col-md-6">
                <div class="doctor-card">
                    <div class="doctor-card-header">
                        <div class="doctor-avatar"><i class="bi bi-person-circle"></i></div>
                        <div class="doctor-name"><?= htmlspecialchars($d['nama_dokter']) ?></div>
                        <span class="doctor-specialist"><?= htmlspecialchars($d['spesialis']) ?></span>
                    </div>
                    <div class="doctor-card-body">
                        <div class="schedule-title"><i class="bi bi-calendar3 me-1"></i>Jadwal Praktek</div>
                        <ul class="schedule-list">
                            <?php 
                            $seen = []; // deduplicate days
                            foreach ($jadwal_rows as $j):
                                if (in_array($j['hari'], $seen)) continue;
                                $seen[] = $j['hari'];
                            ?>
                            <li class="schedule-item">
                                <span class="schedule-day"><?= $j['hari'] ?></span>
                                <?php if ($j['kuota'] > 0): ?>
                                    <span class="schedule-time"><?= substr($j['jam_mulai'],0,5) ?> – <?= substr($j['jam_selesai'],0,5) ?></span>
                                <?php else: ?>
                                    <span class="schedule-closed">Libur</span>
                                <?php endif; ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
    </section>



    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"
    ></script>
</body>
</html>