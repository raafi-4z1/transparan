<div class="container-fluid">
  <!-- ============================================================== -->
  <!-- Isi -->
  <!-- ============================================================== -->
  <div class="row border border-secondary no-gutters bg-light min-hgt">
    <div class="col p-0">
      <div class="row m-2 shadow-sm mb-3 p-2 rounded" style="background-color: rgb(177, 236, 247)">
        <div class="col" style="align-self: center;">
          <p class="d-inline-flex m-0 bd-highlight">Edit Pemesanan</p>
          <?= $this->session->flashdata('message'); ?>
        </div>
        <div class="col-sm-3 text-end">
          <a href="<?= base_url('user/keranjang'); ?>">
          <button type="button" class="btn btn-primary btn-sm rounded-pill float-sm-right shadow">kembali</button>
          </a>
        </div>
      </div>    
      <div class="row m-2">
        <?= form_open_multipart('user/editDataKer/'.$id); ?>
          <div class="form-row row">
            <div class="form-group col-sm-3">
              <label for="selectProduk">Produk</label>
              <input type="text" class="form-control" id="selectProduk" name="selectProduk" value="<?= $dkeranjang['nama_produk']; ?>" disabled>
              <?= form_error('selectProduk', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group col-sm-3">
              <label for="selectBahan">Bahan</label>
              <input type="text" class="form-control" id="selectBahan" name="selectBahan" value="<?= $dkeranjang['jenis_bahan']; ?>" disabled>
              <?= form_error('selectBahan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group col-sm-3">
              <label for="selectSpesifikasi">Spesifikasi</label>
              <input type="text" class="form-control" id="selectSpesifikasi" name="selectSpesifikasi" value="<?= $dkeranjang['spesifikasi']; ?>" disabled>
              <?= form_error('selectSpesifikasi', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group col-sm-3">
              <label for="inputUkuran">Ukuran</label>
              <input type="text" class="form-control" id="inputUkuran" name="inputUkuran" value="<?= $dkeranjang['size']; ?>">
              <?= form_error('inputUkuran', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
          </div>
          <div class="form-row row">
            <div class="form-group col-sm-6">
              <label for="inputGambar">Gambar Desain</label>
              <div class="row">
                <div class="col-sm-4">
                  <img src="<?= $dkeranjang['gambar'] == '' ? base_url('assets/img/default/no_image1.png') : 'data:image/jpeg;base64,'.base64_encode( $dkeranjang['gambar'] ); ?>" class="img-thumbnail" style="max-width: 145px;">
                </div>
                <div class="col">
                  <input type="file" class="form-control-file m-2" id="inputGambar" name="inputGambar">
                  <?php if ($dkeranjang['gambar'] != ''): ?>
                  <a href="<?= base_url('user/hapus/gd/'.$id); ?>">
                    <button type="button" class="btn btn-danger btn-sm rounded-pill shadow m-2" 
                    onclick="return confirm('Anda yakin mau menghapus desainnya ?')">Hapus Desain</button>
                  </a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="form-group col-sm-2">
              <label for="selectLengan">Lengan</label>
              <select class="form-control" id="selectLengan" name="selectLengan">
                <option value="Panjang" <?= $dkeranjang['lengan_pe_pa'] == 'Panjang' ? 'selected' : '' ;?>>Panjang</option>
                <option value="Pendek" <?= $dkeranjang['lengan_pe_pa'] == 'Pendek' ? 'selected' : '' ;?>>Pendek</option>
              </select>
              <?= form_error('selectLengan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group col-sm-2">
              <label for="inputWarna">Warna</label>
              <input type="text" class="form-control" id="inputWarna" name="inputWarna" value="<?= $dkeranjang['color']; ?>">
              <?= form_error('inputWarna', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group col-sm-2">
              <label for="inputQty">Jumlah Pesan <small id="dstok">Stok: <?= $dkeranjang['stok']; ?></small></label>
              <input type="text" class="form-control" id="inputQty" name="inputQty" value="<?= $dkeranjang['jumlah_pesanan']; ?>">
              <?= form_error('inputQty', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="formKeterangan">Keterangan</label>
            <textarea class="form-control" id="formKeterangan" name="formKeterangan" rows="3" placeholder="Tambahan: Sablon Area A3\Jumlah dibagi 2 warna..."><?= $dkeranjang['deskripsi']; ?></textarea>
          </div>
          <button type="submit" class="btn btn-primary rounded-pill shadow-sm mb-3">Edit <i class="fas fa-edit" aria-hidden="true"></i></button>
        </form>

      </div>
    </div>
  </div>

</div>    
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->