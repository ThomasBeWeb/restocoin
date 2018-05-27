<?php

//Affichage content en fonction de l'URI

$uri = explode("/",$_SERVER['REQUEST_URI']);

switch($uri[2]){

    case "":    //Home
        include "./template/default.html";
        break;

    case "lastCards":   //Nos cartes
        include "./contents/cartes.php";
        break;
    
    default:
        break;

}

