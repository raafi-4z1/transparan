<div class="modal fade" id="modalUser" tabindex="-1" aria-labelledby="modalUserLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalUserLabel">Form Login</h5>
      </div>                   
      <form class="user" method="post" action="<?=  base_url('auth'); ?>">
          <div class="modal-body">
            <div class="form-group">
                <label for="inputUsername">Username</label>
                <input type="text" class="form-control rounded-pill" id="inputUsername" name="inputUsername">
                <?= form_error('inputUsername', '<small class="text-danger pl-3">', '</small>'); ?>        
            </div>
            <div class="form-group">
                <label for="inputPassword">Password</label>
                <input type="password" class="form-control rounded-pill" id="inputPassword" name="inputPassword">
                <?= form_error('inputPassword', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group"> 
            <a href="<?=  base_url('auth/registration'); ?>">Buat Akun?</a>
            </div>
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-primary rounded-pill">Submit</button>
          </div>
      </form>
    </div>
  </div>
</div>