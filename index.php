<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Log In</title>
</head>
<body>
      
       

   <?php include 'include/nav.php'; ?>
   
   <div class="container py.2">
    <h2>Add user</h2>
     
    <?php
       
       if(isset($_POST["add"])) {

        $password = htmlspecialchars($_POST["password"]) ;
        $name = htmlspecialchars($_POST["name"]) ;
        $date = date("y-m-d");

        require_once 'include/database.php';

       $stmt = $pdo->prepare("SELECT * FROM user WHERE name=?");
       $stmt->execute([$name]);

       if($stmt->rowCount() > 0){
        ?>
          <div class="alert alert-danger" role="alert">
             user already exist
        </div>
          <?php
       }else{

          $stmt = $pdo->prepare("INSERT INTO user VALUES(null,?,?,?)");
          $stmt->execute([$name,$password,$date]);

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
    <input type="password" class="form-control" name="password" placeholder="enter password">
  </div>

  <input type="submit" value="add user" class="btn btn-primary my-2" name="add">
</form>
   </div>
   
   
</body>
</html>