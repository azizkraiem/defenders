<?php

function ajouterUser($nom, $prenom, $email, $motdepasse)
{
  if(require("connexion.php"))
  {
    $req = $access->prepare("INSERT INTO utilisateurs (nom, prenom, email, motdepasse) VALUES (?, ?, ?, ?)");

    $req->execute(array($nom, $prenom, $email, $motdepasse));

    return true;

    $req->closeCursor();
  }
}

// function getUsers($email, $password){
  
//   if(require("connexion.php")){

//     $req = $access->prepare("SELECT * FROM utilisateur ");

//     $req->execute();

//     if($req->rowCount() == 1){
      
//       $data = $req->fetchAll(PDO::FETCH_OBJ);

//       foreach($data as $i){
//         $mail = $i->email;
//         $mdp = $i->motdepasse;
//       }

//       if($mail == $email AND $mdp == $password)
//       {
//         return $data;
//       }
//       else{
//           return false;
//       }

//     }

//   }

// }
function ajoutertab($prix,$desc,$nom,$image,$classe)
{
  $dab = new PDO("mysql:host=localhost;dbname=monoshop;", "root", "");
  $sql = $dab->prepare("INSERT INTO `produits`(`id`, `prix`, `description`, `nom`, `image`, `idcategorie`) VALUES (null ,$prix,'$desc','$nom','$image',$classe)");
  $sql->execute();
}

function modifier($image, $nom, $prix, $desc, $id)
{
  if(require("connexion.php"))
  {
    $req = $access->prepare("UPDATE produits SET `image` = ?, nom = ?, prix = ?, description = ? WHERE id=?");

    $req->execute(array($image, $nom, $prix, $desc, $id));

    $req->closeCursor();
  }
}

/*
function modifiercatego($classe)
{
  if(require("connexion.php"))
  {
    $req = $access->prepare("UPDATE categorie SET classe  = ? WHERE id=?");

    $req->execute(array($classe));

    $req->closeCursor();
  }
}*/
/*
function modifiercatego($classe )
{
  if(require("connexion.php"))
  {
    $req = $access->prepare("UPDATE  categorie  SET  classe=? WHERE idcategprie=?"); //("SELECT *FROM  produits INNER JOIN categorie ON produits.id= categorie.idcategorie");

    $req->execute(array($classe));

    $req->closeCursor();
  }
}
*/

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
function afficherUnProduit1($id)
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("SELECT *FROM  produits INNER JOIN categorie ON produits.id= categorie.idcategorie");


        $req->execute();

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
  }
  function ajouter1($classe)
  {
    if(require("connexion.php"))
    {
      $req = $access->prepare("INSERT INTO categorie ( classe) VALUES (?)");

      $req->execute(array( $classe));


      $req->closeCursor();
    }
  }
*/

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
/*
function afficher1()
{
	if(require("connexion.php"))
	{
		//$req=$access->prepare("SELECT * FROM categorie ORDER BY idcategorie DESC");
       $req=$access->prepare ("SELECT *FROM  produits INNER JOIN categorie ON produits.id= categorie.idcategorie");

        $req->execute();

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
	}
}
*/

function supprimer($id)
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("DELETE FROM produits WHERE id=?");

		$req->execute(array($id));

		$req->closeCursor();
	}
}

function getAdmin($email, $password){
  
  if(require("connexion.php")){

    $req = $access->prepare("SELECT * FROM admin WHERE id=33");

    $req->execute();

    if($req->rowCount() == 1){
      
      $data = $req->fetchAll(PDO::FETCH_OBJ);

      foreach($data as $i){
        $mail = $i->email;
        $mdp = $i->motdepasse;
      }

      if($mail == $email AND $mdp == $password)
      {
        return $data;
      }
      else{
          return false;
      }

    }

  }

}

?>
