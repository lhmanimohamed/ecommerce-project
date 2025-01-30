<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>Log In</title>
</head>
<body>
    <?php include '../include/nav_front.php'; ?>
    
   <div class="container py.2">
    <h2><i class="fa-solid fa-list"> categories liste </i></h2>

     <ul class="list-group list-group-flush w-25">
 
    <?php
       require_once '../include/database.php';
        $categories = $pdo->query("SELECT * FROM categorie")->fetchAll(PDO::FETCH_OBJ);
        // var_dump($categories);

           foreach($categories as $categorie){
            ?><li class="list-group-item">
                <a href="categorie.php?id=<?php echo $categorie->id?>" class="btn btn-light"><?php echo $categorie->lebelle?></a>
            </li><?php
           }
        
       ?>
   
   
  
</ul>
   
</body>
</html>