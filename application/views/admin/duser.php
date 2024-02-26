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
    <div class="col p-0">
      <div class="row m-2">
        <div class="col">
          <h4 class="d-inline-flex m-0 bd-highlight">User: <?= count($pelanggan); ?></h4>
        </div>
      </div>
      <div class="row m-2 shadow-sm mb-3 p-2 rounded" style="background-color: rgb(177, 236, 247)">
        <div class="col" style="align-self: center;">
          <p class="d-inline-flex m-0 bd-highlight">Ganti password user dapat diubah di tombol 'Ubah'</p>
          <?= $this->session->flashdata('message'); ?>
        </div>
        <div class="col-sm-3 text-end">
          <button type="button" class="btn btn-primary btn-sm rounded-pill float-sm-right shadow" data-toggle="modal" data-target="#addUser">Tambah User</button>
        </div>
      </div>    
      <div class="row m-2">
        <!-- DataTales Example -->
        <div class="card shadow mb-3">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No Hp</th>
                    <th scope="col">Email</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No Hp</th>
                    <th scope="col">Email</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php
                  $i = 1; 
                  foreach($pelanggan as $p): 
                    if (strlen($p['no_telephone']) == 12) {
                      $p['no_telephone'] = '+62 '.substr($p['no_telephone'], 1, 3).'-'.substr($p['no_telephone'], 4, 4).'-'.substr($p['no_telephone'], 8);
                    } elseif (strlen($p['no_telephone']) == 11) {
                      $p['no_telephone'] = '+62 '.substr($p['no_telephone'], 1, 2).'-'.substr($p['no_telephone'], 3, 4).'-'.substr($p['no_telephone'], 7);
                    }
                  ?>
                  <tr>
                    <th class="text-center" scope="row"><?= $i; ?></th>
                    <td><?= $p['nama_pelanggan']; ?></td>
                    <td style="width:10em;"><?= $p['no_telephone']; ?></td>
                    <td><?= $p['email']; ?></td>
                    <td><?= $p['alamat']; ?></td>
                    <td class="wdth">
                    <div class="d-inline-flex m-0 p-1 bd-highlight">
                      <a href="<?= base_url('admin/liat_edit/liat/'.$p['id_pelanggan']); ?>">
                        <button type="button" class="btn btn-primary btn-sm rounded-pill shadow wdth">Lihat</button>
                      </a>
                    </div>
                    <div class="d-inline-flex m-0 p-1 bd-highlight">
                      <a href="<?= base_url('admin/liat_edit/edit/'.$p['id_pelanggan']); ?>">
                        <button type="button" class="btn btn-primary btn-sm rounded-pill shadow wdth">Ubah</button>
                      </a>
                    </div>
                    <div class="d-inline-flex m-0 p-1 bd-highlight">
                      <a href="<?= base_url('admin/hapus/u/'.$p['id_pelanggan']); ?>">
                        <button type="button" class="btn btn-danger btn-sm rounded-pill shadow wdth" 
                        onclick="return confirm('Anda yakin mau menghapus data user ini ?')">Hapus</button>
                      </a>
                    </div>
                    </td>
                  </tr>
                  <?php 
                  $i++;
                  endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    
  </div>    
  <!-- ============================================================== -->
  <!-- End Container fluid  -->
  <!-- ============================================================== -->

  <!-- Modal -->
  <div class="modal fade" id="addUser" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addUserLabel">Add User!</h5>
        </div>
        <div class="modal-body">
          <?= form_open_multipart('admin/duser'); ?>
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
            <div class="form-group">
              <input type="email" class="form-control" id="inputEmail" name="inputEmail" value="<?= set_value('inputEmail'); ?>" placeholder="Email">
                <?= form_error('inputEmail', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <textarea class="form-control" id="formTextarea" name="formTextarea" rows="3" placeholder="Alamat"><?= set_value('formTextarea'); ?></textarea>
            </div>
            <div class="form-group">
              <label for="inputPicture">Picture (Max. 64 kb & 512x384 px)</label>
              <input type="file" class="custom-file-input" id="inputPicture" name="inputPicture">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>