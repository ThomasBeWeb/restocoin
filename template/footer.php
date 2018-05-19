</div>
</body>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="./scripts/scriptNavBar.js" type="text/javascript"></script>

<!-- Ajout de scripts JS en fonction de la page demandée -->

<?php if($_GET AND $_GET['page'] === "gestionCartes"):?>
<script src="./scripts/scriptCards.js" type="text/javascript"></script>

<?php elseif($_GET AND $_GET['page'] === "gestionUsers"):?>
<script src="./scripts/scriptUsers.js" type="text/javascript"></script>
<?php endif; ?>

</html>	