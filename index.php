<?php
spl_autoload_register(function ($class) {
    if(file_exists('./core/' . $class . '.php')):
        include './core/' . $class . '.php';
    elseif(file_exists('./models/' . $class . '.php')):
        include './models/' . $class . '.php';
    endif;  
    
 });

include "./template/header.php";
include "./template/navbar.php";
include "./template/modal.php";
include "./routing.php";
include "./template/footer.php";
?>		