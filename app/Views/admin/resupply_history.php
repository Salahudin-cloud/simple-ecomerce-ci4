<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resupply History Page</title>

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
    <h1>Resupply History Page</h1>
    <p>This is a Resupply History Page , that show history the stock update .</p>
    <div class="table-responsive pt-2">
      <table class="table table-striped table-bordered">
        <thead class="table table-dark align-middle">
          <tr>
            <th scope="col">Date</th>
            <th scope="col">Product Name</th>
            <th scope="col">Quantity</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($resupply as $newSupply) : ?>
            <tr>
              <td><?php echo $newSupply->date; ?></td>
              <td><?php echo $newSupply->product_name; ?></td>
              <td><?php echo $newSupply->quantity; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>


  <!-- Script JS  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>