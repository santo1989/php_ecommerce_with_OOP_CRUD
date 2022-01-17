<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <name>Document</name>
</head>

<body> -->



<!-- Bootstrap CSS -->
<div class="row">
  <?php
  include '../vendor/autoload.php';

  use echocrud\Products;

  $product = new Products();
  $products = $product->productindex();
  // print_r($products);
  foreach ($products as $product) { ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <div class="col-md-3" style="margin-top: 10px; margin-bottom: 10px;">
      <div>

        <div class="card round" style="width: 15rem; height: 450px;">
          <img src="../assets/images/product/<?php echo $product['image'] ?>" class="card-img-top" alt="..." height="200" width="200" />
          <div class="card-body">
            <h3 class="card-name"><?php echo $product['name'] ?></h3>
            <h6 class="card-text">Old Price: <?php echo $product['price'] ?> TK</h6>
            <h6 class="card-text">New price: <?php echo number_format($amount = $product['price'] - $product['price'] * 25 / 100, 2); ?> TK</h6>
            <div class="position-absolute top-0 end-0">
              <span class="badge bg-success">-25% off</span>
            </div>
          </div>
          <div>
            &nbsp;&nbsp;&nbsp;
            <!-- <button type="button" class="btn btn-primary" href="">Add to cart</button> -->
            <a href="add_to_cart.php?id=<?php echo $product['id'] ?>" class="btn btn-primary" role="button">Details</a>
          </div>
          <div class="position-absolute bottom-0 end-0">
            <button class="btn btn-outline-secondary">
              <i class="bi bi-heart"></i>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
              </svg>
            </button>
            <button class="btn btn-outline-secondary">
              <i class="bi bi-cart-check"></i>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
                <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
              </svg>
            </button>
          </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      </div>
    </div><?php }
          ?>

</div>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<!-- </body>

</html> -->