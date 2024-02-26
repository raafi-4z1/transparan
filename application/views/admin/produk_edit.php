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
                <?= form_open_multipart('admin/produkedit/edit/'.$produk['id_produk']); ?>
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-3 col-form-label"><h5>Nama Produk</h5></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputName" name="inputName" value="<?= $produk['nama_produk']; ?>" <?= $acc == 'liat' ? 'readonly' : '' ;?>>
                            <?= form_error('inputName', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputHarga" class="col-sm-3 col-form-label"><h5>Harga Produk</h5></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputHarga" name="inputHarga" value="<?= $produk['harga']; ?>" <?= $acc == 'liat' ? 'readonly' : '' ;?>>
                            <?= form_error('inputHarga', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_bahan" class="col-sm-3 col-form-label"><h5>Select Bahan</h5></label>
                        <div class="col-sm-9">
                        <select name="id_bahan" id="id_bahan" class="form-control">
                            <option value="">Bahan (Spesifikasi)</option>
                            <?php foreach ($bahan as $b) :
                                if ($b['id_bahan_produk'] == $produk['id_bahan_produk']) :
                                ?>
                                <option selected value="<?= $b['id_bahan_produk']; ?>"><?= $b['jenis_bahan']; ?> (<?= $b['spesifikasi'] == '' ? '---': $b['spesifikasi']; ?>)</option>
                            <?php
                                else :
                                ?>
                                <option value="<?= $b['id_bahan_produk']; ?>"><?= $b['jenis_bahan']; ?> (<?= $b['spesifikasi'] == '' ? '---': $b['spesifikasi']; ?>)</option>
                            <?php endif;
                            endforeach; ?>
                        </select>
                        <?= form_error('id_bahan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="formDeskripsi" class="col-sm-3 col-form-label"><h5>Deskripsi Produk</h5></label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="formDeskripsi" name="formDeskripsi" rows="3" <?= $acc == 'liat' ? 'readonly' : '' ;?>><?= $produk['deskripsi'];  ?></textarea>
                            <?= form_error('formDeskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3"><h5>Picture</h5><br>(Max. 64 kb & 512x384 px)</div>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= $produk['gambar'] == '' ? base_url('assets/img/default/no_image.png') : 'data:image/jpeg;base64,'.base64_encode( $produk['gambar'] ); ?>" class="img-thumbnail" style="max-width: 150px;">
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
                        <a href="<?= base_url('admin/dproduk'); ?>">
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




<!-- <div class="modal-dialog modal-dialog-scrollable">
<div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="myModalLabel">Produk</h5>
    </div>
    <div class="modal-body">
    < form_open_multipart('admin'); ?>
    <div class="form-group">
        <input type="text" class="form-control form-control-user" id="inputName"
        name="inputName" placeholder="Nama Produk" value="<= $produk['nama_produk']; ?>">
        < form_error('inputName', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    <div class="form-group">
        <input type="text" class="form-control form-control-user" id="inputHarga"
        name="inputHarga" placeholder="Harga Produk" value="<= $produk['harga']; ?>">
        < form_error('inputHarga', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    <div class="form-group">
        <select name="id_bahan" id="id_bahan" class="form-control">
        <option value="">Select Bahan (Spesifikasi)</option>
        <php foreach ($bahan as $b) :
            if ($b['id_bahan_produk'] == $produk['id_bahan_produk']) :
            ?>
            <option selected value="<= $b['id_bahan_produk']; ?>"><= $b['jenis_bahan']; ?> (<= $b['spesifikasi'] == '' ? '---': $b['spesifikasi']; ?>)</option>
        <php
            else :
            ?>
            <option value="<= $b['id_bahan_produk']; ?>"><= $b['jenis_bahan']; ?> (<= $b['spesifikasi'] == '' ? '---': $b['spesifikasi']; ?>)</option>
        <php endif;
        endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <textarea class="form-control" id="formDeskripsi" name="formDeskripsi" rows="3" placeholder="Deskripsi Produk"><= $produk['deskripsi'];  ?></textarea>
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
</div> -->