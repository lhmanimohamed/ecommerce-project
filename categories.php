<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>liste des categories</title>
</head>
<body>

   <?php include 'include/nav.php'; ?> 
    <div class="container py.2">
      <h2>categories liste</h2>
  <a href="add_categorie.php" class="btn btn-primary my-2">Add categorie</a>
<table class="table table-striped">
 <tr>
   <thead>
     <th>Id</th>
    <th>Lebelle</th>
    <th>Description</th>
    <th>Date</th>
    <th>Option</th>
   </thead>

   <tbody>

    <?php
     require_once 'include/database.php';

     $categories = $pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
     foreach($categories as $categorie){
        ?>
        <tr>
            <td><?= $categorie["id"]?></td>
             <td><?= $categorie["lebelle"]?></td>
              <td><?= $categorie["description"]?></td>
               <td><?= $categorie["date_creation"]?></td>

                <td>
      <a href="modifier_categorie.php?id=<?php echo $categorie["id"] ?>" class="btn btn-primary btn-sm">Modifier</a>
          <a href="delete_categorie.php?id=<?php echo $categorie["id"] ?>" onclick="return confirm('do you really want to delete <?php echo $categorie['lebelle']?>')"; class="btn btn-danger btn-sm">Delete</a>  
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