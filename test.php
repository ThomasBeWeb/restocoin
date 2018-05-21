<?php

require_once("./dao/menus.php");

$test = array('nom' => 'menu 6', 'liste_plats' => '[1,3]' , 'description' => "BlaBlaBla", 'id' => 1);

updateMenu($test)

//$resultat = showMeThisMenu(1);
//var_dump($resultat);


?>