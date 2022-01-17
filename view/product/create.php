<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="../../layouts/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php
  require_once '../../vendor/autoload.php';

  use echocrud\Product;

  $productObject = new Product;
  // echo '<pre>';
  $data = $productObject->create();
  $categories = $data['categories'];

  if (isset($_SESSION['errors'])) {
    foreach ($_SESSION['errors'] as $error) {
      echo $error . '<br>';
    }
    unset($_SESSION['errors']);
  }
  ?>
  <a href="index.php"> <button style="
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            background-color: #4CAF50;"> Go To List Page</button></a>

  <div class="wrapper">
    <div class="name"></div>
    <form action="store.php" method="POST" enctype="multipart/form-data">
      <div class="field">
        <select name="category_id">
          <option value="">Select One</option>
          <?php foreach ($categories as $category) { ?>
            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="field">
        <input name="name" required placeholder="Enter Name">
      </div>
      <div class="field">
        <input name="price" placeholder="Enter price">
      </div>
      <div class="field">
        <input type="file" name="image" accept="image/*">
      </div>
      <div class="field">
        <input type="submit" value="ADD PRODUCT">
      </div>
  </div>
  </form>
</body>

</html>