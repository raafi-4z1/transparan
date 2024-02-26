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
                <?= form_open_multipart('admin/dstokedit/'.$dstok['id_bahan_produk']); ?>
                    <div class="form-group row">
                        <label for="inputBahan" class="col-sm-3 col-form-label"><h5>Jenis Bahan</h5></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputBahan" name="inputBahan" value="<?= $dstok['jenis_bahan']; ?>">
                            <?= form_error('inputBahan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputStok" class="col-sm-3 col-form-label"><h5>Stok</h5></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputStok" name="inputStok" value="<?= $dstok['stok']; ?>">
                            <?= form_error('inputStok', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputSpesifikasi" class="col-sm-3 col-form-label"><h5>Spesifikasi</h5></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputSpesifikasi" name="inputSpesifikasi" value="<?= $dstok['spesifikasi']; ?>">
                            <?= form_error('inputSpesifikasi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">
                        <a href="<?= base_url('admin/dstok'); ?>">
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