<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>categories List</title>
</head>

<body style="background-color:#fff0a8;">
<?php
 include '../../layout/navc.php';
?>

    <?php
    require_once '../../vendor/autoload.php';
    use echocrud\Category;

    $categoryObject = new Category;
    $data = $categoryObject->index();
    $categories = $data['categories'];
    $totalCategory = $data['categories_count'];

    ?>

    <a href="create.php"> <button style="
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            background-color: #4CAF50;">ADD NEW CATEGORY</button></a>


    <?php

    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

    ?>
    <table border="1" cellspacing=5 cellpadding=5 style="width: 470px; margin:0 auto;">
        <thead>
            <tr>
                <td>SL#</td>
                <td>name</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $sl = 0;
            foreach ($categories as $category) {
            ?>
                <tr>
                    <td><?php echo ++$sl ?></td>
                    <td><?php echo $category['name'] ?></td>
                    <td>
                        <!--<a href="show.php?id=<?php echo $category['id'] ?>">Show</a> -->
                        <a href="show.php?id=<?php echo $category['id'] ?>"> <button style="
                            border: none;
                            color: white;
                            padding: 5px 18px;
                            text-align: center;
                            text-decoration: none;
                            display: inline-block;
                            font-size: 16px;
                            margin: 4px 2px;
                            cursor: pointer;
                            background-color: #4CAF50;
                            border-radius: 18px;">Show</button></a>
                        <!-- | <a href="edit.php?id=<?php echo $category['id'] ?>">Edit</a>  -->
                        <a href="edit.php?id=<?php echo $category['id'] ?>"> <button style="
                            border: none;
                            color: white;
                            padding: 5px 18px;
                            text-align: center;
                            text-decoration: none;
                            display: inline-block;
                            font-size: 16px;
                            margin: 4px 2px;
                            cursor: pointer;
                            background-color: #fb7210;
                            border-radius: 18px;">Edit</button></a>
                        <!-- | <a onclick="return confirm('Are you sure want to delete?')" href="destroy.php?id=<?php echo $category['id'] ?>">Delete</a> -->
                        <a onclick="return confirm('Are you sure want to delete?')" href="destroy.php?id=<?php echo $category['id'] ?>"> <button style="
                            border: none;
                            color: white;
                            padding: 5px 18px;
                            text-align: center;
                            text-decoration: none;
                            display: inline-block;
                            font-size: 16px;
                            margin: 4px 2px;
                            cursor: pointer;
                            background-color: #ff0000;
                            border-radius: 18px;">Delete</button></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php
    $totalPages = ceil($totalCategory / Category::PAGINATE_PER_PAGE);
    for ($i = 1; $i <= $totalPages; $i++) { ?>
        <!-- <a href="index.php?page=<?= $i ?>"><?= $i ?></a> -->
        <a href="index.php?page=<?= $i ?>"> <button style="
            border: none;
            color: white;
            padding:5px 18px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            background-color: #4CAF50;
            border-radius: 18px;"><?= $i . '>' ?> </button></a>
    <?php
    }
    ?>
</body>

</html>