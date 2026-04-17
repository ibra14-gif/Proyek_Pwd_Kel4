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
      /* logo */
      .me-2 {
        width: 40px;
        height: 40px;
      }

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
              <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="form.php">Reservasi</a>
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
            DR. Hailey <br> Copeland
          </h1>

          <p class="lead fw-bold" style="color: rgb(36, 23, 217)">
            Cardiologist
          </p>

          <p class="lead">
            Quickly design and customize responsive mobile-first sites with
            Bootstrap, the world’s most popular front-end open source toolkit,
            featuring Sass variables and mixins, responsive grid system,
            extensive prebuilt components, and powerful JavaScript plugins.
          </p>
          <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">
              <a class="text-white text-decoration-none" href="form.php">Reservasi Sekarang</a>
            </button>

          </div>
        </div>
      </div>
    </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

<!-- test -->
 <!-- ini test balasan -->
  <!-- lagi brokk -->