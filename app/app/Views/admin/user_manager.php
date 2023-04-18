<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Manager</title>

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
    <h1>User Manager</h1>
    <p>This is page to manage user account.</p>
    <div class="container-table pt-3">
      <div class="table-responsive">
        <table class="table  table-striped">
          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Username</th>
              <th>Password</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($users as $user) : ?>
              <?php if ($user->role === "admin") : ?>
                <tr hidden>
                  <th scope="row"><?php echo $i++ ?></th>
                  <td><?php echo $user->username; ?></td>
                  <td><?php echo $user->password; ?></td>
                </tr>
              <?php else : ?>
                <?php $i = 1;  ?>
                <tr>
                  <td data-title="#"><?php echo $i++ ?></td>
                  <td data-title="Username"><?php echo $user->username; ?></td>
                  <td data-title="Password"><?php echo $user->password; ?></td>
                  <td data-title="Action">
                    <a href="<?php echo site_url('menu/user_manager/update_page/' . $user->id); ?>" class="btn btn-success">Update</a>
                    <form action="<?php echo site_url('menu/user_manager/delete/' . $user->id); ?>" method="post" class="d-inline">
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
    </div>
  </div>


  <!-- Script JS  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>