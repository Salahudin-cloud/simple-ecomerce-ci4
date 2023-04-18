<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>User Profile</title>

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
    <h1>User Edit Profile</h1>
    <p>This is a User Edit Profile.</p>
    <div class="container-fluid">
      <div class="row justify-content-start">
        <div class="col-md-6 col-lg-4 custom-form-width">
          <form action="<?php echo site_url('/menu/edit_profile/update/process'); ?>" method="post">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="<?php echo $acc->id; ?>">
            <div class="mb-3">
              <label for="username" class="form-label">Username:</label>
              <input type="text" class="form-control" id="username" name="username" value="<?php echo $acc->username; ?>" autocomplete="off">
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Name:</label>
              <input type="text" class="form-control" id="name" name="name" value="<?php echo $acc->name;  ?>" autocomplete="off">
            </div>
            <div class="mb-3">
              <label for="address" class="form-label">Address:</label>
              <textarea class="form-control" id="address" name="address" rows="4" cols="52" style="resize: none;"><?php echo $acc->address; ?></textarea>
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Phone:</label>
              <input type="textarea" class="form-control" id="phone" name="phone" value="<?php echo $acc->phone; ?>" autocomplete="off">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" value="<?php echo session()->get('password'); ?>" required autocomplete="off">
            </div>
            <button type="submit" class="btn btn-success">update</button>
            <a href="<?php echo site_url('/user'); ?>" class="btn btn-primary">Back</a>
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