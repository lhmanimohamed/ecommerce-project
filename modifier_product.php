<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Modify product</title>
</head>
<body>
      
       

   <?php 
   
   include 'include/nav.php';
   require_once 'include/database.php';
   
   $id = $_GET["id"];

   $stmt = $pdo->prepare("SELECT * FROM produit WHERE id=?");
   $stmt->execute([$id]);

   $products = $stmt->fetch(PDO::FETCH_ASSOC) ;

   if(isset($_POST["modifier"])){

        $lebelle = $_POST["lebelle"];
        $description = $_POST["description"];
        $prix = $_POST["prix"];
        $discount = $_POST["discount"];
        $categorie = $_POST["categorie"];

        $filename = "";
        if(!empty($_FILES["image"]["name"])){
          $image = $_FILES["image"]["name"];

          $filename = uniqid().$image;
          move_uploaded_file($_FILES["image"]["tmp_name"], "upload/products_images/".$filename);

        }


    if(!empty($lebelle) && !empty($prix) && !empty($categorie)){

       $query = "UPDATE produit 
                SET lebelle=?,description=?,prix=?,discount=?,id_categorie=?
                WHERE id=?";

      if(!empty($filename)){

        $query = "UPDATE produit 
                SET lebelle=?,description=?,prix=?,discount=?,image=?,id_categorie=?
                WHERE id=?";

        $stmt = $pdo->prepare($query);
        $updated = $stmt->execute([$lebelle,$description,$prix,$discount,$filename,$categorie,$id]); 
      }else{

         $query = "UPDATE produit 
                SET lebelle=?,description=?,prix=?,discount=?,id_categorie=?
                WHERE id=?";

        $stmt = $pdo->prepare($query);
        $updated = $stmt->execute([$lebelle,$description,$prix,$discount,$categorie,$id]);

      }
      

        
        if($updated){
             header("location:products.php"); 
        } else{
             ?>
          <div class="alert alert-danger" role="alert">
           something went wrong
        </div>
          <?php
        }
                                 
    }else{
         ?>
          <div class="alert alert-danger" role="alert">
            name and description are obligatoire
        </div>
          <?php
    }

    
   }
   ?>
   
   <div class="container py.2">
    <h2>Modify product</h2>
     
    <?php

       ?>
      <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $products["id"]?>">
  <div class="mb-3">
    <label class="form-label">Lebelle</label>
    <input type="text" class="form-control"  name="lebelle" value="<?= $products["lebelle"]?>">
  </div>

  <div class="mb-3">
     <label >Description</label>
    <textarea class="form-control" name="description" ><?= $products["description"]?></textarea>
  </div>

  <div class="mb-3">
    <label class="form-label">prix</label>
    <input type="number" step="0.1" class="form-control"  name="prix" min="0" value="<?= $products["prix"]?>">
  </div>

   <div class="mb-3">
    <label class="form-label">Image</label>
    <input type="file" class="form-control" name="image">
    <img src="upload/products_images/<?= $products["image"]?>" width="120">
  </div>

  <?php
     
  ?>

  <div class="mb-3">
    <label class="form-label">discount</label>
    <input type="number" class="form-control" name="discount" min="0" max="90" value="<?= $products["discount"]?>">
  </div>



    <?php
  
     $categories = $pdo->query("SELECT * FROM categorie")->fetchAll(PDO::FETCH_ASSOC);
   
    //print_r($categories);
  
  ?>

    <label class="form-label">categories</label>
  <select name="categorie" class="form-control">
     <option value="">choose a categorie</option>

     <?php
      foreach($categories as $categorie){
        if($categorie["id"] == $products["id_categorie"]){
             echo " <option selected value=".$categorie["id"].">".$categorie["lebelle"]."</option>";
        }else{
             echo " <option value=".$categorie["id"].">".$categorie["lebelle"]."</option>";
        }
       
      }
     ?>
  </select>

  
  <input type="submit" value="modifier product" class="btn btn-primary my-2" name="modifier">
</form>

   </div>
   
   
</body>
</html>