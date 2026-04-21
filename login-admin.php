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
                    <button class="login-tab-btn">
                        <i class="bi bi-person me-2"></i><a href="login.php" style="text-decoration: none; color: inherit;">Sebagai Pasien</a>
                    </button>
                    <button class="login-tab-btn active">
                        <i class="bi bi-shield-lock me-2"></i>Sebagai Admin
                    </button>
                </div>

                <form method="POST">
                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control" required>
                    </div>
                    <div class="mb-4">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-teal btn-lg">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Masuk sebagai Admin
                    </button>
                </form>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>