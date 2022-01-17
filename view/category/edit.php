<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet"  href="../../assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <titl>Edit Category</titl>
</head>

<body>

  <?php
  require_once '../../vendor/autoload.php';

  use echocrud\Category;

  $categoryObject = new Category;
  $category = $categoryObject->show($_GET['id']);

  if (isset($_SESSION['errors'])) {
    foreach ($_SESSION['errors'] as $error) {
      echo $error . '<br>';
    }
    unset($_SESSION['errors']);
  }
  ?>
  <div class="wrapper">
    <div class="name">Edit Category</div>
    <form action="update.php" method="POST" enctype="multipart/form-data">
      <div class="field">
        <input type="hidden" name="categories_id" value="<?php echo $category['id'] ?>">
      </div>
      <div class="field">
        <input name="name" value="<?php echo $category['name'] ?>" required placeholder="Enter name"><br>
      </div>
      <div class="field">
        <input type="submit" value="Update">
      </div>
    </form>
  </div>
</body>

</html>