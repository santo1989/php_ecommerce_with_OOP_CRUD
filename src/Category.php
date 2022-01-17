<?php

namespace echocrud;

use PDO;
use PDOException;

class Category
{
    private $conn = '';
    public $name = '';
    public $price = '';
    public $image = '';
    const PAGINATE_PER_PAGE = 5;

    public function __construct()
    {
        try {
            session_start();
            $this->conn = new PDO("mysql:host=localhost;dbname=crud_php_project", "root", "");
            $this->conn->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function index()
    {
        $perPage = self::PAGINATE_PER_PAGE;
        if (isset($_GET['page'])) {
            $pageNumber = $_GET['page'];
            $offset = ($pageNumber - 1) * $perPage;
            $sql = "SELECT * FROM `categories`  order by id asc limit $perPage OFFSET $offset";
        } else {
            $sql = "SELECT * FROM `categories`  order by id asc limit $perPage";
        }
        $stmt = $this->conn->query($sql);

        $countCategorySql = "SELECT COUNT(*) as total_category FROM `categories`";
        $countCategoryStmt = $this->conn->query($countCategorySql);
        $categoryCount = $countCategoryStmt->fetchColumn();

        return [
            'categories' => $stmt->fetchAll(),
            'categories_count' => $categoryCount
        ];
    }
    public function setData(array $data = [])
    {
        $errors = [];

        if (array_key_exists('name', $data) && !empty($data['name'])) {
            $this->name = $data['name'];
        } else {
            $errors[] = 'name required';
        }


        if (count($errors)) {
            $_SESSION['errors'] = $errors;
            header('location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            return $this;
        }
    }
    public function store()
    {
        try {
            $query = "INSERT INTO categories(name) VALUES(:name)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array(
                ':name' => $this->name,
            ));
            $_SESSION['message'] = 'Successfully Created !';

            header('Location:index.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function show($id)
    {
        $sql = 'SELECT * FROM `categories` WHERE id=' . $id;
        $stmt = $this->conn->query($sql);
        return $stmt->fetch();
    }
    public function update($id)
    {
        $query = "UPDATE categories SET name=:name where id = " . $id;
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array(
            ':name' => $this->name
        ));
        $_SESSION['message'] = 'Successfully Updated !';
        header('Location:index.php');
    }

    public function delete($id)
    {
        try {
            $sql = 'SELECT * FROM `categories` WHERE id=' . $id;
            $stmt = $this->conn->query($sql);
            $category = $stmt->fetch();

            $query = "delete from categories where id=" . $id;
            $stmt = $this->conn->query($query);
            $stmt->execute();
            header('Location:index.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
