<?php
namespace BWB\CORE;

class DAOCarte extends Dao {

    public function __contruct(){
        parent::__construct();
    }

    public function retrieveOnline(){
        $sql = "SELECT * FROM CARTES WHERE online = 1";
        $results = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $cards = array();

        foreach ($results as $result) {
            $card = new Carte();
            $card->setId($result['id']);
            $card->setNom($result['nom']);
            $card->setDateCreation($result['date_creation']);
            $card->setOnline($result['online']);

            $listeMenus = array();

            foreach ($result['liste_menus'] as $idMenu) {
                $menu = new Menu();
                $dao = new DAOMenu();
                $menu = $dao->retrieve($idMenu);
                array_push($listeMenus,$menu);
            }
    
            $card->setListeMenus($listeMenus);

            array_push($cards,$card);
        }

        return $cards;
    }
    
    public function create($card){
        $sql = "INSERT INTO CARTE (nom,liste_menus,date_creation,online) VALUES ('"
        .$card->getNom()."','"
        .$card->getListeMenu()."','"
        .$card->getDateCreation()."','"
        .$card->getOnline()."')";
        $this->pdo->query($sql)->execute();
    }

    public function delete($id){
        $sql = "DELETE FROM CARTE WHERE ID = ".$id;
        $this->pdo->query($sql)->execute();
    }


    public function retrieve($id){
        $sql = "SELECT * FROM CARTE WHERE id=".$id;
        $result = $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        $card = new Carte();
        $card->setId($result['id']);
        $card->setNom($result['nom']);
        $card->setDateCreation($result['date_creation']);
        $card->setOnline($result['online']);

        $listeMenus = array();

        foreach ($result['liste_menus'] as $idMenu) {
            $menu = new Menu();
            $dao = new DAOMenu();
            $menu = $dao->retrieve($idMenu);
            array_push($listeMenus,$menu);
        }

        $card->setListeMenus($listeMenus);

        return $card;
    }

    //Update d'une carte selon son id, 2eme argument: tableau assoc "column => nouvelle valeur"
    public function update($idCard,$newValeurs){

        $sql = "UPDATE CARTE SET ";

        $compteur = 0;

        foreach ($newValeurs as $key => $value) {

            if($compteur === (count($newValeurs)-1)){
                $sql .= $key . " = '" . $value . "' ";
            }else{
                $sql .= $key . " = '" . $value . "', ";
            }

            $compteur++;
        }

        $sql .= "WHERE id = " . $idCard;

        $this->pdo->query($sql)->execute();

    }

    public function getAll(){

        $sql = "SELECT * FROM CARTE";
        $results = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $cards = array();

        foreach ($results as $result) {
            $card = new Carte();
            $card->setId($result['id']);
            $card->setNom($result['nom']);
            $card->setDateCreation($result['date_creation']);
            $card->setOnline($result['online']);

            $listeMenus = array();

            foreach ($result['liste_menus'] as $idMenu) {
                $menu = new Menu();
                $dao = new DAOMenu();
                $menu = $dao->retrieve($idMenu);
                array_push($listeMenus,$menu);
            }
    
            $card->setListeMenus($listeMenus);

            array_push($cards,$card);
        }

        return $cards;
    }

    public function getAllBy($filter){

        $request = "SELECT * FROM CARTE ";

        $i = 0;

        foreach ($filter as $key => $value) {
            if($i===0){
                $request .= "WHERE ";
            }else{
                $request .= "AND ";
            }
            $request .= $key."='".$value."'";
        }
        
        $cards = array();
        $results = $this->pdo->query($request)->fetchAll();
        
        foreach ($results as $result) {
            $card = new Carte();
            $card->setId($result['id']);
            $card->setNom($result['nom']);
            $card->setDateCreation($result['date_creation']);
            $card->setOnline($result['online']);

            $listeMenus = array();

            $listeIdMenus = json_decode($result['liste_menus'],true);

            foreach ($listeIdMenus as $idMenu) {

                $menu = new Menu();
                $dao = new DAOMenu();
                $menu = $dao->retrieve($idMenu);
                
                array_push($listeMenus,$menu);
            }
    
            $card->setListeMenus($listeMenus);

            array_push($cards,$card);
        }

        return $cards;

    }
}