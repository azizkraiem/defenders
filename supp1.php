<?php
if (isset($_GET["id"]))
{
    $id=$_GET["id"];
    try {
		$access=new pdo("mysql:host=localhost;dbname=monoshop;charset=utf8", "root", "");
		
		$access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

} catch (Exception $e) 
{
	$e->getMessage();
}
$sql="DELETE FROM produits WHERE id=$id";
$access->query($sql);

}
header("location: afficherpagi.php");
exit;
?>