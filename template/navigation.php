<?php

//recup de la liste des fichiers du dossier content
$fichiers = scandir("./contents/");

//Creation de la liste de fichiers sous la forme: nom du lien => lien
$listeFichiers = array("Home" => $GLOBALS['racine']);

foreach($fichiers as $value){

    //Pour les fichiers:
    if(is_file("./contents/".$value) AND $value !== "gestionCartes.php" AND $value !== "gestionUsers.php"){     //Verifie si fichier et pas admin
        
        //recup du nom du lien: nom du fichier sans .php
        $name = explode(".php", $value);

        //Ajout dans le tableau
        $listeFichiers[$name[0]] = $GLOBALS['racine']."?page=".$name[0];
    
    }
}

//Si Admin ET password confirmé, ajout de la page Administration
if(isset($_COOKIE['fonction'])){
    if($_COOKIE['fonction'] === "admin" AND $_COOKIE['checked'] === "true"){
        $listeFichiers['Gestion cartes'] = $GLOBALS['racine']."?page=gestionCartes";
        $listeFichiers['Gestion users'] = $GLOBALS['racine']."?page=gestionUsers";
    }
}
?>

<div class="d-flex flex-row align-items-center">

<?php

//Boucle sur la liste des fichiers et dossiers et affiche

foreach($listeFichiers as $key => $value){

    //Ajoute class pageSelected si page active

    if((isset($_GET) AND $key === $_GET['page']) OR (isset($_GET['page']) === false AND $key === 'Home')){   //Si valeur get = key ou si page home (sans get)

        ?><div class="p-2 pageSelected"><?php

    }else{

        ?><div class="p-2"><?php

    }

    //Modif livredor pour faire joli
    if($key === "livredor"){
        $key = "Livre d'or";
    }
?>
    <a href=<?=$value?>><?=$key?></a></div>
<?php
}
//Partie connexion
?>

<?php if(isset($_COOKIE['username'])): ?>
    <div class="ml-auto p-2">
            <h6 class="titreMiddle"><?=$_COOKIE['username']?></h6>
        </div>
        <div class="p-2">
            <a href="<?=$GLOBALS['racine'].'login.php'?>"><i class="fas fa-window-close"></i></a>
        </div>
<?php else: ?>
    <div class="ml-auto p-2">
            <form class="form-inline" action="<?=$GLOBALS['racine'].'login.php'?>" role="form" method="post">
                <h6 class="titreMiddle">Username</h6>
                <input type="text" class="form-control form-control-sm" name="username" id="username"  placeholder="Enter your Username" value="administrateur"/>
                <button type="submit" class="btn btn-primary btn-sm">Login</button>
            </form>
        </div>
<?php endif; ?>
</div>
