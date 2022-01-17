<?php
require_once '../../vendor/autoload.php';
use echocrud\Category;

$categoryObject = new Category;
$categoryObject->delete($_GET['id']);
