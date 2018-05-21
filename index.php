<?php
require('./config.php');

include "./template/header.php";
include "./template/navbar.php";
include "./template/modal.php";

//Affichage content en fonction du GET

if($_GET){
    include "./contents/".$_GET['page'].".php";
}else{
    include "./template/default.html";  //Page Home
}
include "./template/footer.php";
?>		