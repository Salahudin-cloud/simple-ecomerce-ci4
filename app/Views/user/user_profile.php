<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>User Manager</title>

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
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Content -->
  <div class="container mt-3">
    <h1>User Profile</h1>
    <p>This is a User Profile.</p>
    <p>Username : <?php echo session()->get('username'); ?></p>
    <p>Name : <?php echo session()->get('name'); ?></p>
    <p>Address : <?php echo session()->get('address'); ?></p>
    <p>Phone : <?php echo session()->get('phone'); ?></p>
    <p>Password : <?php echo session()->get('password'); ?></p>
    <a href="<?php echo site_url('menu/edit_profile'); ?>" class="btn btn-success">Edit Profile</a>
  </div>


  <!-- Script JS  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>