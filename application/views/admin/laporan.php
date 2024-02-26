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
        <div class="row border border-secondary no-gutters" style="min-height: 500px;">
        <div class="col p-0">
          <div class="row m-2">
            <div class="col">
              <p class="d-inline-flex m-0 bd-highlight">Laporan Pendapatan</p>
            </div>
          </div>

          <form action="">
            <div class="row m-2 shadow-sm mb-3 p-2 rounded form-row align-items-center" style="background-color: rgb(177, 236, 247)">
              <div class="col-7 my-1">
                <div class="form-label">
                  <label class="col-form-label">Merupakan laporan pendapatan per bulan</label>
                </div>
              </div>
              <div class="col-2 my-1">
                <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Bulan</label>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                  <option selected>Pilih Bulan</option>
                  <option value="01">Januari</option>
                  <option value="02">Februari</option>
                  <option value="03">Maret</option>
                  <option value="04">April</option>
                  <option value="05">Mei</option>
                  <option value="06">Juni</option>
                  <option value="07">Juli</option>
                  <option value="08">Agustus</option>
                  <option value="09">September</option>
                  <option value="10">Oktober</option>
                  <option value="11">November</option>
                  <option value="12">Desember</option>
                </select>
              </div>
              <div class="col my-1">
                <label class="sr-only" for="inlineFormInput">Tahun</label>
                <input type="text" class="form-control" id="inlineFormInput" placeholder="Tahun">
              </div>
              <div class="col my-1 pr-0">
                <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow" style="width: 58px;">Lihat</button>
              </div>
              <div class="col my-1 pl-0">
                <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow" style="width: 58px;">Cetak</button>
              </div>
            </div>
          </form>
          
          <!-- <div class="row m-2 shadow-sm mb-3 p-2 rounded" style="background-color: rgb(177, 236, 247)">
            <div class="col">
              <p class="d-inline-flex m-0 bd-highlight">Keterangan</p>
              <-- <button type="submit" class="btn btn-primary btn-sm rounded-pill float-sm-right shadow">Pilih Bulan</button> ->
              <button type="submit" class="btn btn-primary btn-sm rounded-pill float-sm-right shadow">Cetak</button>
            </div>
          </div>   -->

          <div class="row m-2">
            <div class="table-responsive">
              <table class="table table-hover text-center">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pembeli</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Tanggal Bayar (Lunas)</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Total Harga</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Raafi Azizan Alim</td>
                    <td>36</td>
                    <td>21-3-2021</td>
                    <td>Rp. 2.160.000</td>
                    <td>Rp. 2.160.000</td>                    
                  </tr>
                  <!-- <tr>
                    <th scope="row">2</th>
                    <td>Alim</td>
                    <td>24</td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Azizan</td>
                    <td>24</td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr> -->
                  <tr>
                    <td colspan="6"><b>Total Pendapatan : Rp. 2.160.000 </b></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->