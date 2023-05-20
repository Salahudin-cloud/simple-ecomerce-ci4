<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Manager</title>

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
    <h1> Product Manager Page</h1>
    <p>This is a Product Manager Page to manage product such as input , re stock and more .</p>
    <table class="table table-striped mt-2">
      <thead class="thead table-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Product Name</th>
          <th scope="col">Stock</th>
          <th scope="col">Price</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($products as $product) : ?>
          <?php if ($product->stock <= 0) : ?>
            <tr>
              <th scope="row"><?php echo $i++; ?></th>
              <td><?php echo $product->product_name;  ?></td>
              <td>Sold Out</td>
              <td>IDR.<?php echo $product->price ?></td>
              <td>
                <a href="" class="btn btn-success">Update</a>
                <a href="" class="btn btn-danger">Delete</a>
              </td>
            </tr>
          <?php else : ?>
            <tr>
              <th scope="row"><?php echo $i++; ?></th>
              <td><?php echo $product->product_name;  ?></td>
              <td><?php echo $product->stock; ?></td>
              <td>IDR.<?php echo $product->price; ?></td>
              <td>
                <a href="<?php echo site_url('menu/product_manager/update/product/' . $product->id) ?>" class="btn btn-success">Update</a>
                <a href="<?php echo site_url('menu/product_manager/update/supply/product/' . $product->id) ?>" class="btn btn-primary">Update Stock</a>
                <form action="<?php echo site_url('menu/product_manager/delete/' . $product->id); ?>" method="post" class="d-inline">
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              </td>
            </tr>
          <?php endif; ?>
        <?php endforeach; ?>

      </tbody>
    </table>

  </div>


  <!-- Script JS  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>