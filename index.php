<?php
require('./folder.php');

include "./template/header.php";
include "./template/modal.html";

//Affichage content en fonction du GET

if($_GET){
    include "./contents/".$_GET['page'].".php";
}else{
    include "./template/default.html";  //Page Home
}
include "./template/footer.php";
?>		