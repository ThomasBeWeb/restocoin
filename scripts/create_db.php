<?php

/*
*Ce fichier va nous permettre d'initialiser nos données en créant la db et les tables qui vont avec
*Pour cela, les requêtes sont enregistrees dans un fichier nommé database.sql
*/

//On recupere le contenu du fichier sous forme de chaine de caractères
$sql = file_get_contents("../db/database.sql");

$dbh = new PDO('mysql:host=localhost;','root', 'password');

$dbh->exec($sql);
echo $sql;
