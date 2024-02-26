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
              <h4 class="d-inline-flex m-0 bd-highlight">Produk : <?= count($produk); ?></h4>
            </div>
          </div>
          <div class="row m-2 shadow-sm mb-3 p-2 rounded" style="background-color: rgb(177, 236, 247)">
            <div class="col" style="align-self: center;">
              <p class="d-inline-flex m-0 bd-highlight">Merupakan Daftar Produk</p>
              <?= $this->session->flashdata('message'); ?>
            </div>
            <div class="col-sm-3 text-end">
              <button type="button" class="btn btn-primary btn-sm rounded-pill float-sm-right shadow" data-toggle="modal" data-target="#addProduk">Tambah Produk</button>
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
                              <th scope="col">Produk</th>
                              <th scope="col">Bahan</th>
                              <th scope="col">Spesifikasi</th>
                              <th scope="col">Deskripsi</th>
                              <th scope="col" style="width: 7rem;">Harga (Rp.)</th>
                              <th scope="col">Aksi</th>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr class="text-center">
                              <th scope="col">Produk</th>
                              <th scope="col">Bahan</th>
                              <th scope="col">Spesifikasi</th>
                              <th scope="col">Deskripsi</th>
                              <th scope="col" style="width: 7rem;">Harga (Rp.)</th>
                              <th scope="col">Aksi</th>
                            </tr>
                          </tfoot>
                          <tbody>
                            <?php
                            foreach($produk as $pr): 
                            ?>
                            <tr>
                              <td><?= $pr['nama_produk']; ?></td>
                              <td><?= $pr['jenis_bahan']; ?></td>
                              <td><?= $pr['spesifikasi']; ?></td>
                              <td><?= $pr['deskripsi']; ?></td>
                              <td><?= $pr['harga']; ?></td>
                              <td class="wdth">
                                <div class="d-inline-flex m-0 p-1 bd-highlight">
                                  <a href="<?= base_url('admin/produkEdit/liat/'.$pr['id_produk']); ?>">
                                    <button type="button" class="btn btn-primary btn-sm rounded-pill shadow wdth">Detail</button>
                                  </a>
                                </div>
                                <div class="d-inline-flex m-0 p-1 bd-highlight">
                                  <a href="<?= base_url('admin/produkEdit/edit/'.$pr['id_produk']); ?>">
                                    <button type="button" id_val="<?= $pr['id_produk']; ?>" class="btn btn-primary btn-sm rounded-pill shadow wdth">Ubah</button>
                                  </a>
                                </div>
                                <div class="d-inline-flex m-0 p-1 bd-highlight">
                                  <a href="<?= base_url('admin/hapus/p/'.$pr['id_produk']); ?>">
                                    <button type="button" class="btn btn-danger btn-sm rounded-pill shadow wdth"
                                    onclick="return confirm('Anda yakin mau menghapus data produk ini ?')">Hapus</button>
                                  </a>
                                </div>
                              </td>
                            </tr>
                            <?php 
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

    <!-- Modal Add Produk -->
    <div class="modal fade" id="addProduk" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addProdukLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addProdukLabel">Add Produk!</h5>
          </div>
          <div class="modal-body">
            <?= form_open_multipart('admin/dproduk'); ?>
            <div class="form-group">
              <input type="text" class="form-control form-control-user" id="inputName"
                name="inputName" placeholder="Nama Produk" value="<?= set_value('inputName'); ?>">
                <?= form_error('inputName', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-user" id="inputHarga"
                name="inputHarga" placeholder="Harga Produk" value="<?= set_value('inputHarga'); ?>">
                <?= form_error('inputHarga', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <select name="id_bahan" id="id_bahan" class="form-control">
                <option value="">Select Bahan (Spesifikasi)</option>
                <?php foreach ($bahan as $b) :?>
                  <option value="<?= $b['id_bahan_produk']; ?>"><?= $b['jenis_bahan']; ?> (<?= $b['spesifikasi'] == '' ? '---': $b['spesifikasi']; ?>)</option>
                <?php endforeach; ?>
              </select>
              <?= form_error('id_bahan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <textarea class="form-control" id="formDeskripsi" name="formDeskripsi" rows="3" placeholder="Deskripsi Produk"><?= set_value('formDeskripsi'); ?></textarea>
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