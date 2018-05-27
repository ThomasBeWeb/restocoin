<?php

class Menu {
	private $id;
	private $nom;
	private $description;
	private $listePlats;

    public function __construct($id=null,$nom=null,$description=null,$listePlats=null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->listePlats = $listePlats;
    }

    public function to_json(){

        $array = array(
            "id" => $this->id,
            "nom" => $this->nom,
            "description" => $this->description,
            "listePlats" => $this->listePlats
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
	 * Get the value of description
	 */ 
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Set the value of description
	 *
	 * @return  self
	 */ 
	public function setDescription($description)
	{
		$this->description = $description;

		return $this;
	}

	/**
	 * Get the value of listePlats
	 */ 
	public function getListePlats()
	{
		return $this->listePlats;
	}

	/**
	 * Set the value of listePlats
	 *
	 * @return  self
	 */ 
	public function setListePlats($listePlats)
	{
		$this->listePlats = $listePlats;

		return $this;
	}
}