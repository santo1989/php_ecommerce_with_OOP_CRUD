<?php
    print_r($_POST);
    require_once '../../vendor/autoload.php';
    use echocrud\Category;
    $categoryObject = new Category;
    $categoryObject->setdata($_POST)->store();
