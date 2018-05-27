<?php

class DAOCarte extends Dao {

    public function __contruct(){
        parent::__construct();
    }
    
    public function create($card){
        $sql = "INSERT INTO CARTE (nom,liste_menus,date_creation,online) VALUES ('"
        .$card->getNom()."','"
        .$card->getListeMenu()."','"
        .$card->getDateCreation()."','"
        .$card->getOnline()."')";
        var_dump($sql);
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
            $menu = $dao->retrieve($idMenu);
            array_push($listeMenus,$menu);
        }

        $card->setListeMenus($listeMenus);

        return $card;
    }

    public function update($entity, $columns = null){

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
        var_dump($request);
        $cards = array();
        $results = $this->pdo->query($request)->fetchAll();
        foreach ($results as $result) {
            $card = new Carte();
            $card->setId($result['id']);
            $card->setNom($result['nom']);
            $card->setDateCreation($result['date_creation']);
            $card->setOnline($result['online']);

            $listeMenus = array();

            foreach ($result['liste_menus'] as $idMenu) {
                $menu = new Menu();
                $menu = $dao->retrieve($idMenu);
                array_push($listeMenus,$menu);
            }
    
            $card->setListeMenus($listeMenus);

            array_push($cards,$card);
        }

        return $cards;

    }
}