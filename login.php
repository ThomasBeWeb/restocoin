<?php
require('./config.php');
require('./dao/users.php');

//SI POST: Login SINON Deconnexion

if($_POST){  //CONNEXION

    //Recup des infos:
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Verification du username
    $testUser = checkTheUsername($username);

    if($testUser === 0){ //tentative de connexion avec username inconnu

        setcookie("checked", "wrongUsername", time()+3600);

        //Retour Home
        header("location: " . $GLOBALS['racine']);

    }else{  //Username reconnu

        //Recup de ses infos
        $user = showMeThisUser($testUser);

        setcookie("username", $username, time()+3600);

        //Test du password
        if($user['password'] !== $password){    //Mauvais password

            setcookie("checked", "wrongPassword", time()+3600);

            //Retour page precedente
            header("location: " . $_SERVER['HTTP_REFERER']);

        }else{

            setcookie("checked", "ok", time()+3600);

            //Ajout du cookie Type de user
            setcookie("fonction", $user['type'], time()+3600);

            //Retour page precedente
            header("location: " . $_SERVER['HTTP_REFERER']);
        }
    }

}else{  //DECONNEXION

    //Suppression des cookies
    setcookie("username", "", time()-3600);
    setcookie("checked", "", time()-3600);
    setcookie("fonction", "", time()-3600);

    //En fonction des pages d'origine
    if($_SERVER['HTTP_REFERER'] === $GLOBALS['racine']."?page=gestionCartes" OR $_SERVER['HTTP_REFERER'] === $GLOBALS['racine']."?page=gestionUsers"){
        header("location: " . $GLOBALS['racine']);
    }else{
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
}

?>