<?php

//Affichage content en fonction de l'URI

$liste = explode("/",$_SERVER['REQUEST_URI']);

switch($liste[1]){

    case "":    //Home
        include "./template/default.html";
        break;

    case "lastCards":   //Nos cartes
        include "./contents/cartes.php";
        break;
    
    default:
        break;

}
