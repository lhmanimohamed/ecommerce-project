<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Add product</title>
</head>
<body>
      
       

   <?php 
   
   include 'include/nav.php';
   require_once 'include/database.php';
   
   
   ?>
   
   <div class="container py.2">
    <h2>Add product</h2>
     
    <?php
    
      if(isset($_POST["add_product"]))   {

        $lebelle = $_POST["lebelle"];
        $description = $_POST["description"];
        $prix = $_POST["prix"];
        $discount = $_POST["discount"];
        $categorie = $_POST["categorie"];

        $filename = "product.png";
        if(!empty($_FILES["image"]["name"])){
          $image = $_FILES["image"]["name"];

          $filename = uniqid().$image;
          move_uploaded_file($_FILES["image"]["tmp_name"], "upload/products_images/".$filename);

        }

        //extract($_POST); 

        if(!empty($lebelle) && !empty($prix) && !empty($categorie)){

            require_once 'include/database.php';

            $stmt = $pdo->prepare("INSERT INTO produit(lebelle,description,prix,discount,image,id_categorie) VALUES(?,?,?,?,?,?)");
            $inserted = $stmt->execute([$lebelle,$description,$prix,$discount,$filename
            ,$categorie]);
             
            if($inserted){

                header("location:products.php");

            }else{
                 ?>
          <div class="alert alert-danger" role="alert">
            errour in database
        </div>
          <?php
            }

            

        }else{
               ?>
          <div class="alert alert-danger" role="alert">
            lebelle and prix , categorie are obligatoire
        </div>
          <?php
          
            }
      }


       ?>
      <form method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label class="form-label">Lebelle</label>
    <input type="text" class="form-control"  name="lebelle" >
  </div>

  <div class="mb-3">
     <label >Description</label>
    <textarea class="form-control" name="description" ></textarea>
  </div>

  <div class="mb-3">
    <label class="form-label">Prix</label>
    <input type="number" step="0.1" class="form-control"  name="prix" min="0" >
  </div>

  <div class="mb-3">
    <label class="form-label">Discount</label>
    <input type="number" class="form-control" name="discount" min="0" max="90">
  </div>

  <div class="mb-3">
    <label class="form-label">Image</label>
    <input type="file" class="form-control" name="image">
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
        echo " <option value=".$categorie["id"].">".$categorie["lebelle"]."</option>";
      }
     ?>

   

  </select>

  
  <input type="submit" value="add product" class="btn btn-primary my-2" name="add_product">
</form>

   </div>
   
   
</body>
</html>