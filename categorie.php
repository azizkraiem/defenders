<?php
class categorie 
{
    private ?int $idcategorie = null;
    private ?string $classe = null;

    public function __construct($id = null, $n)
    {
        $this->idcategorie = $id;
        $this->classe = $n;
  
    }
  /**
     * Get the value of idCategorie
     */
    public function getidcategorie()
    {
        return $this->idCategorie;
    }

 /**
     * Get the value of prix
     */
    public function getprix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */
    public function setprix($prix)
    {
        $this->prix = $prix;

        return $this;
    }





}