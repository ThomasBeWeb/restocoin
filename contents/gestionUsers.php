<div class="container" style:"justify-content: center">
    <br>
    <div class="row head">
        <h2>Gestion des administrateurs</h2>
    </div>
    <br>

    <!-- Recuperation de la liste des users et l'affiche dans une table-->
    <div class="row">

        <div class="col-5 elementCol mx-auto">
        <h4>Liste des administrateurs</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Pseudo</th>
                    <th scope="col">Mot de passe</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody id="tableUsers">

            </tbody>
        </table>
    </div>

    <!--Ajout d'un user-->

        <div class="col-5 elementCol mx-auto">
            <h4>Ajouter un administrateur</h4>

                <div class="col">
                    <label for="username">Pseudo</label>
                    <input class="form-control" name="username" id="username" type="text" width="10px">
                </div>
                <br>
                <div class="col">
                    <label for="password">Mot de passe</label>
                    <input class="form-control" name="password" id="password" type="text">
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-sm" onclick="addUser();">Ajouter</button>
        </div>
    </div>
</div>