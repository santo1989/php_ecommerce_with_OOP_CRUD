<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="../../layouts/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Product</title>
</head>

<body>

  <?php
  require_once '../../vendor/autoload.php';

  use echocrud\Product;

  $productObject = new Product;
  $product = $productObject->show($_GET['id']);
  $data = $productObject->create();
  $categories = $data['categories'];

  if (isset($_SESSION['errors'])) {
    foreach ($_SESSION['errors'] as $error) {
      echo $error . '<br>';
    }
    unset($_SESSION['errors']);
  }
  ?>
  <div class="wrapper">
    <div class="name">Edit Product</div>
    <form action="update.php" method="POST" enctype="multipart/form-data">
      <div class="field">
        <select name="category_id">
          <option value="">Select One</option>
          <?php foreach ($categories as $category) { ?>
            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="field">
        <input name="name" value="<?php echo $product['name'] ?>" required placeholder="Enter Name"><br>
      </div>
      <div class="field">
        <input name="price" value="<?php echo $product['price'] ?>" placeholder="price"><br>
      </div>
      <div class="field">
        <input type="file" name="image" accept="image/*"><br>
      </div>
      <div class="field">
        <input type="submit" value="Update">
      </div>
    </form>
  </div>
</body>

</html>