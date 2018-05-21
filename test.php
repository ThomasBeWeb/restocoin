<?php

require_once("./dao/users.php");

//$test = array('id' => 4, 'username' => 'Toto', 'password' => '1234', 'type' => 'user', 'email' => 'toto@tutu.fr');

$resultat = showMeThisUser(1);

var_dump($resultat);
?>