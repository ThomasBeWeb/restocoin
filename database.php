<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=test', 'root', 'password');

} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

var_dump($dbh);

//Requete SQL (corps de la requête) du point de vue metier
$request = "SELECT * FROM eleve";
var_dump($request);
// Execution de la requête
$statement = $dbh->query($request);
var_dump($statement);
//Recuperation du resultat de la requête
$eleves = $statement->fetchAll();
print_r($eleves);

?>