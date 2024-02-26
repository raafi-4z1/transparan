<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            
            <div class="row">
                <div class="col-lg">
                    <div class="p-4">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-3">Create an Account!</h1>
                        </div>
                        <form class="user" method="post" action="<?= base_url('auth/registration')?>">
                            <div class="modal-body">
                                <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="inputName"
                                    name="inputName" placeholder="Full Name" value="<?= set_value('inputName'); ?>">
                                    <?= form_error('inputName', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="inputNoHp" name="inputNoHp" placeholder="No Hp" value="<?= set_value('inputNoHp'); ?>">
                                    <?= form_error('inputNoHp', '<small class="text-danger pl-3">', '</small>'); ?>        
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="inputUsername" name="inputUsername" placeholder="Username" value="<?= set_value('inputUsername'); ?>">
                                    <?= form_error('inputUsername', '<small class="text-danger pl-3">', '</small>'); ?>        
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="inputPassword1" name="inputPassword1" placeholder="Password">
                                            <?= form_error('inputPassword1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="inputPassword2" name="inputPassword2" placeholder="Repeat Password">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </div>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth'); ?>">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>