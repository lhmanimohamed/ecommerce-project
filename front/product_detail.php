<?php

    $id = $_GET["id"];

       require_once '../include/database.php';
        $stmt = $pdo->prepare("SELECT * FROM produit WHERE id=?");
        $stmt->execute([$id]);
        $produit =$stmt->fetch(PDO::FETCH_ASSOC);
        var_dump($produit);
        

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
    <title>produit | <?php echo $produit["lebelle"]?></title>
</head>
<body>
     <?php include '../include/nav_front.php'; ?>
   
   <div class="container py.2">
    <h2><?php echo $produit["lebelle"]?></h2>

    <div class="container">
        <div class="row">

            
      </div>
   </div>


   
</body>
</html>