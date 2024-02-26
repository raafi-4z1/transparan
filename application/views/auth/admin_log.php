<div class="modal fade" id="modalAdmin" tabindex="-1" aria-labelledby="modalAdminLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAdminLabel">Form Login</h5>
      </div>                   
      <form class="user" method="post" action="<?=  base_url('auth/admin'); ?>">
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
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-primary rounded-pill">Submit</button>
          </div>
      </form>
    </div>
  </div>
</div>