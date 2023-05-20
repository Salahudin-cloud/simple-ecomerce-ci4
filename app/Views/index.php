<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>My SHOP</title>

  <!-- own css -->
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="<?php echo base_url() . 'assets/css/styles.css' ?>" rel="stylesheet" />


</head>

<body id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="#page-top">My Shop</a>
      <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <!-- navbar -->
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#page-top">Home</a></li>
          <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">About</a></li>
          <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#contact">Contact</a></li>
          <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="<?php echo site_url('menu/buy')?>">Buy Now!</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Masthead-->
  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
      <!-- Masthead Heading-->
      <h1 class="masthead-heading text-uppercase mb-0">Welcome To My Shop</h1>
      <!-- Icon Divider-->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fas fa-shopping-cart"></i></div>
        <div class="divider-custom-line"></div>
      </div>
      <!-- Masthead Subheading-->
      <p class="masthead-subheading font-weight-light mb-0">Find the best mineral water products here!</p>
    </div>
  </header>
  <!-- Product  Section-->
  <section class="page-section portfolio" id="product">
    <div class="container">
      <!-- Portfolio Section Heading-->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Our Product</h2>
      <p class="page-section-sub text-center text-uppercase text-secondary mb-0 pt-3">Discover our latest mineral water products!</p>
      <!-- Product Item Items-->
      <div class="row justify-content-center">


        <?php foreach ($products as $product) : ?>
          <div class="col-md-3">
            <div class="card">
              <img src="<?php echo base_url() . '/assets/img/bottle-water.jpg' ?>" class="card-img-top" alt="Product 1">
              <div class="card-body">
                <h5 class="card-title"><?php echo $product->product_name; ?></h5>
                <p class="card-text">Price: IDR.<?php echo $product->price ?></p>
                <p class="card-text">Available Stock: <?php echo $product->stock ?></p>
                <a href="#" class="btn btn-primary">Buy Now</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
    </div>
  </section>
  <!-- About Section -->
  <section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container">

      <h2 class="page-section-heading text-center text-uppercase text-white">About</h2>

      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
        <div class="divider-custom-line"></div>
      </div>

      <div class="row">
        <div class="col-lg-5 mx-auto">
          <p class="lead">We are a leading provider of high-quality mineral water products. Our commitment is to deliver clean and refreshing drinking water to our customers. With our state-of-the-art filtration and purification processes, we ensure that our water meets the highest quality standards.</p>
          <p class="lead">At our company, we offer a diverse range of products to cater to different needs and preferences. Our product lineup includes:</p>
          <ul class="lead">
            <li>Air Bottles: Convenient and portable water bottles that are perfect for on-the-go hydration.</li>
            <li>Glass Packaged Drinking Water: Water packaged in cardboard boxes containing individual glass cups, providing a sustainable and eco-friendly option.</li>
            <li>Gallon: Large containers of water, suitable for households or offices that require a larger quantity of drinking water.</li>
          </ul>
          <p class="lead">We take pride in delivering products that not only meet the highest standards of quality but also promote sustainable practices. Our commitment to customer satisfaction drives us to constantly innovate and provide the best drinking water options in the market.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section-->
  <section class="page-section portfolio" id="contact">
    <div class="container">

      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contact Me</h2>
      <p class="page-section-sub text-center text-uppercase text-secondary mb-0 pt-3">Find Me In</p>
      <div class="row justify-content-center">

        <div class="col-md-4">
          <div class="card">
            <div class="d-flex align-items-center justify-content-center" style="height: 200px;">
              <img src="<?php echo base_url() . '/assets/img/wa.png' ?>" class="card-img-top rounded-circle" style="width: 150px; height: 150px;" alt="WhatsApp">
            </div>
            <div class="card-body d-flex flex-column align-items-center">
              <h5 class="card-title text-center">WhatsApp</h5>
              <p class="card-text text-center">Contact me via WhatsApp for any inquiries or messages.</p>
              <div class="mt-auto">
                <a href="https://wa.me/6253461723" class="btn btn-primary">Send Message</a>
              </div>
            </div>
          </div>
        </div>


        <div class="col-md-4">
          <div class="card">
            <div class="d-flex align-items-center justify-content-center" style="height: 200px;">
              <img src="<?php echo base_url() . '/assets/img/tele.png' ?>" class="card-img-top rounded-circle" style="width: 150px; height: 150px;" alt="telegram">
            </div>
            <div class="card-body d-flex flex-column align-items-center">
              <h5 class="card-title text-center">Telegram</h5>
              <p class="card-text text-center">Connect with me on Telegram for instant messaging.</p>
              <div class="mt-auto">
                <a href="https://t.me/yourusername" class="btn btn-primary">Send Message</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card">
            <div class="d-flex align-items-center justify-content-center" style="height: 200px;">
              <img src="<?php echo base_url() . '/assets/img/email.png' ?>" class="card-img-top rounded-circle" style="width: 150px; height: 150px;" alt="email">
            </div>
            <div class="card-body d-flex flex-column align-items-center">
              <h5 class="card-title text-center">Email</h5>
              <p class="card-text text-center">Reach out to me via email for any inquiries or collaborations.</p>
              <div class="mt-auto">
                <a href="mailto:youremail@example.com" class="btn btn-primary">Send Message</a>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
  </section>

  <!-- Footer-->
  <footer class="footer text-center">
    <div class="container">
      <div class="row">
        <!-- Footer Location-->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Location</h4>
          <p class="lead mb-0">
            Pinggirejo Wates Magelang
            <br />
            Jalan Banda,No.6
          </p>
        </div>
        <!-- Footer Social Icons-->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Contact Us</h4>
          <a class="btn btn-outline-light btn-social mx-1" href="https://wa.me/6253461723"><i class="fab fa-whatsapp"></i></a>
          <a class="btn btn-outline-light btn-social mx-1" href="https://t.me/yourusername"><i class="fab fa-telegram-plane"></i></i></a>
          <a class="btn btn-outline-light btn-social mx-1" href="mailto:youremail@example.com"><i class="fas fa-envelope"></i></i></a>
        </div>
        <!-- Footer About Text-->
        <div class="col-lg-4">
          <h4 class="text-uppercase mb-4">About Our Store</h4>
          <p class="lead mb-0">
            We are a trusted provider of high-quality mineral water products. Our store is committed to delivering clean and refreshing drinking water to our customers. With advanced filtration and purification processes, we ensure the highest quality standards.
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- Copyright Section-->
  <div class="copyright py-4 text-center text-white">
    <div class="container"><small>Copyright &copy; Your Website 2023</small></div>
  </div>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>
  <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>