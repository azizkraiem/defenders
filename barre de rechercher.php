<?php
    $servname = "localhost"; $dbname = "monoshop"; $user = "root"; $pass = "";

        $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $allusers = $dbco->prepare('SELECT *FROM produits ORDER BY nom ');
        
        if (isset($_GET['envoyer']) and !empty ($_GET['envoyer']) )
{
    $rechecher = htmlspecialchars($_GET['s']);
    $allusers=$dbco->prepare("SELECT * FROM produits where produits.nom like '%$rech%'");


}
     
    
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="GET ">

    <input type="search" name ="s" placeholder ="rechercher  une voiture" autocomplete"of" >
    <input type="submit" name ="envoyer "value ="rechercher " />
    </form>
    <section class ="afficher ">
<?php
if($allusers->rowCount()>0)
{ 
    while ($u=$allusers->fetchAll())
    {
        ?>
        <p>
           <?=$u['nom'];?> <!--afficher la liste des voitures -->
    </p>
    <?php
   
    }
    ?>

    <?php
}
else
{

?>
<p>aucun voiture troué </p>
<?php
}
?>

    </section>
</body>
</html>