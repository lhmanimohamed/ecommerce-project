<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>liste des produits</title>
</head>
<body>

   <?php include 'include/nav.php'; ?> 
    <div class="container py.2">
      <h2>products liste</h2>
  <a href="add_product.php" class="btn btn-primary my-2">Add product</a>
<table class="table table-striped">
 <tr> 
   <thead>
     <th>Id</th>
    <th>Lebelle</th>
    <th>Prix</th>
    <th>Discount</th>
    <th>Id Categorie</th>
    <th>Date de Creation</th>
     <th>Option</th>
   </thead>

   <tbody>

    <?php
     require_once 'include/database.php';

     $products = $pdo->query("SELECT produit.*,categorie.lebelle as 'categorie_lebelle' FROM produit 
                                                                 INNER JOIN categorie 
                                                                 ON produit.id_categorie = categorie.id")->fetchAll(PDO::FETCH_OBJ);

     foreach($products as $product){
        
        $prix = $product->prix;
        $discount = $product->discount;
        $prixFinal = $prix - (($prix*$discount)/100);
        ?>
        <tr>
            <td><?= $product->id?></td>
             <td><?= $product->lebelle?></td>
              <td><?= $prix?> Dh</td>
               <td><?= $prixFinal?></td>
               <td><?= $product->categorie_lebelle?></td>
               <td><?= date_format(date_create($product->date_creation),"Y/m/d")?></td>

                <td>
          <a href="modifier_product.php?id=<?php echo $product->id?>" class="btn btn-primary btn-sm" >modifier</a>
          <a href="delete_product.php?id=<?php echo $product->id?>" onclick = "return confirm('do you really want to delete <?= $product->lebelle?>')" class="btn btn-danger btn-sm" >supreme</a>
        </td>

        </tr>
        <?php
     }

   ?>

   </tbody>
 </tr>
</table>

</body>
</html>