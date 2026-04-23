<?php
require_once 'koneksi.php';
// redirectIfNotLoggedIn();
$pageTitle = 'Dashboard';
$isAdmin = isAdmin();

if ($isAdmin) {
    $total_reservasi = $conn->query("SELECT COUNT(*) as c FROM reservasi")->fetch_assoc()['c'];
    $today_count     = $conn->query("SELECT COUNT(*) as c FROM reservasi WHERE tanggal = CURDATE()")->fetch_assoc()['c'];
    $week_count      = $conn->query("SELECT COUNT(*) as c FROM reservasi WHERE WEEK(tanggal) = WEEK(CURDATE())")->fetch_assoc()['c'];
    $total_dokter    = $conn->query("SELECT COUNT(*) as c FROM dokter")->fetch_assoc()['c'];
    $recent = $conn->query("SELECT r.*, d.nama_dokter, d.spesialis, j.hari, j.jam_mulai FROM reservasi r JOIN dokter d ON r.id_dokter = d.id_dokter JOIN jadwal j ON r.id_jadwal = j.id_jadwal ORDER BY r.id_reservasi DESC LIMIT 8");
    $today_res = $conn->query("SELECT r.*, d.nama_dokter, j.hari, j.jam_mulai, j.jam_selesai FROM reservasi r JOIN dokter d ON r.id_dokter = d.id_dokter JOIN jadwal j ON r.id_jadwal = j.id_jadwal WHERE r.tanggal = CURDATE() ORDER BY j.jam_mulai ASC");
    $per_dokter = $conn->query("SELECT d.nama_dokter, d.spesialis, COUNT(r.id_reservasi) as total FROM dokter d LEFT JOIN reservasi r ON d.id_dokter = r.id_dokter GROUP BY d.id_dokter ORDER BY total DESC");
} else {
    $dokter_result = $conn->query("SELECT * FROM dokter LIMIT 3");
}

?>
<?php include 'header-admin.php'; ?>

<section class="page-hero" style="padding:40px 0 30px;">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <div class="section-label" style="color:var(--gold-300);">Panel Admin</div>
                <h1 class="mb-1">Dashboard</h1>
                <p class="text-white-50 mb-0 small">Selamat datang, <strong class="text-white"><?= htmlspecialchars($_SESSION['username'] ?? 'Admin') ?></strong> — <?= date('d F Y') ?></p>
            </div>
            <div class="d-flex gap-2 flex-wrap">
                <a href="biografi-admin.php" class="btn btn-outline-light btn-sm"><i class="bi bi-people me-1"></i>Kelola Dokter</a>
                <a href="reservasi_admin.php" class="btn btn-gold btn-sm"><i class="bi bi-calendar-check me-1"></i>Semua Reservasi</a>
            </div>
        </div>
    </div>
</section>

<section class="py-4">
    <div class="container">
        <div class="row g-3 mb-4">
            <?php
            $stats = [
                ['val'=>$total_reservasi,'label'=>'Total Reservasi','icon'=>'bi-calendar-check','cls'=>'icon-teal'],
                ['val'=>$today_count,'label'=>'Reservasi Hari Ini','icon'=>'bi-calendar-day','cls'=>'icon-gold','border'=>true],
                ['val'=>$week_count,'label'=>'Minggu Ini','icon'=>'bi-calendar-week','cls'=>'icon-teal'],
                ['val'=>$total_dokter,'label'=>'Dokter Aktif','icon'=>'bi-people','cls'=>'icon-gold'],
            ];
            foreach ($stats as $s): ?>
            <div class="col-lg-3 col-md-6">
                <div class="feature-card d-flex align-items-center gap-3 py-3 <?= !empty($s['border']) ? 'border-start border-4' : '' ?>" style="<?= !empty($s['border']) ? 'border-color:var(--gold-500)!important;' : '' ?>">
                    <div class="feature-icon <?= $s['cls'] ?> mb-0 flex-shrink-0"><i class="bi <?= $s['icon'] ?>"></i></div>
                    <div>
                        <div class="stat-number" style="font-size:28px;"><?= $s['val'] ?></div>
                        <div class="small text-muted"><?= $s['label'] ?></div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
</section>