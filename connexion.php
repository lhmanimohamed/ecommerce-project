<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>connexion</title>
</head>
<body>
      
       

   <?php include 'include/nav.php'; ?> 

   
   <div class="container py.2">
    <h2>Connexion</h2>
     
    <?php
       
       if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["connect"])){
           
        $name = $_POST["name"];
        $password = $_POST["password"];

        if(!empty($password) && !empty($name)){

        require_once 'include/database.php';
        $stmt = $pdo->prepare("SELECT * FROM user WHERE name=? AND password=?");
        $stmt->execute([$name,$password]);

        // header("location:admin.php");
        if($stmt->rowCount() >= 1){
           
           $_SESSION["user"] = $stmt->fetch();
          header('location: admin.php');

        }else{
          ?>
          <div class="alert alert-danger" role="alert">
           user not found
        </div>
          <?php
        }

        }else{
           ?>
          <div class="alert alert-danger" role="alert">
            email and password are obligatoire
        </div>
          <?php
        }
    }

       ?>

      <form action="" method="post">
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" id="exampleInputName1" name="name" >
  </div>

  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password" >
  </div>

  <input type="submit" value="connect" class="btn btn-primary my-2" name="connect">
</form>
   </div>
   
   
</body>
</html>