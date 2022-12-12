<?php
include '../controller/connexion.php';
include '../model/produit.php';



    function modifier($image, $nom, $prix, $desc, $id)
{
  if(require("connexion.php"))
  {
    $req = $access->prepare("UPDATE produits SET `image` = ?, nom = ?, prix = ?, description = ? WHERE id=?");

    $req->execute(array($image, $nom, $prix, $desc, $id));

    $req->closeCursor();
  }
}
function afficherUnProduit($id)
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("SELECT * FROM produits WHERE id=?");

        $req->execute(array($id));

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
	}
}
/*
function ajouter($image, $nom, $prix, $desc)
{
  if(require("connexion.php"))
  {
    $req = $access->prepare("INSERT INTO produits (image, nom, prix, description) VALUES (?, ?, ?, ?)");

    $req->execute(array($image, $nom, $prix, $desc));

    $req->closeCursor();
  }
}*/
function ajoutertab($prix,$desc,$nom,$image,$classe)
{
  $dab = new PDO("mysql:host=localhost;dbname=monoshop;", "root", "");
  $sql = $dab->prepare("INSERT INTO `produits`(`id`, `prix`, `description`, `nom`, `image`, `idcategorie`) VALUES (null ,$prix,'$desc','$nom','$image',$classe)");
  $sql->execute();
}

function afficher()
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("SELECT * FROM produits ORDER BY id DESC");

        $req->execute();

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
	}
}
function supprimer($id)
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("DELETE FROM produits WHERE id=?");

		$req->execute(array($id));

		$req->closeCursor();
	}
}
/*
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
    }*/