<?php

require_once("./dao/types.php");

$test = array('id_type' => 2, 'prix' => 5.6 , 'nom' => "BlaBlaBla", 'url' => "./tutut.jpg", 'id' => 1);    //

//updatePlat($test)

$resultat = showMeTheTypes();
var_dump($resultat);


?>