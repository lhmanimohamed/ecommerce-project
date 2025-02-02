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
    <title>categorie | <?php echo $categorie["lebelle"]?></title>
</head>
<body>
     <?php include '../include/nav_front.php'; ?>
   
   <div class="container py.2">
    <h2><?php echo $categorie["lebelle"]?></h2>

    <div class="container">
        <div class="row">

        <?php

        foreach($products as $product){
            ?>
            <div class="card mb-3 col-md-4">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $product["lebelle"]?></h5>
    <p class="card-text"><?= $product["prix"]?></p>
    <p class="card-text"><small class="text-body-secondary">added in : <?= date_format(date_create($product["date_creation"]),"Y/m/d")?></small></p>
            </div>
         </div>
            <?php

        }
        ?>
            
      </div>
   </div>


   
</body>
</html>