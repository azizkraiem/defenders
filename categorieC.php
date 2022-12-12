<?php
include '../controller/connexion.php';
include '../model/categorie.php';



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
   /* function ajouter1($classe)
    {
      if(require("connexion.php"))
      {
        $req = $access->prepare("INSERT INTO categorie ( classe) VALUES (?)");
  
        $req->execute(array( $classe));
  
  
        $req->closeCursor();
      }
    }*/

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
function modifiercatego($classe )
{
  if(require("connexion.php"))
  {
    $req = $access->prepare("UPDATE  categorie  SET  classe=? WHERE idcategprie=?"); //("SELECT *FROM  produits INNER JOIN categorie ON produits.id= categorie.idcategorie");

    $req->execute(array($classe));

    $req->closeCursor();
  }
}



