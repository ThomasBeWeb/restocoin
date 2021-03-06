<?php
namespace BWB\CORE;

class DAOPlat extends Dao {

    public function __contruct(){
        parent::__construct();
    }
    
    public function create($plat){
        $sql = "INSERT INTO PLAT (id_type,prix,nom,url) VALUES ('"
        .$plat->getIdType()."','"
        .$plat->getPrix()."','"
        .$plat->getNom()."','"
        .$plat->getUrl()."','";

        $this->pdo->query($sql)->execute();
    }

    public function delete($id){
        $sql = "DELETE FROM PLAT WHERE ID = ".$id;
        $this->pdo->query($sql)->execute();
    }


    public function retrieve($id){
        $sql = "SELECT * FROM PLAT WHERE id=".$id;
        $result = $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        $plat = new Plat();
        $plat->setId($result['id']);
        $plat->setIdType($result['id_type']);
        $plat->setPrix($result['prix']);
        $plat->setNom($result['nom']);
        $plat->setUrl($result['url']);

        return $plat;
    }

    //Update d'un plat selon son id, 2eme argument: tableau assoc "column => nouvelle valeur"
    public function update($idPlat,$newValeurs){

        $sql = "UPDATE PLAT SET ";

        $compteur = 0;

        foreach ($newValeurs as $key => $value) {

            if($compteur === (count($newValeurs)-1)){
                $sql .= $key . " = '" . $value . "' ";
            }else{
                $sql .= $key . " = '" . $value . "', ";
            }

            $compteur++;
        }

        $sql .= "WHERE id = " . $idPlat;

        echo $sql;

        $this->pdo->query($sql)->execute();

    }

    public function getAll(){

        $sql = "SELECT * FROM PLAT";
        $results = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $plats = array();

        foreach ($results as $result) {
            $plat = new Plat();
            $plat->setId($result['id']);
            $plat->setIdType($result['id_type']);
            $plat->setPrix($result['prix']);
            $plat->setNom($result['nom']);
            $plat->setUrl($result['url']);

            array_push($plats,$plat);
        }

        return $plats;
    }

    public function getAllBy($filter){

        $request = "SELECT * FROM PLAT ";

        $i = 0;

        foreach ($filter as $key => $value) {
            if($i===0){
                $request .= "WHERE ";
            }else{
                $request .= "AND ";
            }
            $request .= $key."='".$value."'";
        }
        var_dump($request);
        $plats = array();
        $results = $this->pdo->query($request)->fetchAll();
        foreach ($results as $result) {
            $plat = new Plat();
            $plat->setId($result['id']);
            $plat->setIdType($result['id_type']);
            $plat->setPrix($result['prix']);
            $plat->setNom($result['nom']);
            $plat->setUrl($result['url']);

            array_push($plats,$plat);
        }

        return $plats;

    }
}