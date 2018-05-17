<?php
    //Securite: Verification de $_SESSION avant d'afficher les pages admin cartes et user
    if($_GET){
        if($_GET['page'] === "gestionCartes" OR $_GET['page'] === "gestionUsers"){
            if(isset($_COOKIE['fonction']) === false OR $_COOKIE['fonction'] !== "admin" OR $_COOKIE['checked'] !== "true"){
                header("location: " . $GLOBALS['racine']);
            }
        }
    };
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Rest'O Coin</title>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="./favicon.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        
        <link href="./css/style.css" rel="stylesheet">
        <?php
        if($_GET){
            if($_GET['page'] === "gestionCartes"){
                ?>
                 <link href="./css/backStyle.css" rel="stylesheet">
                 <?php
                     }else if($_GET['page'] === "login"){
                 ?>
                 <link href="./css/styleConnexion.css" rel="stylesheet">
                 <?php
            }
                 
        }
        ?>  
    </head>
        <body>
        <div class="container-fluid">