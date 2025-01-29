<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Add categorie</title>
</head>
<body>
      
       

   <?php include 'include/nav.php'; ?>
   
   <div class="container py.2">
    <h2>Add categorie</h2>
     
    <?php
    
       if(isset($_POST["add_categorie"])){

        $lebelle = $_POST["lebelle"];
        $Description = $_POST["description"];

        

            if(!empty($lebelle) && !empty($Description)){

                require_once 'include/database.php';

                

                 $stmt = $pdo->prepare("INSERT INTO categorie(lebelle,description) VALUES(?,?)");
                  $stmt->execute([$lebelle,$Description]);

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
    <label class="form-label">Lebelle</label>
    <input type="text" class="form-control" id="exampleInputName1" name="lebelle" >
  </div>

  <div class="mb-3">
     <label >Description</label>
    <textarea class="form-control" name="description" ></textarea>
   
   
  </div>

  <input type="submit" value="add categorie" class="btn btn-primary my-2" name="add_categorie">
</form>

   </div>
   
   
</body>
</html>