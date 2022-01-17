<?php
    print_r($_POST);
    require_once '../../vendor/autoload.php';
    use echocrud\Product;
    $productObject = new Product;
    $productObject->setdata($_POST)->store();
