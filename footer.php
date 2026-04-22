<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .footer {
    background: var(--green-900);
    padding: 60px 0 32px;
    margin-top: auto;
}
.footer-title {
    color: var(--gold-400);
    font-weight: 600; font-size: 14px;
    letter-spacing: .5px; margin-bottom: 14px;
}
.footer-links { }
.footer-links li { margin-bottom: 8px; }
.footer-links a {
    color: rgba(255,255,255,.6);
    text-decoration: none; font-size: 14px;
    transition: color .2s;
}
.footer-links a:hover { { color: var(--gold-400); }er-radius: 12px;
}
    </style>
</head>
<body>
    <!-- Footer -->
<footer class="footer mt-auto">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="brand-icon small">
                        <i class="bi bi-heart-pulse-fill text-white"></i>
                    </div>
                    <div>
                        <span class="brand-name text-white">Klinik Sehat Bersama</span>
                    </div>
                </div>
                <p class="text-white-50 small">Memberikan pelayanan kesehatan terbaik dengan dokter-dokter berpengalaman dan fasilitas modern.</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h6 class="footer-title">Jam Operasional</h6>
                <ul class="list-unstyled footer-links small">
                    <li class="text-white-50">Senin – Jumat: 08.00 – 20.00</li>
                    <li class="text-white-50">Sabtu: 08.00 – 16.00</li>
                    <li class="text-white-50">Minggu: 09.00 – 13.00</li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h6 class="footer-title">Kontak</h6>
                <ul class="list-unstyled footer-links small">
                    <li class="text-white-50"><i class="bi bi-geo-alt me-2"></i>Jl. Kesehatan No. 1, Yogyakarta</li>
                    <li class="text-white-50"><i class="bi bi-telephone me-2"></i>(0274) 123-4567</li>
                    <li class="text-white-50"><i class="bi bi-envelope me-2"></i>info@kliniksehatbersama.id</li>
                </ul>
            </div>
        </div>
        <hr class="border-secondary mt-4">
        <p class="text-center text-white-50 small mb-0">
            &copy; <?= date('Y') ?> Klinik Sehat Bersama. Hak cipta dilindungi.
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>