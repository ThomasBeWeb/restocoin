<?php
require("./database.php");

//RETOURNE LA LISTE DES CARTES
function showMeTheCards(){
    $db = Database::connect();
    $statement = $db->query("SELECT * FROM CARTES");
    $results = $statement->fetchAll(PDO::FETCH_CLASS);
    Database::disconnect();

    return $results;
};

//RETOURNE UNE SEULE CARTE
function showMeThisCard($id){
    $db = Database::connect();
    $statement = $db->query("SELECT * FROM CARTES WHERE id = ".$id);
    $result = $statement->fetch();
    Database::disconnect();

    return $result;
};


//AJOUTE UNE CARTE
function addCard($newCard){
    //Recup des infos
    $nom = $newCard['nom'];
    $listeMenus = $newCard['liste_menus'];
    $dateCreation = date("Y-m-d");

    //Ajout
    $db = Database::connect();
    $statement = $db->prepare("INSERT INTO CARTES 
        (nom,liste_menus,date_creation)
        VALUES(?, ?, ?)");
    $statement->execute(array($nom,$listeMenus,$dateCreation));
    Database::disconnect();
};

//SUPPRIME UNE CARTE
function deleteCard($id){
    $db = Database::connect();
    $statement = $db->prepare("DELETE FROM CARTES WHERE ID = ?");
    $statement->execute(array($id));
    Database::disconnect();
};

//UPDATE UNE CARTE
function updateCard($card){

    /*
    *Modifie les donnees d'une carte.
    *$CARD doit contenir l'id de la carte à modifier
    *La date ne peut pas être modifiée
    */

    //Recup des infos
    $id = $card['id'];
    $nom = $card['nom'];
    $listeMenus = $card['liste_menus'];

    //Update
    $db = Database::connect();
    $statement = $db->prepare("UPDATE CARTES SET 
        nom = ?,
        liste_menus = ?
        WHERE id = ?
        ");
    $statement->execute(array($nom,$listeMenus,$id));
    Database::disconnect();
};





