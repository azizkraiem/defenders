<?php
 class produit 
{
    private ?int $id = null;
    private ?int $prix = null;
    private ?string $description = null;
    private ?string $nom = null;
    private ?string $image = null;

    public function __construct($id = null, $n, $p, $a, $d)
    {
        $this->id = $id;
        $this->prix = $n;
        $this->description = $p;
        $this->nom = $a;
        $this->image = $d;
    }

    /**
     * Get the value of idproduit
     */
    public function getId()
    {
        return $this->id;
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

    /**
     * Get the value of decription
     */
    public function getdescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setdesciption($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of nom
     */
    public function getnom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom 
     *
     * @return  self
     */
    public function setnom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getimage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setimage($image)
    {
        $this->image = $image;

        return $this;
    }
}
