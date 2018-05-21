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

//Enregistrement du username sur serveur NodeJS (POST: http://php.net/manual/en/function.stream-context-create.php)
$newUsername = array('id'=> 0 ,'username'=> $_POST['usernameInscrit']);
$data = json_encode($newUsername);
$context_options = array (
    'http' => array (
        'method' => 'POST',
        'header'=> "Content-type: application/json; charset=utf-8\r\n"
            . "Content-Length: " . strlen($data) . "\r\n",
        'content' => $data
        )
    );
$context = stream_context_create($context_options);
$fp = fopen('https://whispering-anchorage-52809.herokuapp.com/users/add', 'r', false, $context);
fclose($fp);

//Retour page précédente
header("location: " . $_SERVER['HTTP_REFERER']);

?>