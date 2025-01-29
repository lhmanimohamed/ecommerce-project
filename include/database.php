<?php

$host = "localhost";
$port = "3307";
$dbname = "ecommerce";
$users = "root";
$password = "";
   
           $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $users, $password);






           
           //var_dump($pdo);

// try {
//     $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $users, $password);         
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "";
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }

?>