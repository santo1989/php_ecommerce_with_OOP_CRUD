<?php
require_once '../../vendor/autoload.php';
use echocrud\Category;

$categoryObject = new Category;
$categoryObject->setData($_POST)->update($_POST['categories_id']);
