<div class="container-fluid">
  <!-- ============================================================== -->
  <!-- Isi -->
  <!-- ============================================================== -->
  <div class="row border border-secondary no-gutters bg-light min-hgt">
    <div class="col p-0">
      <div class="row m-2 shadow-sm mb-3 p-2 rounded" style="background-color: rgb(177, 236, 247)">
        <div class="col" style="align-self: center;">
          <p class="d-inline-flex m-0 bd-highlight">Tanggal pesanan tidak dapat dirubah, dan tanggal deatline menyesuaikan pembayaran pertama kali</p>
          <?= $this->session->flashdata('message'); ?>
        </div>
        <div class="col-sm-3 text-end">
          <a href="<?= base_url('user/dtlPesanan/'.$id); ?>">
          <button type="button" class="btn btn-primary btn-sm rounded-pill float-sm-right shadow">Kembali</button>
          </a>
        </div>
      </div>    
      <div class="row m-2">
        <?= form_open_multipart('user/editPes/'.$id); ?>
          <div class="form-group">
            <label for="formAlamat">Alamat</label>
            <textarea class="form-control" id="formAlamat" name="formAlamat" rows="3" placeholder="Alamat lengkap"><?= $pes['alamat']; ?></textarea>
            <?= form_error('formAlamat', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-row row">
            <div class="form-group col-sm-2">
              <label for="innOrder">Nama Order</label>
              <input type="text" class="form-control" id="innOrder" name="innOrder" value="<?= $pes['nama_order']; ?>">
              <?= form_error('innOrder', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group col-sm-2">
              <label for="datepicker">Order Date</label>
              <input type="date" class="form-control" id="datepicker" name="datepicker" value="<?= $pes['tanggal_pesan']; ?>" disabled>
            </div>
            <div class="form-group col-sm-2">
              <label for="inputNPen">Nama Penerima</label>
              <input type="text" class="form-control" id="inputNPen" name="inputNPen" value="<?= $user['nama_pelanggan']; ?>">
              <?= form_error('inputNPen', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group col-sm-2">
              <label for="selectJPeng">Jasa Antar</label>
              <select class="form-control" id="selectJPeng" name="selectJPeng">
                <?php if (empty($jsp)) : ?>
                  <option value=" ">---</option>
                <?php endif; ?>
                <?php foreach ($jsp as $j): ?>
                  <option value="<?= $j['id_jasa_pengirim']; ?>" <?= $pes['id_jasa_pengirim'] == $j['id_jasa_pengirim'] ? 'selected' : ''; ?>><?= $j['jasa_pengiriman']; ?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('selectJPeng', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group col-sm-2">
              <label for="inputKPos">Kode Pos</label>
              <input type="text" class="form-control" id="inputKPos" name="inputKPos" value="<?= $pes['kode_pos']; ?>">
              <?= form_error('inputKPos', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group col-sm-2">
              <label for="inputHP">No Telephone</label>
              <input type="text" class="form-control" id="inputHP" name="inputHP" value="<?= $pes['no_telephone']; ?>">
              <?= form_error('inputHP', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
          </div>
          <button type="submit" class="btn btn-primary rounded-pill shadow-sm mb-3">Edit <i class="fas fa-edit" aria-hidden="true"></i> </button>
        </form>

      </div>
    </div>
  </div>

</div>    
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->