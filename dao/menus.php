<?php
require("./database.php");

//RETOURNE LA LISTE DES MENUS
function showMeTheMenus(){
    $db = Database::connect();
    $statement = $db->query("SELECT * FROM MENUS");
    $results = $statement->fetchAll(PDO::FETCH_CLASS);
    Database::disconnect();

    return $results;
};

//RETOURNE UN SEUL MENU
function showMeThisMenu($id){
    $db = Database::connect();
    $statement = $db->query("SELECT * FROM MENUS WHERE id = ".$id);
    $result = $statement->fetch();
    Database::disconnect();

    return $result;
};


//AJOUTE UN MENU
function addMenu($newMenu){
    //Recup des infos
    $nom = $newMenu['nom'];
    $description = $newMenu['description'];
    $listePlats = $newMenu['liste_plats'];

    //Ajout
    $db = Database::connect();
    $statement = $db->prepare("INSERT INTO MENUS 
        (nom,description,liste_plats)
        VALUES(?, ?, ?)");
    $statement->execute(array($nom,$description,$listePlats));
    Database::disconnect();
};

//SUPPRIME UN MENU
function deleteMenu($id){
    $db = Database::connect();
    $statement = $db->prepare("DELETE FROM MENUS WHERE ID = ?");
    $statement->execute(array($id));
    Database::disconnect();
};

//UPDATE UN MENU
function updateMenu($Menu){

    /*
    *Modifie les donnees d'un MENU.
    *$Menu doit contenir l'id du MENU à modifier
    */

    //Recup des infos
    $id = $Menu['id'];
    $nom = $Menu['nom'];
    $description = $Menu['description'];
    $listePlats = $Menu['liste_plats'];

    //Update
    $db = Database::connect();
    $statement = $db->prepare("UPDATE MENUS SET 
        nom = ?,
        description = ?,
        liste_plats = ?
        WHERE id = ?
        ");
    $statement->execute(array($nom,$description,$listePlats,$id));
    Database::disconnect();
};





