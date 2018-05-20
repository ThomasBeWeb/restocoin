<?php

require_once("./dao/users.php");

//$test = array('id' => 4, 'username' => 'Toto', 'password' => '1234', 'type' => 'user', 'email' => 'toto@tutu.fr');

$tyy = 'Toto';
$resultat = checkTheUsername($tyy);

var_dump($resultat);
?>