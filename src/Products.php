<?php

namespace echocrud;

use PDO;
use PDOException;

class Products
{
    private $conn = '';
    public $name = '';
    public $price = '';
    public $image = '';
    
    public function __construct()
    {
        try {
            // session_start();
            // do what you want……!
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

    public function productindex()
    {
        $sql = 'SELECT * FROM `products`';
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll();
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
        $availableImageTypes = ['png', 'jpg', 'jpeg', 'gif'];
        if(!in_array($uploadImageType, $availableImageTypes)){
            $errors[] = 'Invalid image type';
        }

        //image size validation
        if($imageSize > 1048576){
            $errors[] = 'Invalid image size';
        }

        if (array_key_exists('name', $data) && !empty($data['name'])) {
            $this->name = $data['name'];
        } else {
            $errors[] = 'name required';
        }

        if (array_key_exists('price', $data) && !empty($data['price'])) {
            $this->price = $data['price'];
        } else {
            $errors[] = 'item price required';
        }

        if(count($errors)){
            $_SESSION['errors'] = $errors;
            header('location: '.$_SERVER['HTTP_REFERER']);
        }else{
            $imageName = time().'_'. $originalName;
            $this->image =  $imageName;
            move_uploaded_file($tempName, '../../assets/image/'.$imageName);
            return $this;
        }
    }

    public function store()
    {
        try {
            $query = "INSERT INTO products(name, price,image) VALUES(:name , :price,:image)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array(
                ':name' => $this->name,
                ':price' => $this->price,
                ':image' => $this->image
            ));

            $_SESSION['message'] = 'Successfully Created !';

            header('Location:product.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function catagorieshow($id)
    {
        $sql = 'SELECT * FROM `products` WHERE `category_id` =' . $id;
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll();
    }

    public function show($id)
    {
        $sql = 'SELECT * FROM `products` WHERE id=' . $id;
        $stmt = $this->conn->query($sql);
        return $stmt->fetch();
    }


    public function update($id)
    {
        $query = "UPDATE products SET name=:name, price=:price image=:image where product_id = " . $id;

        $stmt = $this->conn->prepare($query);

        $stmt->execute(array(
            ':name' => $this->name,
            ':price' => $this->price,
            ':image' => $this->image
        ));
        $_SESSION['message'] = 'Successfully Updated !';
        header('Location:product.php');
    }

    public function delete($id)
    {
        $query = "delete from products where product_id=" . $id;
        $stmt = $this->conn->query($query);
        $stmt->execute();

        $_SESSION['message'] = 'Successfully Deleted !';

        header('Location:product.php');
    }
}
