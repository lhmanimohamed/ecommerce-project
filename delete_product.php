<?php
  $id = $_GET["id"];
  
  require_once 'include/database.php';
  $stmt = $pdo->prepare("DELETE FROM produit where id=?");
  $deleted = $stmt->execute([$id]);

  if($deleted){
    header("location:products.php");
  }else{
    echo "errour accured in deletion";
  }

?>