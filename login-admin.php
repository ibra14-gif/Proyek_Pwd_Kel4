<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Klinik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-page">
        <div class="login-box">
            <div class="login-header">
                <h4>Klinik Brifa Medika</h4>
                <p>Silahkan masuk untuk melanjutkan</p>
            </div>
            <div class="login-body">
                <div class="d-flex gap-2 mb-4">
                    <a href="login.php" class="login-tab-btn d-flex align-items-center justify-content-center">
                        <i class="bi bi-person me-2"></i> Sebagai Pasien
                    </a>
                    <a href="login-admin.php" class="login-tab-btn active d-flex align-items-center justify-content-center">
                        <i class="bi bi-shield-lock me-2"></i> Sebagai Admin
                    </a>
                </div>

            <div id="panelAdmin" >
                <form method="POST" action="proses-login.php">
                    <input type="hidden" name="mode" value="admin">
                    <div class="mb-3">
                        <label class="form-label">Username Admin</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                            <input type="text" class="form-control" name="username"
                                placeholder="Masukkan username" required
                                value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Kata Sandi</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" class="form-control" name="password"
                                placeholder="Masukkan kata sandi" required id="pwInput">
                            <button class="btn btn-outline-secondary" type="button" onclick="togglePw()">
                                <i class="bi bi-eye" id="pwEye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-teal btn-lg">
                            <i class="bi bi-shield-check me-2"></i>Login Admin
                        </button>
                    </div>
                </form>
                <p class="text-center text-muted small mt-3 mb-0">
                    <i class="bi bi-info-circle me-1"></i>Akses khusus untuk pengelola klinik
                </p>
            </div>
            </div>
        </div>
    </div>
<script>
function togglePw() {
    const pw = document.getElementById('pwInput');
    const eye = document.getElementById('pwEye');
    if (pw.type === 'password') {
        pw.type = 'text'; eye.className = 'bi bi-eye-slash';
    } else {
        pw.type = 'password'; eye.className = 'bi bi-eye';
    }
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>