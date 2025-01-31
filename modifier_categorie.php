<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Modifier categorie</title>
</head>
<body>
      
       

   <?php include 'include/nav.php'; ?>
   
   <div class="container py.2">
    <h2>Modifier categorie</h2>
     
    <?php

       $id = $_GET["id"];

   require_once 'include/database.php';
   $stmt = $pdo->prepare("SELECT * FROM categorie WHERE id=?");
   $stmt->execute([$id]);
   
   $categorie = $stmt->fetch(PDO::FETCH_ASSOC) ;

   if(isset($_POST["modifier"])){

        $lebelle = $_POST["lebelle"];
        $Description = $_POST["description"];
        $icon = $_POST["icon"];

        

            if(!empty($lebelle) && !empty($Description)){

                 $stmt = $pdo->prepare("UPDATE categorie 
                                           SET lebelle=? , description=? , icon=?
                                           WHERE id=?");

                  $stmt->execute([$lebelle,$Description,$icon,$id]);

            header("location:categories.php");

            
            }else{
               ?>
          <div class="alert alert-danger" role="alert">
            name and description are obligatoire
        </div>
          <?php
            }
   }
    
       ?>
      <form action="" method="post">

        <div class="mb-3">
    <input type="hidden" class="form-control" value="<?php echo $categorie['id']?>" id="exampleInputName1" name="Id" >
  </div>

  <div class="mb-3">
    <label class="form-label">Lebelle</label>
    <input type="text" class="form-control" value="<?php echo $categorie['lebelle']?>" id="exampleInputName1" name="lebelle" >
  </div>

  <div class="mb-3">
     <label >Description</label>
    <textarea class="form-control" name="description" ><?php echo $categorie['description']?></textarea>
  </div>

   <div class="mb-3">
    <label class="form-label">Icon</label>
    <input type="text" class="form-control" value="<?= $categorie['icon']?>" name="icon" >
  </div>

  <input type="submit" value="Modifier categorie" class="btn btn-primary my-2" name="modifier">
</form>

   </div>
   
   
</body>
</html>