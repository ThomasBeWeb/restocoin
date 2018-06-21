<?php
namespace BWB\CORE;

class DAOMenu extends Dao {

    public function __contruct(){
        parent::__construct();
    }
    
    public function create($menu){
        $sql = "INSERT INTO MENU (nom,description,liste_plats) VALUES ('"
        .$menu->getNom()."','"
        .$menu->getDescription()."','"
        .$menu->getListePlats()."','";

        $this->pdo->query($sql)->execute();
    }

    public function delete($id){
        $sql = "DELETE FROM MENU WHERE ID = ".$id;
        $this->pdo->query($sql)->execute();
    }


    public function retrieve($id){
        $sql = "SELECT * FROM MENU WHERE id=".$id;
        $result = $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        $menu = new Menu();
        $menu->setId($result['id']);
        $menu->setNom($result['nom']);
        $menu->setDescription($result['description']);
        $menu->setListePlats($result['liste_plats']);

        return $menu;
    }

        //Update d'un menu selon son id, 2eme argument: tableau assoc "column => nouvelle valeur"
        public function update($idMenu,$newValeurs){

            $sql = "UPDATE MENU SET ";
    
            $compteur = 0;
    
            foreach ($newValeurs as $key => $value) {
    
                if($compteur === (count($newValeurs)-1)){
                    $sql .= $key . " = '" . $value . "' ";
                }else{
                    $sql .= $key . " = '" . $value . "', ";
                }
    
                $compteur++;
            }
    
            $sql .= "WHERE id = " . $idMenu;
    
            $this->pdo->query($sql)->execute();
    
        }

    public function getAll(){

        $sql = "SELECT * FROM MENU";
        $results = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $menus = array();

        foreach ($results as $result) {
            $menu = new Menu();
            $menu->setId($result['id']);
            $menu->setNom($result['nom']);
            $menu->setDescription($result['description']);
            $menu->setListePlats($result['liste_plats']);

            array_push($menus,$menu);
        }

        return $menus;
    }

    public function getAllBy($filter){

        $request = "SELECT * FROM MENU ";

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
        $menus = array();
        $results = $this->pdo->query($request)->fetchAll();
        foreach ($results as $result) {
            $menu = new Menu();
            $menu->setId($result['id']);
            $menu->setNom($result['nom']);
            $menu->setDescription($result['description']);
            $menu->setListePlats($result['liste_plats']);

            array_push($menus,$menu);
        }

        return $menus;

    }
}