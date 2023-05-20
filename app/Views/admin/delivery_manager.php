<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delivery Manager</title>

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
    <h1>Delivery Manager Page</h1>
    <p>This is a Delivery Manager Page to manage delivery process has been sent or not .</p>
    <div class="table-responsive pt-2">
      <table class="table table-striped table-bordered">
        <thead class="table table-dark align-middle">
          <tr>
            <th scope="col">Date</th>
            <th scope="col">Address</th>
            <th scope="col">Person Name</th>
            <th scope="col">Phone Number</th>
            <th scope="col">No Reg </th>
            <th scope="col">Product Name </th>
            <th scope="col">Quantity </th>
            <th scope="col">Total </th>
            <th scope="col">Status </th>
            <th scope="col"> Update Delivery Status</th>
          </tr>
        </thead>
        <tbody>

          <?php foreach ($deliveryData as $data) : ?>
            <tr>
              <td><?php echo $data->delivery_date;  ?></td>
              <td><?php echo $data->delivery_address;  ?></td>
              <td><?php echo $data->delivery_person; ?></td>
              <td><?php echo $data->phone_person; ?></td>
              <td><?php echo $data->noreg; ?></td>
              <td><?php echo $data->product_name; ?></td>
              <td><?php echo $data->quantity; ?></td>
              <td><?php echo $data->total; ?></td>
              <td><?php echo $data->status; ?></td>
              <td>
                <form action="<?php echo site_url('menu/delivery_manager/status/update'); ?>" method="post">
                  <input type="hidden" name="noreg" value="<?php echo $data->noreg; ?>">
                  <input type="hidden" name="status" value="Has been Sent">
                  <button type="submit" class="btn btn-success">Sent</button>
                </form>
                <form action="<?php echo site_url('menu/delivery_manager/status/update'); ?>" method="post">
                  <input type="hidden" name="noreg" value="<?php echo $data->noreg; ?>">
                  <input type="hidden" name="status" value="Done">
                  <button type="submit" class="btn btn-primary">Done</button>
                </form>
              </td>
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