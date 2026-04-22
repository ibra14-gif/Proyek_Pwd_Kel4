<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Klink Sehat</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
    <style>
      .custom-navbar {
        background-color: rgb(108, 217, 175);
      }

      .col-lg-6 h1 {
        color: rgb(108, 217, 175);
      }

      .hero-bg {
        background-image: linear-gradient(
      rgba(100, 100, 100, 0.7), 
      rgba(100, 100, 100, 0.7)
    ), url("assets/Baground-Index.png");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh;
        display: flex;

      }
    </style>
  </head>
  <body>
    <?php include 'header-pasien.php'; ?>

    <div class="hero-bg">
    <div class="container col-xxl-8 px-4 py-5">
      <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
          <img
            src="assets/orang.png"
            class="d-block mx-lg-auto img-fluid"
            alt="Bootstrap Themes"
            width="300"
            height="600"
            loading="lazy"
          />
        </div>

        <div class="col-lg-6">
          <h1 class="display-5 fw-bold lh-1 mb-3">
            Brifa <br> Medika
          </h1>

          <p class="lead fw-bold" style="color: rgb(36, 23, 217)">
            Melayani dengan Sepenuh Hati.
          </p>

          <p class="lead">
            Klinik Brifa Medika hadir dengan tim dokter spesialis berpengalaman dan fasilitas modern untuk memberikan layanan kesehatan terbaik bagi Anda dan keluarga.
          </p>
          <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">
              <a class="text-white text-decoration-none" href="form.php">Buat Reservasi</a>
            </button>

          </div>
        </div>
      </div>
    </div>
    </div>

    <?php include 'footer.php'; ?>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"
    ></script>
  </body>
</html>