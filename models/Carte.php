<?php

class Carte {
	private $id;
	private $nom;
	private $listeMenus;
	private $dateCreation;
	private $online;

    public function __construct($id=null,$nom=null,$listeMenus=null,$dateCreation=null,$online=null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->listeMenus = $listeMenus;
        $this->dateCreation = $dateCreation;
        $this->online = $online;
    }

    public function to_json(){

        $array = array(
            "id" => $this->id,
            "nom" => $this->nom,
            "listeMenus" => $this->listeMenus,
            "dateCreation" => $this->dateCreation,
            "online" => $this->online
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
	 * Get the value of listeMenus
	 */ 
	public function getListeMenus()
	{
		return $this->listeMenus;
	}

	/**
	 * Set the value of listeMenus
	 *
	 * @return  self
	 */ 
	public function setListeMenus($listeMenus)
	{
		$this->listeMenus = $listeMenus;

		return $this;
	}

	/**
	 * Get the value of dateCreation
	 */ 
	public function getDateCreation()
	{
		return $this->dateCreation;
	}

	/**
	 * Set the value of dateCreation
	 *
	 * @return  self
	 */ 
	public function setDateCreation($dateCreation)
	{
		$this->dateCreation = $dateCreation;

		return $this;
	}

	/**
	 * Get the value of online
	 */ 
	public function getOnline()
	{
		return $this->online;
	}

	/**
	 * Set the value of online
	 *
	 * @return  self
	 */ 
	public function setOnline($online)
	{
		$this->online = $online;

		return $this;
	}
}