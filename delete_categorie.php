<?php

$id = $_GET["id"];
$id_categorie = $_GET["id"];
require_once 'include/database.php';

$stmt = $pdo->prepare("DELETE FROM categorie WHERE id=?");
$deleted = $stmt->execute([$id]);

$stmt2 = $pdo->prepare("DELETE FROM produit WHERE id_categorie=?");
$deleted2 = $stmt2->execute([$id_categorie]);


if($deleted && $deleted2){
    header("location:categories.php");
}else{
    echo "Errour database";
}

?>