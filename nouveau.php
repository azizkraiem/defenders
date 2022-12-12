<?php
session_start();

require("../controller/produitC.php");
/*
if(!isset($_SESSION['xRttpHo0greL39']))
{
    header("Location: ../login.php");
}

if(empty($_SESSION['xRttpHo0greL39']))
{
    header("Location: ../login.php");// pour aller al page de login 

}


foreach($_SESSION['xRttpHo0greL39'] as $i){
  $nom = $i->pseudo;
  $email = $i->email;
}
*/
?>

<!DOCTYPE html>
<html>
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<title></title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <a class="navbar-brand" href="../car-rental-html-template/car.php">MonoShop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="afficherpagi.php">Produits</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" style="font-weight: bold;" aria-current="page" href="../admin/">Nouveau</a>
        </li>
        <!--
        <li class="nav-item">
          <a class="nav-link" href="supprimer.php">Suppression</a>
        </li>
-->
        <li class="nav-item">
          <a class="nav-link" href="catego.php">categorie</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="barre de rechercher.php">rechercher</a>
        </li>

        
      </ul>
     
      
      <a class="btn btn-danger d-flex" style="display: flex; justify-content: flex-end;" href="destroy.php">Se deconnecter</a>
    </div>
  </div>
</nav>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

      
<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">L'image du produit</label>
    <input type="name" class="form-control" name="image" >

  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Nom du produit</label>
    <input type="text" class="form-control" name="nom" require  >
  </div>

   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Prix</label>
    
    <input type="number" class="form-control" name="prix"require >
  </div>

   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <textarea class="form-control" name="desc" require ></textarea>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" >selection la categorie </label>
    
    <select class="form-control" style="height: 50px;" name ="classe" >
                    <option value="0"></option>
                    <option value="1">lux</option>
                    <option value="2">berline</option>
                    <option value="3">compact</option>
                    <option value="4">Economique</option>
                </select>
  </div>
  <button type="submit" name="valider" class="btn btn-primary">Ajouter un nouveau produit</button>
</form>

      </div></div></div>

    
</body>
</html>

<?php

  if(isset($_POST['valider']))

  { 
    if (($_POST['prix']<0)  || ($_POST['nom']=="") || ($_POST['desc']=="")   )
    {
    echo "<h1> error </h1>";
  
  
  }
  else {
    
	    	$image = htmlspecialchars(strip_tags($_POST['image']));
	    	$nom = htmlspecialchars(strip_tags($_POST['nom']));
	    	$prix = htmlspecialchars(strip_tags($_POST['prix']));
	    	$desc = htmlspecialchars(strip_tags($_POST['desc']));
        $classe = htmlspecialchars(strip_tags($_POST['classe']));
       
          echo $classe ; 
        
          
          ajoutertab($prix,$desc,$nom,$image,$classe) ;
            //ajouter($image, $nom, $prix, $desc);
           /* $dab = new PDO("mysql:host=localhost;dbname=monoshop;", "root", "");
            $sql = $dab->prepare("INSERT INTO `produits`(`id`, `prix`, `description`, `nom`, `image`, `idcategorie`) VALUES (null ,$prix,'$desc','$nom','$image',$classe)");
            $sql->execute();*/
          
           
            header('Location: afficherpagi.php');
        

	    }
    }
  

?>