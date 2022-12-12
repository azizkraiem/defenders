<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enovyer des emails</title>
</head>
<body>
<h1>email  envoyer </h1>
    

<?php



$destinateure="jmilimouhamedamine@gmail.com ,medaminejmili27@gmail.com ";// wen bech yousel el mail 
$sujet = "LOCCAR  donne la chance de decouvrir les nouvelles produits   ";
$message = " voire plus notre nouvelles produits clicer ici :http://localhost/monoshop1/car-rental-html-template/car.php ";


$headers = "From:mouhamedamine.jmili@esprit.tn" ;


mail($destinateure,$sujet,$message,$headers);


?>
</body>
</html>





