<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>My Landing Page</title>

  <!-- own css -->
  <link rel="stylesheet" href="../../assets/css/index.css">

  <!-- Bootstrap 5 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">


</head>

<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand ps-2" href="#">My Shop</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('login'); ?>">Beli</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://wa.me/+6285713803855" target="_blank">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <section class="bg-light py-5">
    <div class="container">
      <section>
        <div class="text-center">
          <h1 class="display-4">Selamat Datang di Toko Kami</h1>
          <p class="lead">Toko usaha kami bergerak di penjualan air minum</p>
          <a href="<?php echo site_url('login'); ?>" class="btn btn-dark btn-lg">Beli Sekarang</a>
        </div>
      </section>
      <section>
        
      </section>
    </div>
  </section>


  <!-- Hero Section -->
  <!-- <section class="bg-light py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h1 class="display-4">Selamat Datang di Toko Kami</h1>
          <p class="lead"></p>
          <a href="" class="btn btn-dark btn-lg">Beli Sekarang</a>
        </div>
        <div class="col-md-6">
          <img src="https://hexahaq.files.wordpress.com/2012/10/sponsorships-82.jpg" alt="Placeholder Image" class="img-fluid">
        </div>
      </div>
    </div>
  </section> -->



  <!-- footer -->
  <!-- <footer>
    <div class="container-fluid bg-dark text-white pt-2">
      <div class="row">
        <div class="col-lg-12 text-center">
          <p>&copy; 2023 My Website. All Rights Reserved.</p>
        </div>
      </div>
    </div>
  </footer> -->




  <!-- Script JS  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>