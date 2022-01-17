<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
<?php

use echocrud\Categorie;

$Categorie = new Categorie();
$categories = $Categorie->index();


?>
<div class="row ">
    <?php
    foreach ($categories as $categories) { ?>
        <div class="col-2">
            <div class="card border-info mb-3" style="max-width: 18rem;">
                <a href="cat_show.php?categorie_id=<?php echo $categories['id'] ?>" class="btn "><?php echo $categories['name']; ?></a>
            </div>
        </div>
    <?php } ?>
</div>