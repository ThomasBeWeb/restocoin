<?php

//Recuperation de la liste des cartes Online
$filtre = array("online"=> 1);
$dao = new DAOCarte();
$listeCards = $dao->getAllBy($filtre);

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
//Pour chaque carte: affichage

foreach($listeCards as $Carte){
?>
        <div class="row justify-content-center">
                <h2><?= $Carte->getNom();?></h2>
        </div>
        <div class="d-flex flex-column">
        </div>

        <?php

                var_dump($Carte->getListeMenus());
        //Boucle sur la liste des menus
        foreach($Carte->getListeMenus() as $menu){

        //Prix du menu
        $prixMenu = 0 //giveMeMenuPrice($menuID);

        ?>
        <div class="d-flex flex-column petiteCarte">
                <div class="p-2">
                        <h3><?= $menu->getNom();?> . " (" . $prixMenu . " €)"; ?></h3>
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