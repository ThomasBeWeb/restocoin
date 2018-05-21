<?php
require("./database.php");

//RETOURNE LA LISTE DES USERS
function showMeTheUsers(){
    $db = Database::connect();
    $statement = $db->query("SELECT * FROM USERS");
    $results = $statement->fetchAll(PDO::FETCH_CLASS);
    Database::disconnect();

    return $results;
};

//RETOURNE UN SEUL USER
function showMeThisUser($id){
    $db = Database::connect();
    $statement = $db->query("SELECT * FROM USERS WHERE id = ".$id);
    $result = $statement->fetch();
    Database::disconnect();

    return $result;
};


//AJOUTE UN USER
function addUser($newUser){
    //Recup des infos
    $username = $newUser['username'];
    $password = $newUser['password'];
    $type = $newUser['type'];
    $email = $newUser['email'];

    //Ajout
    $db = Database::connect();
    $statement = $db->prepare("INSERT INTO USERS 
        (username,password,type,email)
        VALUES(?, ?, ?, ?)");
    $statement->execute(array($username,$password,$type,$email));
    Database::disconnect();
};

//SUPPRIME UN USER
function deleteUser($id){
    $db = Database::connect();
    $statement = $db->prepare("DELETE FROM USERS WHERE ID = ?");
    $statement->execute(array($id));
    Database::disconnect();
};

//UPDATE UN USER
function updateUser($user){

    /*
    *Modifie les donnees d'un user.
    *$USER doit contenir l'id du user à modifier
    */

    //Recup des infos
    $id = $user['id'];
    $username = $user['username'];
    $password = $user['password'];
    $type = $user['type'];
    $email = $user['email'];

    //Update
    $db = Database::connect();
    $statement = $db->prepare("UPDATE USERS SET 
        username = ?,
        password = ?,
        type = ?,
        email = ?
        WHERE ID = ?
        ");
    $statement->execute(array($username,$password,$type,$email,$id));
    Database::disconnect();
};

//CHECH SI UN USERNAME EXISTE, return son id si oui, 0 sinon
function checkTheUsername($name){

    $db = Database::connect();
    $statement = $db->query("SELECT * FROM USERS WHERE username = '".$name."'");
    $result = $statement->fetch();
    Database::disconnect();

    if($result === false){
        return 0;
    }else{
        return $result['id'];
    }
    
};





