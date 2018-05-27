<?php

class Plat {

	private $id;

	private $idType;

	private $prix;

	private $nom;

	private $url;

    public function __construct($id=null, $idType=null, $prix=null, $nom=null, $url=null)
    {
        $this->id = $id;
        $this->idType = $idType;
        $this->prix = $prix;
        $this->nom = $nom;
        $this->url = $url;
    }

    public function to_json(){

        $array = array(
            "id" => $this->id,
            "idType" => $this->idType,
            "prix" => $this->prix,
            "nom" => $this->nom,
            "url" => $this->url
        );

        return json_encode($array);
    }  



	/**
	 * Get the value of id
	 */ 
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set the value of id
	 *
	 * @return  self
	 */ 
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * Get the value of idType
	 */ 
	public function getIdType()
	{
		return $this->idType;
	}

	/**
	 * Set the value of idType
	 *
	 * @return  self
	 */ 
	public function setIdType($idType)
	{
		$this->idType = $idType;

		return $this;
	}

	/**
	 * Get the value of prix
	 */ 
	public function getPrix()
	{
		return $this->prix;
	}

	/**
	 * Set the value of prix
	 *
	 * @return  self
	 */ 
	public function setPrix($prix)
	{
		$this->prix = $prix;

		return $this;
	}

	/**
	 * Get the value of nom
	 */ 
	public function getNom()
	{
		return $this->nom;
	}

	/**
	 * Set the value of nom
	 *
	 * @return  self
	 */ 
	public function setNom($nom)
	{
		$this->nom = $nom;

		return $this;
	}

	/**
	 * Get the value of url
	 */ 
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * Set the value of url
	 *
	 * @return  self
	 */ 
	public function setUrl($url)
	{
		$this->url = $url;

		return $this;
	}
}