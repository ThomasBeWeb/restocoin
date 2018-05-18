<?php
require('./folder.php');
?>

<script>

//Liste des liens

var linksListe = [
    {
        name: "Home",
        link: <?=$GLOBALS['racine'];?>
    },
    {
        name: "Nos cartes",
        link: <?=$GLOBALS['racine'];?> + "?page=cartes"
    },
    {
        name: "Contact",
        link: <?=$GLOBALS['racine'];?> + "?page=contact"
    },
    {
        name: "Livre d'Or",
        link: <?=$GLOBALS['racine'];?> + "?page=livredor"
    }
];

//Ajout des liens admins cartes et users si connecté

<?php if(isset($_COOKIE['fonction'])):?>
    <?php if($_COOKIE['fonction'] === "admin" AND $_COOKIE['checked'] === "true"):?>
        var addCartes = 
        {
        name: "Gestion cartes",
        link: <?=$GLOBALS['racine'];?> + "?page=gestionCartes"
        };

        linksListe.push(addCartes);

        var addUsers = 
        {
        name: "Gestion users",
        link: <?=$GLOBALS['racine'];?> + "?page=gestionUsers"
        };

        linksListe.push(addUsers);

    <?php endif; ?>
<?php endif; ?>
</script>

<div class="d-flex flex-row align-items-center" id="navDiv">

<script>

    for(var i = 0 ; i < linksListe.length ; i++){

        if($(location).attr('href') === linksListe[i].link){

            $('#navDiv').append($('<div>')
                .add
            )
        }
    }

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

    <a href=<?=$value?>><?=$key?></a></div>
    </script>
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
            <h6 class="titreMiddle">Username</h6>
            <input type="text" class="form-control form-control-sm" name="username" id="username"  placeholder="Enter your Username" value="administrateur"/>
            <button type="submit" class="btn btn-primary btn-sm">Login</button>
    </div>
<?php endif; ?>
</div>
