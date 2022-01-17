<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <name>Show Product</name>
</head>

<body>

    <?php
    require_once '../../vendor/autoload.php';

    use echocrud\Product;

    $productObject = new Product;
    $product = $productObject->show($_GET['id']);
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

    <p>Name: <?php echo $product['name'] ?></p>
    <p>price: <?php echo $product['price'] ?></p>
    <img src="../../assets/images/<?php echo $product['image'] ?>" alt="">


</body>

</html>