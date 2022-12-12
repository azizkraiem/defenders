
<?php
/*partie contriller */
require("../controller/produitC.php");

$servname = "localhost"; $dbname = "monoshop"; $user = "root"; $pass = "";
$dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);

function recherche($rech)
    {
        $sql = "SELECT * FROM produits where produits.nom like '%$rech%'";
        $db = new PDO("mysql:host=localhost;dbname=monoshop;", "root", "");
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }



$Produits=afficher();
if ($_POST["recherche"]) {
    $liste = recherche($_POST["rech"]);
} else
   
header ('Location:index.php');


if(isset($_GET['pdt'])){
    
    if(!empty($_GET['pdt']) OR is_numeric($_GET['pdt']))
    {
        $id = $_GET['pdt'];

    }
}
$produitparpage=4;
$produittotalreq=$dbco->query('SELECT id   FROM produits');
$produittotla=$produittotalreq->rowCount();// pour claculer le nombre totale de video 
$pagetotale =  ceil($produittotla/$produitparpage);


if (isset($_GET['page'] ))
{
    if ( !empty($_GET['page']) AND $_GET['page']>0 AND  $_GET['page']<=$pagetotale)
    {
        $_GET['page']=intval($_GET['page']);
        $pagecourante =$_GET['page'];

    }
}
else{
    $pagecourante=1;

}

$depart =($pagecourante-1) * $produitparpage;

?>
<!-- partie view-->
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
<meta name="generator" content="Hugo 0.80.0">
<title>Album example · Bootstrap v5.0</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>



<style>
.bd-placeholder-img {
font-size: 1.125rem;
text-anchor: middle;
-webkit-user-select: none;
-moz-user-select: none;
user-select: none;
}

@media (min-width: 768px) {
.bd-placeholder-img-lg {
    font-size: 3.5rem;
}
}
</style>

</head>
<body>

<header>
<div class="collapse bg-dark" id="navbarHeader">
<div class="container">
    <div class="row">
    <div class="col-sm-8 col-md-7 py-4">
        <h4 class="text-white">About</h4>
        <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
    </div>
    <div class="col-sm-4 offset-md-1 py-4">
        <h4 class="text-white">Sign in</h4>
        <ul class="list-unstyled">
        <li><a href="afficherpagi.php" class="text-white">Se connecter</a></li>
        </ul>
    </div>
    </div>
</div>
</div>
<div class="navbar navbar-dark bg-dark shadow-sm">
<div class="container">
    <a href="#" class="navbar-brand d-flex align-items-center">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
    <strong>MonoShop</strong>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <form action="produits1.php" method="POST" class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" name="rech" placeholder="Search">
                    <input type="submit" name="recherche" value="Search" class="btn btn-primary px-4">
                </form>
    <!--
    <form action="produits1.php" method="GET" class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" name="rech" placeholder="Search">
                    <input type="submit" name="recherche" value="Search" class="btn btn-primary px-4">
                </form>-->
</div>
</div>



</header>

<main>
<?php
$d=$dbco->query('SELECT *FROM produits ORDER BY id  LIMIT '.$depart.' , '.$produitparpage.'  ');
while ($vid=$d->fetch())
{
    ?>
<div class="album py-5 bg-light">
<div class="container" style="display: flex; justify-content: center">

    <div class="row">
<div class="col-md-2"></div>


        <div class="col-md-8">
            <div class="card shadow-sm" >
                <h3 align="center"><?= $vid['nom'] ?></h3>
                <img src="<?= $vid['image'] ?>" style="width: 50%">

                <div class="card-body">
                <p class="card-text"><?=$vid['description']?></p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a href="produits.php?pdt=<?=$vid['id'] ?>"><button type="button" class="btn btn-sm btn-success">Commander</button></a>
                    <a href="../admin/categorie.php=<?= $vid['id'] ?>"><button type="button" class="btn btn-sm btn-success">categorie  </button></a>
                    </div>
                    <small class="text" style="font-weight: bold;"><?= $vid['prix']?> € </small>
                </div>
                </div>
            </div>
            </div>
           

<div class="col-md-2"></div>
    </div>
</div>
</div>
<?php
}




    ?>
</main>
<br>
<br>
<br>
<br>
<?php
    for($i=1;$i<=$produittotla;$i++)
    {
        if ($i == $pagecourante )
        {
            echo $i .' ';

        }
        else
        {
            echo '<a href ="produits1.php?page= '.$i.'">'.$i.'</a>&nbsp;';
        }


    }
    ?>
    
</body>
</html>