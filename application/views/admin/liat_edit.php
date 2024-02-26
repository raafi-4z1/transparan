<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
  <!-- ============================================================== -->
  <!-- Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
  <div class="page-breadcrumb bg-white">
      <div class="row align-items-center">
          <div class="col-lg col-md col-sm col-xs">
              <h4 class="page-title"><?= $title; ?></h4>
          </div>
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- ============================================================== -->
  <!-- End Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- Container fluid  -->
  <!-- ============================================================== -->
  <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Isi -->
    <!-- ============================================================== -->
    <div class="row border border-secondary no-gutters bg-light min-hgt">
      <div class="col p-3"> 
        <div class="row m-2">
            <?= $this->session->flashdata('message'); ?>
            <div class="col">
                <?= form_open_multipart('admin/liat_edit/edit/'.$pelanggan['id_pelanggan']); ?>
                    <div class="form-group row">
                        <label for="inputUsername" class="col-sm-3 col-form-label"><h5>Username</h5></label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputUsername" name="inputUsername" value="<?= $pelanggan['username']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label"><h5>Password</h5></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputPassword" name="inputPassword" value="<?= $pelanggan['password']; ?>" <?= $acc == 'liat' ? 'readonly' : '' ;?>>
                            <?= form_error('inputPassword', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-3 col-form-label"><h5>Full Nama</h5></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputName" name="inputName" value="<?= $pelanggan['nama_pelanggan']; ?>" <?= $acc == 'liat' ? 'readonly' : '' ;?>>
                            <?= form_error('inputName', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputNoHp" class="col-sm-3 col-form-label"><h5>No Hp</h5></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputNoHp" name="inputNoHp" value="<?= $pelanggan['no_telephone']; ?>" <?= $acc == 'liat' ? 'readonly' : '' ;?>>
                            <?= form_error('inputNoHp', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-3 col-form-label"><h5>Email</h5></label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="inputEmail" name="inputEmail" value="<?= $pelanggan['email']; ?>" <?= $acc == 'liat' ? 'readonly' : '' ;?>>
                            <?= form_error('inputEmail', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="formTextarea" class="col-sm-3 col-form-label"><h5>Alamat</h5></label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="formTextarea" name="formTextarea" rows="3" <?= $acc == 'liat' ? 'readonly' : '' ;?>><?= $pelanggan['alamat']; ?></textarea>
                            <?= form_error('formTextarea', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3"><h5>Picture</h5><br>(Max. 64 kb & 512x384 px)</div>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= $pelanggan['gambar'] == '' ? base_url('assets/img/default/profile.png') : 'data:image/jpeg;base64,'.base64_encode( $pelanggan['gambar'] ); ?>" class="img-thumbnail" style="max-width: 150px;">
                                </div>
                                <?php if ($acc != 'liat') : ?>
                                <div class="col">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputPicture" name="inputPicture">
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">
                        <a href="<?= base_url('admin/duser'); ?>">
                            <button type="button" class="btn btn-primary rounded-pill">Kembali</button>
                        </a>
                        <?php if ($acc != 'liat') : ?>
                            <button type="submit" class="btn btn-primary rounded-pill">Edit</button>
                        <?php endif; ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
    
  </div>    