<?php
require('./config.php');
require('./dao/users.php');

//Recup des infos et creation du tableau assoc pour fonction addUser

$newUser = array (
    'username' => $_POST['usernameInscrit'],
    'password' => $_POST['passwordInscrit'],
    'type' => "user",
    'email' => $_POST['email']
);

//Enregistrement du user
addUser($newUser);

//Creation des cookies
setcookie("username", $_POST['usernameInscrit'], time()+3600);
setcookie("checked", "ok", time()+3600);
setcookie("fonction", "user", time()+3600);

header("location: " . $_SERVER['HTTP_REFERER']);

?>