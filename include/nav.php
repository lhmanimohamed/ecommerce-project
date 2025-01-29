<?php
 session_start();
 $connecter = false;


 if(isset($_SESSION["user"])){
  $connecter = true;
 }
// var_dump($connecter);

?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Ecommerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Add user</a>
        </li>

        <?php
              if($connecter){

                ?>

                 <li class="nav-item">  
          <a class="nav-link " aria-current="page" href="categories.php">Categories liste</a>
        </li>

        <li class="nav-item">  
          <a class="nav-link " aria-current="page" href="products.php">Products liste</a>
        </li>
                 <li class="nav-item">
          <a class="nav-link " aria-current="page" href="add_categorie.php">Add categorie</a>
        </li>

        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="add_product.php">Add product</a>
        </li>

         <li class="nav-item">
          <a class="nav-link " aria-current="page" href="deconnexion.php">Deconnexion</a>
        </li> 

                <?php
              }else{
                ?>
                 <li class="nav-item">
          <a class="nav-link" href="connexion.php">connexion </a>
        </li>
                <?php
              }

          ?>
          
         


       
        
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li> -->
      </ul>
    </div>
  </div>
</nav>