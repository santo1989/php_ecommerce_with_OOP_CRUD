<?php include '..\layout\nav.php'; ?>
<?php
include '../vendor/autoload.php';

use echocrud\Products;

$Object = new Products;
$product = $Object->show($_GET['id']);
// print_r($product);
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <name>ECHO BAZAR</name>
</head>

<body>
    <div class="container">
        <!-- <div class="page-header">
                <img src="../img/logo1.png" alt="" style="height: 200px; width: 200px;">
            </div> -->
        <div class="p-2">
            <nav class="--bs-breadcrumb-devider: '>';" aria-level="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">invoice</li>
                    <li class="breadcrumb-item active" aria-current="page">Electronic</li>
                </ol>
            </nav>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 body-main">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2>INVOICE NO</h2>
                                <h5>HSC34345</h5>
                            </div>
                        </div> <br />
                        <div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <h5>Description</h5>
                                        </th>
                                        <th>
                                            <h5>Amount</h5>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="col-md-9">
                                            <!-- I Phone 13 Pro Max -->
                                            <strong><?php echo $product['name'] ?></strong>
                                        </td>
                                        <td class="col-md-3"><i class="fas fa-taka-sign" area-hidden="true"></i><strong> <?php echo number_format($amount = $product['price'] - $product['price'] * 25 / 100, 2); ?> </strong> </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">
                                            <p> <strong>Name:</strong></p>
                                            <p> <strong>Phone:</strong></p>
                                            <p> <strong>Shipment and Taxes:</strong> </p>
                                            <p> <strong>Total Amount: </strong> </p>
                                            <p> <strong>Discount: </strong> </p>
                                            <p> <strong>Payable Amount: </strong> </p>
                                        </td>
                                        <td>
                                            <p> <strong><i class="fas fa-taka-sign" area-hidden="true"></i> Mark Zuckerberg </strong> </p>
                                            <p> <strong><i class="fas fa-taka-sign" area-hidden="true"></i> 3957349857 </strong> </p>
                                            <p> <strong><i class="fas fa-taka-sign" area-hidden="true"></i> 120 </strong> </p>
                                            <p> <strong><i class="fas fa-taka-sign" area-hidden="true"></i><?php echo $product['price'] ?> TK </strong> </p>
                                            <p> <strong><i class="fas fa-taka-sign" area-hidden="true"></i> <?php echo number_format($product['price'] * 25 / 100, 2); ?> TK </strong> </p>
                                            <p> <strong><i class="fas fa-taka-sign" area-hidden="true"></i> <?php echo number_format($amount = $product['price'] - $product['price'] * 25 / 100, 2); ?> TK</strong> </p>
                                        </td>
                                    </tr>
                                    <tr style="color: #F81D2D;">
                                        <td class="text-right">
                                            <h4><strong>Total:</strong></h4>
                                        </td>
                                        <td class="text-left">
                                            <h4><strong><i class="fas fa-taka-sign" area-hidden="true"></i> <?php echo number_format($product['price'] - $product['price'] * 25 / 100, 2); ?> TK </strong></h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div><br>
                            <div class="col-md-12">
                                <p><b>Date :</b> <?php echo date('l jS \of F Y h:i:s A'); ?></p> <br />
                                <p><b>Signature</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>