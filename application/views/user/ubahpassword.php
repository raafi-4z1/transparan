<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- isi -->
    <!-- ============================================================== -->
    <div class="row border border-secondary no-gutters bg-light min-hgt">
        <div class="col p-3"> 
            <div class="row m-2">
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('user/ubahpass'); ?>" method="post">
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" class="form-control" id="current_password" name="current_password">
                    <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="new_password1">New Password</label>
                    <input type="password" class="form-control" id="new_password1" name="new_password1">
                    <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="new_password2">Repeat Password</label>
                    <input type="password" class="form-control" id="new_password2" name="new_password2">
                    <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <a href="<?= base_url('user/profile'); ?>">
                        <button type="button" class="btn btn-primary rounded-pill">Kembali</button>
                    </a>
                    <button type="submit" class="btn btn-primary rounded-pill">Change Password</button>
                </div>
            </form>
            </div>
        </div>
    </div>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->