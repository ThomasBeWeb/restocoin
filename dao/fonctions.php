<?php
require("./database.php");

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
