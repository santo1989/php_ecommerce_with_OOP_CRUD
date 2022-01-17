<?php

namespace echocrud;

use PDO;
use PDOException;

class Product
{
    private $conn = '';
    public $category_id = '';
    public $name = '';
    public $price = '';
    public $image = '';
    const PAGINATE_PER_PAGE = 5;

    public function __construct()
    {
        try {
            session_start();

            $this->conn = new PDO("mysql:host=localhost;dbname=crud_php_project", "root", "");
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo 'Database connected';
        } catch (PDOException $e) {
            // echo 'Failed to connect database';
            echo $e->getMessage();
        }
    }

    public function index()
    {
        $perPage = self::PAGINATE_PER_PAGE;
        if (isset($_GET['page'])) {
            $pageNumber = $_GET['page'];
            $offset = ($pageNumber - 1) * $perPage;
            $sql = "SELECT * FROM `products`  order by id asc limit $perPage OFFSET $offset";
            // echo $offset;
        } else {
            $sql = "SELECT * FROM `products`  order by id asc limit $perPage";
        }
        $stmt = $this->conn->query($sql);

        $countProductSql = "SELECT COUNT(*) as total_product FROM `products`";
        $countProductStmt = $this->conn->query($countProductSql);
        $productCount = $countProductStmt->fetchColumn();

        return [
            'products' => $stmt->fetchAll(),
            'products_count' => $productCount
        ];
    }

    public function create()
    {
        $sql = "SELECT name, id FROM `categories`";
        $stmt = $this->conn->query($sql);
        $categories = $stmt->fetchAll();
        return ['categories' => $categories];
    }

    public function setData(array $data = [])
    {
        $errors = [];

        $tempName = $_FILES['image']['tmp_name'];
        $originalName = $_FILES['image']['name'];
        $imageSize = $_FILES['image']['size'];

        // image type validation
        $explodedArray = explode('.', $originalName);
        $uploadImageType = end($explodedArray);
        $availableImageTypes = ['png', 'jpg', 'jpeg', 'gif', 'JPG'];
        if (!in_array($uploadImageType, $availableImageTypes)) {
            $errors[] = 'Invalid image type';
        }

        //image size validation
        if ($imageSize > 1048576) {
            $errors[] = 'Invalid image size';
        }

        if (array_key_exists('name', $data) && !empty($data['name'])) {
            $this->name = $data['name'];
        } else {
            $errors[] = 'Name required';
        }

        if (array_key_exists('price', $data) && !empty($data['price'])) {
            $this->price = $data['price'];
        } else {
            $errors[] = 'price required';
        }

        if (array_key_exists('category_id', $data) && !empty($data['category_id'])) {
            $this->category_id = $data['category_id'];
        } else {
            // header('location:index.php');
            $errors[] = 'Category_id required';
        }

        if (count($errors)) {
            $_SESSION['errors'] = $errors;
            header('location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            $imageName = time() . '_' . $originalName;
            $this->image =  $imageName;
            move_uploaded_file($tempName, '../../assets/images/product/' . $imageName);
            return $this;
        }
    }

    public function store()
    {

        try {
            $query = "INSERT INTO products(category_id, name, price, image) VALUES(:category_id, :name, :price, :image)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array(
                ':category_id' => $this->category_id,
                ':name' => $this->name,
                ':price' => $this->price,
                ':image' => $this->image,
            ));
            $_SESSION['message'] = 'Successfully Created !';
            header('Location:index.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function show($id)
    {
        $sql = 'SELECT * FROM `products` WHERE id=' . $id;
        $stmt = $this->conn->query($sql);
        return $stmt->fetch();
    }

    public function update($id)
    {
        try {
            $query = "UPDATE products SET name=:name, price=:price, category_id=:category_id, image=:image where id = " . $id;

            $stmt = $this->conn->prepare($query);

            $stmt->execute(array(
                ':name' => $this->name,
                ':category_id' => $this->category_id,
                ':price' => $this->price,
                ':image' => $this->image
            ));
            $_SESSION['message'] = 'Successfully Updated !';
            header('Location:index.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }




    public function delete($id) //permanent delete
    {
        try {
            $sql = 'SELECT * FROM `products` WHERE id=' . $id;
            $stmt = $this->conn->query($sql);
            $product = $stmt->fetch();

            $query = "delete from products where id=" . $id;
            $stmt = $this->conn->query($query);
            $stmt->execute();

            unlink("../../assets/images/" . $product['image']);
            $_SESSION['message'] = 'Successfully Deleted !';
            header('Location:trash.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
