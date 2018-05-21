<?php
require("./database.php");

//RETOURNE LA LISTE DES PLATS
function showMeThePlats(){
    $db = Database::connect();
    $statement = $db->query("SELECT * FROM PLATS");
    $results = $statement->fetchAll(PDO::FETCH_CLASS);
    Database::disconnect();

    return $results;
};

//RETOURNE UN SEUL PLAT
function showMeThisPlat($id){
    $db = Database::connect();
    $statement = $db->query("SELECT * FROM PLATS WHERE id = ".$id);
    $result = $statement->fetch();
    Database::disconnect();

    return $result;
};


//AJOUTE UN PLAT
function addPlat($newPlat){
    //Recup des infos
    $idType = intval($newPlat['id_type']);
    $prix = floatval($newPlat['prix']);
    $nom = $newPlat['nom'];
    $url = $newPlat['url'];

    //Ajout
    $db = Database::connect();
    $statement = $db->prepare("INSERT INTO PLATS 
        (id_type,prix,nom,url)
        VALUES(?, ?, ?, ?)");
    $statement->execute(array($idType,$prix,$nom,$url));
    Database::disconnect();
};

//SUPPRIME UN PLAT
function deletePlat($id){
    $db = Database::connect();
    $statement = $db->prepare("DELETE FROM PLATS WHERE ID = ?");
    $statement->execute(array($id));
    Database::disconnect();
};

//UPDATE UN PLAT
function updatePlat($Plat){

    /*
    *Modifie les donnees d'un PLAT.
    *$Plat doit contenir l'id du PLAT à modifier
    */

    //Recup des infos
    $id = $Plat['id'];
    $idType = intval($Plat['id_type']);
    $prix = floatval($Plat['prix']);
    $nom = $Plat['nom'];
    $url = $Plat['url'];

    //Update
    $db = Database::connect();
    $statement = $db->prepare("UPDATE PLATS SET 
        id_type = ?,
        prix = ?,
        nom = ?,
        url = ?
        WHERE id = ?
        ");
    $statement->execute(array($idType,$prix,$nom,$url,$id));
    Database::disconnect();
};





