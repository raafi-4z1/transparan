<div class="container-fluid">
  <!-- ============================================================== -->
  <!-- Isi -->
  <!-- ============================================================== -->
  <div class="row border border-secondary no-gutters bg-light min-hgt">
    <div class="col p-0">
      <div class="row m-2 shadow-sm mb-3 p-2 rounded" style="background-color: rgb(177, 236, 247)">
        <div class="col" style="align-self: center;">
          <p class="d-inline-flex m-0 bd-highlight">Silahkan lakukan pemesanan</p>
          <?= $this->session->flashdata('message'); ?>
        </div>
        <div class="col-sm-3 text-end">
          <a href="<?= base_url('user'); ?>">
          <button type="button" class="btn btn-primary btn-sm rounded-pill float-sm-right shadow">Produk</button>
          </a>
        </div>
      </div>    
      <div class="row m-2">

        <?= form_open_multipart('user/pemesanan'); ?>
          <div class="form-row row">
            <div class="form-group col-sm-3">
              <label for="selectProduk">Pilih Produk</label>
              <select class="form-control" id="selectProduk" name="selectProduk">
                <option value="">produk</option>
              <?php if ($cek) : ?>
                <option selected value="<?= $produk['nama_produk']; ?>"><?= $produk['nama_produk']; ?></option>
              <?php endif; ?>
              </select>
              <?= form_error('selectProduk', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group col-sm-3">
              <label for="selectBahan">Pilih Bahan</label>
              <select class="form-control" id="selectBahan" name="selectBahan">
                <option value="">bahan</option>
              <?php if ($cek) : ?>
                <option selected value="<?= $produk['jenis_bahan']; ?>"><?= $produk['jenis_bahan']; ?></option>
              <?php endif; ?>
              </select>
              <?= form_error('selectBahan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group col-sm-3">
              <label for="selectSpesifikasi">Pilih Spesifikasi</label>
              <select class="form-control" id="selectSpesifikasi" name="selectSpesifikasi">
                <option value=" ">spesifikasi</option>
              <?php if ($cek) : ?>
                <option selected value="<?= $produk['spesifikasi'] == '' ? 'e': $produk['spesifikasi']; ?>"><?= $produk['spesifikasi'] == '' ? '---': $produk['spesifikasi']; ?></option>
              <?php endif; ?>
              </select>
              <?= form_error('selectSpesifikasi', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group col-sm-3">
              <label for="inputUkuran">Ukuran</label>
              <input type="text" class="form-control" id="inputUkuran" name="inputUkuran" placeholder="S, M, L, X, dll" value="<?= set_value('inputUkuran'); ?>">
              <?= form_error('inputUkuran', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
          </div>
          <div class="form-row row">
            <div class="form-group col-sm-3">
              <label for="inputGambar">Gambar Desain</label>
              <input type="file" class="form-control-file" id="inputGambar" name="inputGambar">
            </div>
            <div class="form-group col-sm-3">
              <label for="selectLengan">Lengan</label>
              <select class="form-control" id="selectLengan" name="selectLengan">
                <option value="Panjang">Panjang</option>
                <option value="Pendek">Pendek</option>
              </select>
              <?= form_error('selectLengan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group col-sm-3">
              <label for="inputWarna">Warna</label>
              <input type="text" class="form-control" id="inputWarna" name="inputWarna" value="<?= set_value('inputWarna'); ?>">
              <?= form_error('inputWarna', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group col-sm-3">
              <label for="inputQty">Jumlah Pesan <small id="dstok">Stok: <?= $cek ? $produk['stok'] : '-'; ?></small></label>
              <input type="text" class="form-control" id="inputQty" name="inputQty">
              <?= form_error('inputQty', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="formKeterangan">Keterangan</label>
            <textarea class="form-control" id="formKeterangan" name="formKeterangan" rows="3" 
            placeholder="Ukuran dibagi 2 warna..."><?= set_value('formKeterangan'); ?></textarea>
          </div>
          <button type="submit" class="btn btn-primary rounded-pill shadow-sm mb-3">Masuk Keranjang <i class="fas fa-cart-plus" aria-hidden="true"></i></button>
        </form>

      </div>
    </div>
  </div>

</div>    
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->

<script>
  if (<?= json_encode(!$cek); ?>) {
    const all = <?= json_encode($data['all']); ?>;
    
    var arr = [];
    all.forEach((data) => {
      arr.push(data['nama_produk']);
    });

    // Unix
    const nama_produk = [...new Set(arr)];
    arr = [];

    const SL_pr = document.querySelector('#selectProduk');
    const SL_bn = document.querySelector('#selectBahan');
    const SL_sp = document.querySelector('#selectSpesifikasi');
    const DF_options = document.createDocumentFragment();
    var gE_stok = document.getElementById("dstok");
    
    Object.keys(nama_produk).forEach(key => {
      DF_options.appendChild(new Option(nama_produk[key], nama_produk[key]))
    });
    SL_pr.appendChild(DF_options);
    var selectp = 'e';
    var selectb = 'e';

    $('#selectProduk').on('change', function() {
      selectp = $(this).children("option:selected").val();
      let index = SL_bn.options.length;
      let indexs = SL_sp.options.length;

      if (selectp != ' ') {
        while (index--) {
          if (index != 0) {
            SL_bn.remove(index);
          }
        }
        while (indexs--) {
          if (indexs != 0) {
            SL_sp.remove(indexs);
          }
        }
        gE_stok.innerHTML = 'Stok: -';

        all.forEach((data) => {
          if (selectp == data['nama_produk']) {
            arr.push(data['jenis_bahan']);
          }
        });

        const jenis_bahan = [...new Set(arr)];
        arr = [];

        Object.keys(jenis_bahan).forEach(key => {
          DF_options.appendChild(new Option(jenis_bahan[key], jenis_bahan[key]))
        });
        SL_bn.appendChild(DF_options);

      } else if (selectp == ' ') {
        while (index--) {
          if (index != 0) {
            SL_bn.remove(index);
          }
        }
        while (indexs--) {
          if (indexs != 0) {
            SL_sp.remove(indexs);
          }
        }
        gE_stok.innerHTML = 'Stok: -';
      }

    });

    $('#selectBahan').on('change', function() {
      selectb = $(this).children("option:selected").val();
      let index = SL_sp.options.length;

      if (selectb != ' ') {
        while (index--) {
          if (index != 0) {
            SL_sp.remove(index);
          }
        }
        gE_stok.innerHTML = 'Stok: -';
        const spesifikasi = [];

        all.forEach((data) => {
          if ((selectb == data['jenis_bahan']) && (selectp == data['nama_produk'])) {
            spesifikasi.push(data['spesifikasi']);
          }
        });

        Object.keys(spesifikasi).forEach(key => {
          DF_options.appendChild(new Option(spesifikasi[key] == '' ? '---' : spesifikasi[key], spesifikasi[key] == '' ? 'e' : spesifikasi[key]))
        });
        SL_sp.appendChild(DF_options);

      } else if (selectb == ' ') {
        while (index--) {
          if (index != 0) {
            SL_sp.remove(index);
          }
        }
        gE_stok.innerHTML = 'Stok: -';
      }

    });

    $('#selectSpesifikasi').on('change', function() {
      selectSp = $(this).children("option:selected").val();
      let stok = 0;
      
      if (selectSp != ' ') {
        if (selectSp == 'e')
          selectSp = '';
        all.forEach((data) => {
          if ((selectSp == data['spesifikasi']) && ((selectb == data['jenis_bahan']) && (selectp == data['nama_produk']))) {
            stok = data['stok'];
          }
        });
        gE_stok.innerHTML = 'Stok: ' + stok;

      } else if (selectSp == ' ') {
        gE_stok.innerHTML = 'Stok: -';
      }

    });
    // let index = sb.options.length;
    // while (index--) {
    //     if (selected[index]) {
    //         sb.remove(index);
    //     }
    // }

    // Object.keys(jenis_bahan).forEach(key => {
    //   DF_options.appendChild(new Option(jenis_bahan[key], jenis_bahan[key]))
    // });
    // SL_bn.appendChild(DF_options);

    // Object.keys(spesifikasi).forEach(key => {
    //   DF_options.appendChild(new Option(spesifikasi[key] == '' ? '---' : spesifikasi[key], spesifikasi[key] == '' ? ' ' : spesifikasi[key]))
    // });
    // SL_sp.appendChild(DF_options);

    // $('#selectSpesifikasi').on('change', function() {
    //   Object.keys(spesifikasi).forEach(key => {
    //     DF_options.appendChild(new Option(spesifikasi[key] == '' ? '---' : spesifikasi[key], spesifikasi[key] == '' ? ' ' : spesifikasi[key]))
    //   });

    //   if ($(this). children("option:selected").val() == ' ') {
    //     } else {
    //     console.log('false');
    //   }
    // });
  }
</script>