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
            <div class="col-lg">
                <?= form_open_multipart('user/edit'.$cek); ?>
                    <div class="form-group row">
                        <label for="inputUsername" class="col-sm-2 col-form-label"><h5>Username</h5></label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputUsername" name="inputUsername" value="<?= $user['username']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"><h5>Full Nama</h5></label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="inputName" value="<?= $user['nama_pelanggan']; ?>">
                        <?= form_error('inputName', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputNoHp" class="col-sm-2 col-form-label"><h5>No Hp</h5></label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputNoHp" name="inputNoHp" value="<?= $user['no_telephone']; ?>">
                        <?= form_error('inputNoHp', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label"><h5>Email</h5></label>
                        <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" name="inputEmail" value="<?= $user['email']; ?>">
                        <?= form_error('inputEmail', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="formTextarea"><h5>Alamat</h5></label>
                        <textarea class="form-control" id="formTextarea" name="formTextarea" rows="3"><?= $user['alamat']; ?></textarea>
                        <?= form_error('formTextarea', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2"><h5>Picture</h5><br>(Max. 64 kb & 512x384 px)</div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col">
                                    <img src="<?= $user['gambar'] == '' ? base_url('assets/img/default/profile.png') : 'data:image/jpeg;base64,'.base64_encode( $user['gambar'] ); ?>" class="img-thumbnail" style="max-width: 150px;">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGambar" name="inputGambar">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm-10">
                            <a href="<?= $cek == '/1' ? base_url('user/keranjang') : base_url('user/profile') ; ?>">
                                <button type="button" class="btn btn-primary rounded-pill">Kembali</button>
                            </a>
                            <button type="submit" class="btn btn-primary rounded-pill">Edit</button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->