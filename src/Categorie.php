<?php

namespace echocrud;

use PDO;
use PDOException;

class Categorie
{
    private $conn = '';
    public $name = '';
    public $cost = '';

    public function __construct()
    {
        try {
            // session_start();

            $this->conn = new PDO("mysql:host=localhost;dbname=crud_php_project", "root", "");
            // set the PDO error mode to exception
            $this->conn->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
            // echo 'Database connected';
        } catch (PDOException $e) {
            // echo 'Failed to connect database';
            echo $e->getMessage();
        }
    }

    public function index()
    {
        $sql = 'SELECT * FROM `categories`';
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll();
    }

    public function setData(array $data = [])
    {

        $errors = [];

        if (array_key_exists('name', $data)) {
            $this->name = $data['name'];
        } else {
            $errors[] = 'name required';
        }

        if (count($errors)) {
            $_SESSION['errors'] = $errors;
            header('location: create.php');
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
            ':name' => $this->name,
        ));
        $_SESSION['message'] = 'Successfully Updated !';
        header('Location:index.php');
    }

    public function delete($id)
    {
        $query = "delete from categories where id=" . $id;
        $stmt = $this->conn->query($query);
        $stmt->execute();

        $_SESSION['message'] = 'Successfully Deleted !';

        header('Location:index.php');
    }
}
