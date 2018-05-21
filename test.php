<?php

require_once("./dao/fonctions.php");

//$test = array('id_type' => 2, 'prix' => 5.6 , 'nom' => "BlaBlaBla", 'url' => "./tutut.jpg", 'id' => 1);    //

//updatePlat($test)

$resultat = platsForTheType(1);
var_dump($resultat);


?>