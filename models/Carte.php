<?php
require("./database.php");

class Carte {
	protected $id;
	protected $nom;
	protected $description;
	protected $liste_menus;

    public function __construct($id=null, $nom=null, $description=null, $liste_menus=null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->liste_menus = $liste_menus;

        //Si seul l'id est renseigné, on recupere les infos dans la BDD
        if($nom === null AND $description === null AND $liste_menus === null){
            $this->load($id);
        
        }
    }

    private function load($id){

        $db = Database::connect();
        $statement = $db->query("SELECT * FROM CARTES WHERE id = ".$id);
        $result = $statement->fetch();
        Database::disconnect();

        $this->nom = $result['nom'];
        $this->description = $result['description'];
        $this->liste_menus = $result['liste_menus'];

    }

    public function create(){

        $db = Database::connect();
        $statement = $db->prepare("INSERT INTO CARTES 
        (nom,description,liste_menus)
        VALUES(?, ?, ?)");
        $statement->execute(array(
            $this->nom,
            $this->description,
            $this->liste_menus
        ));
        $this->id = $db->lastInsertId();
        Database::disconnect();
    }

    public function to_array(){

        $array = array(
            "id" => $this->id,
            "nom" => $this->nom,
            "description" => $this->description,
            "liste_menus" => $this->liste_menus
        );

        return $array;
    }


}