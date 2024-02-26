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
          <div class="col" style="align-self: center;">
            <h4 class="d-inline-flex m-0 bd-highlight">Bahan Produk : <?= count($dstok); ?></h4>
          </div>
        </div>
        <div class="row m-2 shadow-sm mb-3 p-2 rounded" style="background-color: rgb(177, 236, 247)">
          <div class="col" style="align-self: center;">
            <p class="d-inline-flex m-0 bd-highlight">Merupakan Daftar Bahan Produk dan Stok</p>
            <?= $this->session->flashdata('message'); ?>
          </div>
          <div class="col-sm-3 text-end">
            <button type="button" class="btn btn-primary btn-sm rounded-pill float-sm-right shadow" data-toggle="modal" data-target="#addBahan">Tambah</button>
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
                            <th scope="col">Jenis Bahan</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Spesifikasi</th>
                            <th scope="col" style="width: 8rem">Aksi</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Jenis Bahan</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Spesifikasi</th>
                            <th scope="col" style="width: 8rem">Aksi</th>
                          </tr>
                        </tfoot>
                        <tbody>
                          <?php
                          $i = 1; 
                          foreach($dstok as $ds): 
                          ?>
                          <tr>
                            <th class="text-center" scope="row"><?= $i; ?></th>
                            <td><?= $ds['jenis_bahan']; ?></td>
                            <td><?= $ds['stok']; ?></td>
                            <td><?= $ds['spesifikasi']; ?></td>
                            <td>
                              <div class="d-inline-flex m-0 p-1 bd-highlight">
                                <a href="<?= base_url('admin/dstokedit/'.$ds['id_bahan_produk']); ?>">
                                  <button type="button" class="btn btn-primary btn-sm rounded-pill shadow">Ubah</button>
                                </a>
                              </div>
                              <div class="d-inline-flex m-0 p-1 bd-highlight">
                                <a href="<?= base_url('admin/hapus/bp/'.$ds['id_bahan_produk']); ?>">
                                  <button type="button" class="btn btn-danger btn-sm rounded-pill shadow"
                                  onclick="return confirm('Anda yakin mau menghapus data bahan produk ini ?')">Hapus</button>
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

  <!-- Modal Add Bahan Produk -->
  <div class="modal fade" id="addBahan" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addBahanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addBahanLabel">Add Bahan Produk!</h5>
        </div>
        <div class="modal-body">
          <?= form_open_multipart('admin/dstok'); ?>
          <div class="form-group">
            <input type="text" class="form-control form-control-user" id="inputBahan"
              name="inputBahan" placeholder="Jenis Bahan" value="<?= set_value('inputBahan'); ?>">
              <?= form_error('inputBahan', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <input type="text" class="form-control form-control-user" id="inputStok"
            name="inputStok" placeholder="Stok" value="<?= set_value('inputStok'); ?>">
            <?= form_error('inputStok', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <input type="text" class="form-control form-control-user" id="inputSpesifikasi"
              name="inputSpesifikasi" placeholder="Spesifikasi" value="<?= set_value('inputSpesifikasi'); ?>">
              <?= form_error('inputSpesifikasi', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>