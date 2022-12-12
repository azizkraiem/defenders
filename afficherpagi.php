<?php
session_start();
require("../controller/produitC.php");


$servname = "localhost"; $dbname = "monoshop"; $user = "root"; $pass = "";
$dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);


$produits = afficher();
/*
if(!isset($_SESSION['xRttpHo0greL39']))
{
    header("Location: ../login.php");
}

if(empty($_SESSION['xRttpHo0greL39']))
{
    header("Location: ../login.php");
}

require("../config/commandes.php");

$produits = afficher();

foreach($_SESSION['xRttpHo0greL39'] as $i){
    $nom = $i->pseudo;
    $email = $i->email;
} */



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

<!DOCTYPE html>
<html>
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <title>Tous les produits</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <a class="nav-link active" style="font-weight: bold;" aria-current="page" href="../view/afficherpagi.php">Produits</a>
        </li>
        
        <li class="nav-item">
        <a class="nav-link" aria-current="page" href="nouveau.php">Nouveau</a>
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
    <!--<div style="margin-right: 500px">
        <h5 style="color: #545659; opacity: 0.5;">Connecté en tant que: <?= $nom ?></h5>
    </div>-->
    <a class="btn btn-danger d-flex" style="display: flex; justify-content: flex-end;" href="destroy.php">Se deconnecter</a>
    </div>
</div>
</nav>
<?php
$d=$dbco->query('SELECT *FROM produits ORDER BY id  LIMIT '.$depart.' , '.$produitparpage.'  ');
while ($vid=$d->fetch())
{
    ?>

<div class="album py-5 bg-light">
    <div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <table class="table">
      
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">image</th>
                <th scope="col">nom</th>
                <th scope="col">prix</th>
                <th scope="col">Description</th>
                <th scope="col">Editer</th>
                <th scope="col">supprimer</th>
                </tr>
            </thead>
            <tbody>
          




                <tr>
                <th scope="row"><?= $vid['id'] ?></th>
                <td>
                <img src="<?= $vid['image']  ?>" style="width: 70%">
                </td>
                <td><?= $vid['nom']?></td>
                <td style="font-weight: bold; color: green;"><?=$vid['prix'] ?>€</td>
                <td><?= substr($vid['description'], 0, 100); ?>...</td>
                <td><a href="editer.php?id=<?= $vid['id'] ?>"><i class="fa fa-pencil" style="font-size: 30px;"></i></a></td>
                <td><a href="supp1.php?id=<?= $vid['id'] ?>"><i class="btn btn-danger btn-sm" style="font-size: 30px;"></i></a></td>
                </tr>      



            </tbody>
            </table>
            
    </div>
</div>
</div>
<?php
}




    ?>

<?php
    for($i=1;$i<=$produittotla;$i++)
    {
        if ($i == $pagecourante )
        {
            echo $i .' ';

        }
        else
        {
            echo '<a href ="afficherpagi.php?page= '.$i.'">'.$i.'</a>&nbsp;';
        }


    }
    ?>
    
</body>
</html>
