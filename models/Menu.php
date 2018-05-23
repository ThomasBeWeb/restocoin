<?php
require_once("./database.php");
require("./models/Plat.php");

class Menu {
	protected $id;
	protected $nom;
	protected $description;
	protected $liste_plats;

    public function __construct($id=null, $nom=null, $description=null, $liste_plats=null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->liste_plats = $liste_plats;

        //Si seul l'id est renseigné, on recupere les infos dans la BDD
        if($nom === null AND $description === null AND $liste_plats === null){
            $this->load($id);
        
        }
    }

    private function load($id){

        $db = Dao::get_instance();
        $statement = $db->query("SELECT * FROM MENUS WHERE id = ".$id);
        $result = $statement->fetch();
        //Database::disconnect();

        $this->nom = $result['nom'];
        $this->description = $result['description'];

        foreach ($result['liste_plats'] as $idPlat) {
           $plat = new Plat($idPlat);
           array_push($this->liste_plats,$plat);
        }

    }

    public function create(){

        $db = Database::connect();
        $statement = $db->prepare("INSERT INTO MENUS 
        (nom,description,liste_plats)
        VALUES(?, ?, ?)");
        $statement->execute(array(
            $this->nom,
            $this->description,
            $this->liste_plats
        ));
        $this->id = $db->lastInsertId();
        Database::disconnect();
    }

    public function to_array(){

        $array = array(
            "id" => $this->id,
            "nom" => $this->nom,
            "description" => $this->description,
            "liste_plats" => $this->liste_plats
        );

        return $array;
    }


}