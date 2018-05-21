<?php
var_dump($_COOKIE);
//Liste des liens de base
$listeFichiers = array(
    "Home" => $GLOBALS['racine'],
    "Nos cartes" => $GLOBALS['racine']."?page=cartes",
    "Contact" => $GLOBALS['racine']."?page=contact",
    "Livred'Or" => $GLOBALS['racine']."?page=livredor",
);

//Si Admin ET password confirmé, ajout de la page Administration
if(isset($_COOKIE['checked']) AND $_COOKIE['checked'] === "ok" AND isset($_COOKIE['fonction']) AND $_COOKIE['fonction'] === "admin"){
    $listeFichiers['Gestion cartes'] = $GLOBALS['racine']."?page=gestionCartes";
    $listeFichiers['Gestion users'] = $GLOBALS['racine']."?page=gestionUsers";
}
?>

<div class="d-flex flex-row align-items-center">

    <?php
    //Boucle sur la liste des fichiers et dossiers et affiche
    foreach($listeFichiers as $key => $value){

        //Ajoute class pageSelected si page active
    ?>
    <?php if((($_GET) AND $key === $_GET['page']) OR (isset($_GET['page']) === false AND $key === 'Home')):?>
        <div class="p-2 pageSelected">
    <?php else: ?>
        <div class="p-2">
    <?php endif; ?>

        <a href=<?=$value;?>><?=$key;?></a>
    </div>

    <?php
    }
    ?>
    <!-- Partie connexion, En fonction de l'état des cookies -->

    <?php if(isset($_COOKIE['username'])):?> <!-- Username OK -->
        
        <?php if($_COOKIE['checked'] === "wrongPassword"):?> <!-- Password pas OK: Affichage login avec username pré inscrit-->
            <div class="ml-auto p-2">
                <form class="form-inline" action=<?=$GLOBALS['racine']."login.php"?> role="form" method="post">
                    <h6 class="titreMiddle">Username</h6>
                    <input type="text" class="form-control form-control-sm" name="username" id="username"  placeholder="Enter your Username" value=<?=$_COOKIE['username'];?>>
                    <h6 class="titreMiddle">Password</h6>
                    <input type="password" class="form-control form-control-sm wrongInput" name="password" id="password"  placeholder="password">
                    <button type="submit" class="btn btn-primary btn-sm">Login</button>
                </form>
            </div>

        <?php else: ?> <!-- TOUT EST OK -->

            <div class="ml-auto p-2">
                <h6 class="titreMiddle"><?=$_COOKIE['username'];?></h6>
            </div>
            <div class="p-2">
                <a href=<?=$GLOBALS['racine']."login.php"?>><i class="fas fa-window-close"></i></a>
            </div>

        <?php endif; ?>

    <?php else: ?> <!-- Username pas OK ou Pas de cookie username -->
        <div class="ml-auto p-2">
            <button type="submit" class="btn btn-outline-success btn-sm" onclick="showMeTheInscription();">Inscription</button>
        </div>
        <div class="p-2">
            <form class="form-inline" action=<?=$GLOBALS['racine']."login.php"?> role="form" method="post">
                <h6 class="titreMiddle">Username</h6>
                <input type="text" class="form-control form-control-sm" name="username" id="username"  placeholder="Enter your Username" value="administrateur"/>
                <h6 class="titreMiddle">Password</h6>
                <input type="password" class="form-control form-control-sm" name="password" id="password"  placeholder="password"/>
                <button type="submit" class="btn btn-primary btn-sm">Login</button>
            </form>
        </div>

        <?php if(isset($_COOKIE['checked']) AND $_COOKIE['checked'] === 'wrongUsername' ):?> <!-- Forcer la modal inscription -->
        
        <?php endif; ?>

    <?php endif; ?>

</div>
