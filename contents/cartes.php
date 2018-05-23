<?php

require './dao/cartes.php';
require './dao/menus.php';

//Recuperation de la liste des ID des cartes Online

$listeCards = showMeTheCardsOnline()

//En fonction du nb de cartes
?>
<div class="row justify-content-center">
<?php if(count($listeCards) > 1):?>
        <h1>Nos cartes du moment</h1>
<?php else: ?>
        <h1>Notre carte du moment</h1>
<?php endif; ?>
</div>
<hr>

<?php
//Pour chaque carte, recup des infos et affichage

foreach($listeCards as $Carte){
?>
        <div class="row justify-content-center">
                <h2><?= $Carte['nom'];?></h2>
        </div>
        <div class="d-flex flex-column">
        </div>
        
        <?php
        //Boucle sur la liste des menus
        foreach($Carte['liste_menus'] as $menuID){

        //Recup du menu
        $menu = showMeThisMenu($menuID);

        //Prix du menu
        $prixMenu = giveMeMenuPrice($menuID);

        ?>
        <div class="d-flex flex-column petiteCarte">
                <div class="p-2">
                        <h3><?= $menu['nom'] . " (" . $prixMenu . " €)"; ?></h3>
                        <div class="p-2 d-flex flex-row justify-content-around">
                                <div class="p-2">
                                        <h4>Entrée:</h4>
                                        <h4><?= $value['entree']['nom']; ?></h4>
                                </div>
                                <div class="p-2">
                                        <h4>Plat:</h4>
                                        <h4><?= $value['plat']['nom']; ?></h4>
                                </div>
                                <div class="p-2">
                                        <h4>Dessert:</h4>
                                        <h4><?= $value['dessert']['nom']; ?></h4>
                                </div>
                        </div>
                </div>
        </div>
        <br>
        <?php
        }

}

?>