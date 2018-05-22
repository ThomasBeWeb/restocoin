<!-- Modal -->
<div class="modal fade" id="inscriptionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Connexion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action=<?=$GLOBALS['racine']."inscription.php"?> role="form" method="post">
            <div class="form-group">
                <label for="username"><i class="fas fa-user"></i> Login</label>
                <input type="text" class="form-control" name="usernameInscrit" id="usernameInscrit" placeholder="Enter your Username"/>
            </div>
            <div class="form-group">
                <label for="password"><i class="fas fa-key"></i> Password</label>
                <input type="text" class="form-control" name="passwordInscrit" id="passwordInscrit" placeholder="Enter your Password"/>                 
            </div>
            <div class="form-group">
              <label for="password"><i class="fas fa-at"></i> Email</label>
              <input type="text" class="form-control" name="email" id="email" placeholder="Enter your email adress"/>   
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Sign Up</button>
      </div>
      </form>
    </div>
  </div>
</div>

