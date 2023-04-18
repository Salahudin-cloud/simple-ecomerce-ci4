<?php
date_default_timezone_set('Asia/Jakarta');
$no_reg_string = '';
$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';

for ($i = 0; $i < 8; $i++) {
  $index = rand(0, strlen($characters) - 1);
  $no_reg_string .= $characters[$index];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buy Menu</title>
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
    <h1>Buy Page</h1>
    <p>This is a Buy Page.</p>
    <div class="container-fluid">
      <div class="row justify-content-start">
        <div class="col-md-6 col-lg-4 custom-form-width">
          <form action="<?php echo site_url('buy/item'); ?>" method="post">

            <input type="hidden" class="form-control " id="username" name="username" value="<?php echo session()->get('username'); ?>">


            <div class="mb-3">
              <label for="noReg" class="form-label">No Reg :</label>
              <input type="text" class="form-control shadow-none" id="noReg" readonly name="noReg" value="<?php echo $no_reg_string; ?>">
            </div>

            <div class="mb-3">
              <label for="date" class="form-label">Date :</label>
              <input type="text" class="form-control shadow-none" id="date" readonly name="date" value="<?php echo date("Y/m/d h:i:s A") ?>">
            </div>

            <div class="mb-3">
              <label for="personName" class="form-label">Person Name :</label>
              <input type="text" class="form-control " id="personName" name="personName" value="<?php echo session()->get('name'); ?>">
            </div>

            <div class="mb-3">
              <label for="phoneNumberUser" class="form-label">Phone Number :</label>
              <input type="text" class="form-control" id="phoneNumberUser" name="phoneNumberUser" value="<?php echo session()->get('phone'); ?>">
            </div>


            <div class="mb-3">
              <label for="address">Address</label>
              <textarea class="form-control shadow-none" style="resize: none;" id="address" rows="3" name="address"><?php echo session()->get('address'); ?></textarea>
            </div>


            <div class="mb-3">
              <label for="product-name" class="form-label">Product Name:</label>
              <select class="form-select" id="product-name" name="product-name">
                <?php foreach ($products as $product) : ?>
                  <option value="<?= $product->id ?>"><?= $product->product_name ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="mb-3">
              <label for="price" class="form-label">Price Product :</label>
              <input type="text" class="form-control shadow-none" id="price" name="price" value="" readonly>
            </div>


            <div class="mb-3">
              <label for="quantity" class="form-label">Quantity :</label>
              <input type="text" class="form-control" id="quantity" onchange="totalPrice()" min="1" name="quantity" value="" autocomplete="off">
            </div>

            <div class="mb-3">
              <label for="total" class="form-label">Total :</label>
              <input type="number" class="form-control shadow-none" placeholder="IDR." id="total" name="total" value="" readonly>
            </div>

            <button type="submit" class="btn btn-success">Buy</button>
            <a href="<?php echo site_url('menu/buy'); ?>" class="btn btn-primary">Back</a>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Get the product dropdown element
    const productDropdown = document.getElementById("product-name");

    let productDropdownValue = productDropdown.value;

    // Add an event listener to the product dropdown element to fetch the price
    productDropdown.addEventListener("change", () => {
      // Get the selected product ID
      const selectedProductId = productDropdown.value;

      const newSelectedProductId = productDropdown.value;


      // Fetch the price from the server
      fetch(`http://localhost/uas-app/public/get-price/${selectedProductId}`)
        .then(response => response.json())
        .then(data => {
          document.getElementById("price").value = data.price;
          if (newSelectedProductId != productDropdownValue) {
            totalPrice()
          }

          if (productDropdownValue == 1) {
            totalPrice()
          }
        })
        .catch(error => {
          // Handle errors
          console.error(error);
        });
    });

    //fetch when first load page
    fetch(`http://localhost/uas-app/public/get-price/1`)
      .then(response => response.json())
      .then(data => {
        document.getElementById("price").value = data.price;
      })
      .catch(error => {
        // Handle errors
        console.error(error);
      });


    //count total product 
    function totalPrice() {
      const quantity = document.getElementById("quantity").value
      const price = document.getElementById("price").value

      priceTotal = parseInt(quantity) * parseInt(price)

      document.getElementById("total").value = priceTotal;

    }
  </script>



  <!-- Script JS  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>