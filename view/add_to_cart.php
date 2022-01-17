<?php include '..\layout\nav.php'; ?>

<?php


?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>
<?php
include '../vendor/autoload.php';

use echocrud\Products;

$Object = new Products;
$product = $Object->show($_GET['id']);
// print_r($product);
?>

<body>
    <div class="container">
        <div class="p-2">
            <nav class="--bs-breadcrumb-devider: '>';" aria-level="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">Add-to-cart</li>
                </ol>
            </nav>
        </div>
        <br>
        <div class="row">
            <div class="col-6 text-center">
                <img src="../assets/images/product/<?php echo $product['image'] ?>" alt="" height="200" width="200">
            </div>
            <div class="col-6">
                <div class="row">
                    <div>
                        <h4>
                            <p class="text-warning"><?php echo $product['name'] ?></p>
                        </h4>
                    </div>
                    <div>
                        <h5>Description</h5>


                    </div>
                    <div class="col-8">
                        <h4> New price: <?php echo number_format($amount = $product['price'] - $product['price'] * 25 / 100, 2); ?> TK</h4>
                        <p><del class="text-denger"><?php echo number_format($product['price'] * 25 / 100, 2); ?></del>
                            <span class="badge bg-danger">Save Off</span>
                        </p>
                        <h6>QUANTITY</h6>
                        <div>
                            <button class="btn btn-group btn btn-secondary">-</button>
                            <button disabled class="btn btn-group">1
                            </button>
                            <button class="btn btn-group btn btn-secondary">+</button><br><br>
                            <a href="invoice.php?id=<?php echo $product['id'] ?>"><button class="btn btn-warning">ADD to Cart</button></a>
                            <button class="btn btn-warning">Buy Now</button>
                        </div>
                    </div><br>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">More Details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Ratings</button>
                        </li>
                    </ul>
                    <hr>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <ul>
                                <p>
                                    1. BrandApple<br>
                                    2. Memory Storage Capacity 128 GB<br>
                                    3. 6.7-inch (17 cm diagonal)<br>
                                    4. Super Retina XDR display<br>
                                    5. Ceramic Shield, tougher than any smartphone glass<br>
                                    6. A14 Bionic chip, the fastest chip ever in a smartphone<br>
                                    7. Pro camera system with 12MP Ultra Wide, Wide and Telephoto<br> cameras; 5x optical zoom range; Night mode, Deep Fusion,<br> Smart HDR 3, Apple ProRAW, 4K Dolby Vision HDR recording<br>
                                </p>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <ul>
                                <li>LiDAR Scanner for improved AR experiences, Night mode portraits</li>
                                <li>12MP TrueDepth front camera with Night mode, 4K Dolby Vision HDR recording</li>
                                <li>Industry-leading IP68 water resistance</li>
                                <li>Supports MagSafe accessories for easy attach and faster wireless charging</li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <ul>
                                <h1>No Ratings Abailable</h1>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>