<?php

//On recupere le contenu du fichier sous forme de chaine de caractères
$sql = file_get_contents("../db/database.sql");

$dbh = new PDO('mysql:host=localhost;','root', 'password');

$dbh->exec($sql);
echo $sql;
