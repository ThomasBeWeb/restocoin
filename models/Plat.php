<?php
require("./database.php");

class Plat {
	protected $id;
    protected $nom;
    protected $prix;
	protected $url;

    public function __construct($id=null, $nom=null, $prix=null, $url=null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->url = $url;

        //Si seul l'id est renseigné, on recupere les infos dans la BDD
        if($nom === null AND $prix === null AND $url === null){
            $this->load($id);

        }
    }

    private function load($id){

        $db = Database::connect();
        $statement = $db->query("SELECT * FROM PLATS WHERE id = ".$id);
        $result = $statement->fetch();
        Database::disconnect();

        $this->nom = $result['nom'];
        $this->prix = $result['prix'];
        $this->url = $result['url'];

    }

    public function create(){

        $db = Database::connect();
        $statement = $db->prepare("INSERT INTO PLATS 
        (nom,prix,url)
        VALUES(?, ?, ?)");
        $statement->execute(array(
            $this->nom,
            $this->prix,
            $this->url
        ));
        $this->id = $db->lastInsertId();
        Database::disconnect();
    }

    public function to_array(){

        $array = array(
            "id" => $this->id,
            "nom" => $this->nom,
            "prix" => $this->prix,
            "url" => $this->url
        );

        return $array;
    }
}