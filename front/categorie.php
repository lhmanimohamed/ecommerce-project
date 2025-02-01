<?php

    $id = $_GET["id"];
       require_once '../include/database.php';
        $stmt = $pdo->prepare("SELECT * FROM categorie WHERE id=?");
        $stmt->execute([$id]);
        $categorie =$stmt->fetch(PDO::FETCH_ASSOC);

         $stmt = $pdo->prepare("SELECT * FROM produit WHERE id_categorie=?");
         $stmt->execute([$id]);
         $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
         
       ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>categorie | <?php echo $categorie["lebelle"]?></title>
</head>
<body>
     <?php include '../include/nav_front.php'; ?>
   
   <div class="container py.2">
    <h2><?php echo $categorie["lebelle"]?>  <span class="fa <?php echo $categorie["icon"]?>"></span></h2>

    <div class="container">
        <div class="row">

        <?php

        foreach($products as $product){
            ?>
            <div class="card mb-3 col-md-4 m-1">
  <img src="../upload/products_images/<?= $product["image"]?>" class="card-img-top" alt="...">
  <div class="card-body">
    <a href="product_detail.php?id=<?=$product["id"]?>" class="btn stretched-link"></a>
    <h5 class="card-title"><?= $product["lebelle"]?></h5>
    <p class="card-text"><?= $product["description"]?></p>
    <p class="card-text"><small class="text-body-secondary">added in : <?= date_format(date_create($product["date_creation"]),"Y/m/d")?></small></p>
            </div>
         </div>
            <?php

        }

        if(empty($products)){
          ?>
          <div class="alert alert-info" role="alert">
            no products yet
        </div>
          <?php
        }
        ?>
            
      </div>
   </div>


   
</body>
</html>