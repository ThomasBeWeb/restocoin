<?php
require("./database.php");
/*
*Couche d'acces aux donnees pour les messages
liste des fonctions du CRUD
*/

//RECUPERER TOUS LES MESSAGES
function showMeTheMessages(){
    $db = Database::connect();
    $statement = $db->query("SELECT * FROM MESSAGES");
    $results = $statement->fetchAll(PDO::FETCH_CLASS);
    Database::disconnect();

    return $results;
};

//AJOUTE UN MESSAGE
function addMessage($newMessage){
    //Recup des infos
    $idUsername = intval($newMessage['id_username']);
    $dateCreation = date("Y-m-d");
    $message = $newMessage['message'];

    //Ajout
    $db = Database::connect();
    $statement = $db->prepare("INSERT INTO MESSAGES 
        (id_username,date_creation,message)
        VALUES(?, ?, ?)");
    $statement->execute(array($idUsername,$dateCreation,$message));
    Database::disconnect();

    return $statement;
};

//SUPPRIME UN MESSAGE
function deleteMessage($id){
    $db = Database::connect();
    $statement = $db->prepare("DELETE FROM MESSAGES WHERE ID = ?");
    $statement->execute(array($id));
    Database::disconnect();
};

?>