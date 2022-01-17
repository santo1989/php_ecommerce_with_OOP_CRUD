<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<div fixed>
<?php
 include '../../layout/navc.php';
?>
</div>
  <?php
  session_start();
  if (isset($_SESSION['errors'])) {
    foreach ($_SESSION['errors'] as $error) {
      echo $error . '<br>';
    }
    unset($_SESSION['errors']);
  }
  ?>
  <div class="wrapper">
    <div class="title">Add Category</div>
    <form action="store.php" method="POST" enctype="multipart/form-data">
      <div class="field">
        <input name="name" required placeholder="Enter name"><br>
      </div>
      <div class="field">
        <input type="submit" value="Add">
      </div>
    </form>
  </div>
</body>

</html>