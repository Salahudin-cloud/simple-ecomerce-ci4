<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Product</title>

  <!-- Bootstrap 5 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

</head>

<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?php echo site_url('/admin'); ?>">Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo site_url('/admin'); ?>">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Menu
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="<?php echo site_url('menu/user_manager'); ?>">User Manager</a></li>
              <li><a class="dropdown-item" href="<?php echo site_url('menu/product_manager'); ?>">Product Manager</a></li>
              <li><a class="dropdown-item" href="<?php echo site_url('menu/resupply_history'); ?>">Resupply History</a></li>
              <li><a class="dropdown-item" href="<?php echo site_url('menu/delivery_manager'); ?>">Delivery Manager</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('/logout'); ?>">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Content -->
  <div class="container mt-3">
    <h1>Update Product</h1>
    <p>This is page update form that handle update product by admin </p>
    <div class="container-fluid">
      <div class="row justify-content-start">
        <div class="col-md-6 col-lg-4 custom-form-width">
          <form action="<?php echo base_url('menu/product_manager/update/product/process/' . $product->id); ?>" method="post">
            <!-- Hidden input field for the _method parameter -->
            <input type="hidden" name="_method" value="PUT">
            <div class="mb-3">
              <label for="" class="form-label">Product Name :</label>
              <input type="text" class="form-control" id="productName" name="productName" value="<?php echo $product->product_name ?>" autocomplete="off">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Stock :</label>
              <input type="number" class="form-control shadow-none" id="stock" name="stock" readonly value="<?php echo $product->stock ?>" autocomplete="off">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Price :</label>
              <input type="text" class="form-control" id="price" name="price" value="<?php echo $product->price ?>" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="<?php echo site_url('menu/product_manager'); ?>" class="btn btn-primary">Back</a>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Script JS  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>