<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta
    name="description"
    content="LIFETIVITY - Ayo buat harimu lebih produktif dengan pengelolaan aktivitas yang lebih baik." />
  <title>Home Page</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body class="bg-light">
  <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
    <div class="container">
      <a class="navbar-brand text-primary" href="#">LIFETIVITY</a>
      <button
        class="navbar-toggler ms-auto"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a
              class="nav-link active"
              aria-current="page"
              href="#hero-section">Halaman</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#statistik-kami">Pengguna</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#tentang-kami">Tentang</a>
          </li>
        </ul>
      </div>
      <div class="btn-group ms-3" role="group" aria-label="Basic example">
        <button onclick="window.location.href='./daftar'" type="button" class="btn btn-outline-primary me-2">
          Daftar
        </button>
        <button onclick="window.location.href='./login'" type="button" class="btn btn-outline-primary">Masuk</button>
      </div>
    </div>
  </nav>

  <div
    class="d-flex justify-content-center align-items-center mx-4 vh-100 bg-light"
    id="hero-section">
    <div class="text-center">

      <h1>
        Ayo Buat Harimu Menjadi Lebih <br />Produktif Dengan
        <b class="text-primary">Lifetivity</b>
      </h1>
      <p class="pt-3">
        Mulailah hari Anda dengan perencanaan aktivitas yang terorganisir
        untuk mencapai tujuan lebih baik setiap harinya.
      </p>
      <button onclick="window.location.href='login'" type="button" class="btn btn-primary">Ayo Memulai</button>
    </div>
  </div>
  <?php include 'config/user/statistik_lp.php'; ?>
  <!-- Tentang Section -->
  <section class="pt-5 mt-5 bg-light vh-100" id="tentang-kami">
    <div class="container">
      <h1 class="text-center text-primary mb-5">Tentang Kami</h1>
      <div class="row g-4">
        <!-- Card 1 -->
        <div class="col-md-4">
          <div class="card h-100">
            <img
              src="asset/image/tujuan.jpg"
              class="card-img-top"
              alt="Tentang LIFETIVITY" />
            <div class="card-body">
              <h5 class="card-title text-primary">Apa itu LIFETIVITY?</h5>
              <p class="card-text">
                LIFETIVITY adalah aplikasi yang dirancang untuk membantu Anda
                meningkatkan produktivitas melalui manajemen waktu yang lebih
                baik.
              </p>
            </div>
          </div>
        </div>
        <!-- Card 2 -->
        <div class="col-md-4">
          <div class="card h-100">
            <img
              src="asset/image/team.jpg"
              class="card-img-top"
              alt="Tim Kami" />
            <div class="card-body">
              <h5 class="card-title text-primary">Tim Kami</h5>
              <p class="card-text">
                Kami adalah sekelompok dari Project Based Learning Polibatam yang berkomitmen untuk
                menciptakan solusi digital yang bermanfaat bagi kehidupan
                sehari-hari Anda.
              </p>
            </div>
          </div>
        </div>
        <!-- Card 3 -->
        <div class="col-md-4">
          <div class="card h-100">
            <img
              src="asset/image/misi.jpg"
              class="card-img-top"
              alt="Misi Kami" />
            <div class="card-body">
              <h5 class="card-title text-primary">Misi Kami</h5>
              <p class="card-text">
                Memberikan alat yang mudah digunakan untuk membantu Anda
                meraih tujuan dan menjalani kehidupan yang lebih produktif
                setiap hari.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer class="bg-dark text-white text-center py-3">
    <p>&copy; 2024 LIFETIVITY. All Rights Reserved.</p>
  </footer>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>