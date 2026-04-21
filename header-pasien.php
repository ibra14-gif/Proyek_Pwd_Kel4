<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Klinik Brifa Medika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="index.php">
                <div class="brand-icon">
                    <i class="bi bi-heart-pulse-fill"></i>
                </div>
                <div>
                    <span class="brand-name">Brifa Medika</span>
                    <span class="brand-sub d-block">Klinik</span>
                </div>
            </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>        
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                <li class="nav-item">
                    <span class="badge bg-green-custom text-white me-2" style="background:var(--green-600)!important;">
                        <i class="bi bi-person-check me-1"></i>Pasien
                    </span>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $currentPage === 'index.php' ? 'active' : '' ?>" href="index.php">
                        <i class="bi bi-house me-1"></i>Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $currentPage === 'biografi-pasien.php' ? 'active' : '' ?>" href="biografi-pasien.php">
                        <i class="bi bi-people me-1"></i>Dokter
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $currentPage === 'form.php' ? 'active' : '' ?>" href="form.php">
                        <i class="bi bi-calendar-plus me-1"></i>Reservasi
                    </a>
                </li>
                <li class="nav-item ms-lg-2">
                    <a class="btn btn-outline-danger btn-sm" href="logout.php">
                        <i class="bi bi-box-arrow-right me-1"></i>Keluar
                    </a>
                </li>                
            </ul>
        </div>    
        </div>
    </nav>
</body>
</html>