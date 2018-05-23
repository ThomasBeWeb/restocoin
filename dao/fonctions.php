<?php
require("./database.php");
require './dao/menus.php';
require './dao/plats.php';

//FONCTION QUI RETOURNE LES PLATS SELON UN TYPE
function platsForTheType($idType){
    $db = Database::connect();
    $statement = $db->query("SELECT * FROM PLATS
        WHERE id_type = (SELECT id FROM TYPES_DE_PLATS WHERE id = ".$idType.")
    ");
    $results = $statement->fetchAll(PDO::FETCH_CLASS);
    Database::disconnect();

    return $results;
};

//Retourne un menu FULL avec plats

//Retourne le prix d'un menu
function giveMeMenuPrice($id){
    
    $db = Database::connect();
    $statement = $db->query("SELECT * FROM MENUS WHERE id = ".$id);
    $result = $statement->fetch();
    Database::disconnect();

    $listePlats = $result['liste_plats'];

    $price = 0;

    foreach ($listePlats as $platID) {
        $price = $price + floatval(giveMePlatPrice($platID));
    }

    return $price;
}