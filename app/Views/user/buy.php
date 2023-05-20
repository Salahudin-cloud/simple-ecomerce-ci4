<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>List Item </title>

  <!-- Bootstrap 5 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

</head>

<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?php echo site_url('/user'); ?>">User Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo site_url('/user'); ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('profile'); ?>">My Profile</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Menu
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="<?php echo site_url('menu/buy'); ?>">Buy</a></li>
              <li><a class="dropdown-item" href="<?php echo site_url('menu/transaction_history'); ?>">Transaction History</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('/logout'); ?>">Logout</a>
          </li>-3
        </ul>
      </div>
    </div>
  </nav>

  <!-- Content -->
  <div class="container mt-3">
    <h1>List Of Item</h1>
    <p>This is a List an Items.</p>
    <?php $i = 1; ?>
    <section>
      <div class="container py-5">
        <div class="row">
          <?php foreach ($products as $product) : ?>
            <?php if ($product->stock <= 0) : ?>
              <div class="col-md-3">
                <div class="card ">
                  <img src="<?php echo base_url() . '/assets/img/bottle-water.jpg' ?>" class="card-img-top" alt="Product 1">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $product->product_name; ?></h5>
                    <p class="card-text">Price: IDR.<?php echo $product->price ?></p>
                    <p class="card-text">Sold Out</p>
                    <a href="#" class="btn btn-success btn-disable">Buy Now</a>
                  </div>
                </div>
              </div>
            <?php else : ?>
              <div class="col-md-3">
                <div class="card ">
                  <img src="<?php echo base_url() . '/assets/img/bottle-water.jpg' ?>" class="card-img-top" alt="Product 1">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $product->product_name; ?></h5>
                    <p class="card-text">Price: IDR.<?php echo $product->price ?></p>
                    <p class="card-text">Available Stock: <?php echo $product->stock ?></p>
                    <a href="<?php echo site_url('buy/menu') ?>" class="btn btn-success">Buy Now</a>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </section>



  </div>


  <!-- Script JS  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>