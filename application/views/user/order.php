<script src="<?= base_url('assets/'); ?>js/moment.js"></script>
<script src="<?= base_url('assets/'); ?>js/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({                  
        minDate: moment().add('d', 0).toDate(),
    });
  } );
</script>
<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/jquery-ui.css">
<div class="container-fluid">
  <!-- ============================================================== -->
  <!-- Isi -->
  <!-- ============================================================== -->
  <div class="row border border-secondary no-gutters bg-light min-hgt">
    <div class="col p-0">
      <div class="row m-2 shadow-sm mb-3 p-2 rounded" style="background-color: rgb(177, 236, 247)">
        <div class="col" style="align-self: center;">
          <p class="d-inline-flex m-0 bd-highlight">'Nama Penerima' digunakan untuk pengiriman atau pengambilan paket!<br>Jika ingin mengambilnya langsung di tempat pembuatan, maka pilih 'Pickup' pada 'Jasa Antar'</p>
          <?= $this->session->flashdata('message'); ?>
        </div>
        <div class="col-sm-3 text-end">
          <a href="<?= base_url('user/keranjang'); ?>">
          <button type="button" class="btn btn-primary btn-sm rounded-pill float-sm-right shadow">Kembali</button>
          </a>
        </div>
      </div>    
      <div class="row m-2">
        <?= form_open_multipart('user/orderPemesanan'); ?>
          <div class="form-group">
            <label for="formAlamat">Alamat</label>
            <textarea class="form-control" id="formAlamat" name="formAlamat" rows="3" placeholder="Alamat lengkap"><?= $user['alamat']; ?></textarea>
            <?= form_error('formAlamat', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-row row">
            <div class="form-group col-sm-2">
              <label for="innOrder">Nama Order</label>
              <input type="text" class="form-control" id="innOrder" name="innOrder" value="<?= set_value('innOrder'); ?>">
              <?= form_error('innOrder', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group col-sm-2">
              <label for="datepicker">Order Date</label>
              <input type="text" class="form-control" id="datepicker" name="datepicker" value="<?= set_value('datepicker'); ?>">
              <?= form_error('datepicker', '<small class="text-danger pl-3">', '</small>'); ?>
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
                  <option value="<?= $j['id_jasa_pengirim']; ?>" <?= $peng == null ? '' : $peng['jasa_pengiriman'] == $j['jasa_pengiriman'] ? 'selected' : ''; ?>><?= $j['jasa_pengiriman']; ?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('selectJPeng', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group col-sm-2">
              <label for="inputKPos">Kode Pos</label>
              <input type="text" class="form-control" id="inputKPos" name="inputKPos" value="<?= $peng == null ? set_value('inputKPos') :  $peng['kode_pos']; ?>">
              <?= form_error('inputKPos', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group col-sm-2">
              <label for="inputHP">No Telephone</label>
              <input type="text" class="form-control" id="inputHP" name="inputHP" value="<?= $user['no_telephone']; ?>">
              <?= form_error('inputHP', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
          </div>
          <a href="<?= base_url('user/listJA'); ?>">
            <button type="button" class="btn btn-primary rounded-pill shadow-sm mb-3">List Jasa Antar</button>
          </a>
          <button type="submit" class="btn btn-primary rounded-pill shadow-sm mb-3">Order <i class="fas fa-cart-arrow-down" aria-hidden="true"></i> </button>
        </form>

      </div>
    </div>
  </div>

</div>    
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->