<?php
require("./database.php");

//RETOURNE LES TYPES DE PLATS
function showMeTheTypes(){
    $db = Database::connect();
    $statement = $db->query("SELECT * FROM TYPES_DE_PLATS");
    $results = $statement->fetchAll(PDO::FETCH_CLASS);
    Database::disconnect();

    return $results;
};