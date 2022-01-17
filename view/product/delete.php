<?php
require_once '../../vendor/autoload.php';
use echocrud\Product;

$productObject = new Product;
$productObject->delete($_GET['id']);
