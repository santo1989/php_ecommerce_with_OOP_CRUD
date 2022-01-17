<?php
require_once '../../vendor/autoload.php';

use echocrud\Product;

$productObject = new Product;
$productObject->setData($_POST)->update($_POST['category_id']);
