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
              <p class="d-inline-flex m-0 bd-highlight">Konfirmasi Pembayaran : 2</p>
            </div>
          </div>
          <div class="row m-2 shadow-sm mb-3 p-2 rounded" style="background-color: rgb(177, 236, 247)">
            <div class="col pr-0" style="align-self: center;">
              <p class="d-inline-flex m-0 bd-highlight">Untuk melihat transaksi pembayaran pelanggan dapat dilihat di 'Detail' <!--Pembayaran--></p>
            </div>
            <div class="col-4 pl-0" style="align-self: center;">
              <button type="submit" class="btn btn-primary btn-sm rounded-pill float-sm-right shadow">List Pembayaran</button>
            </div>
          </div>    
          <div class="row m-2">
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr class="text-center">
                    <th scope="col">Referensi</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Nama Order</th>
                    <th scope="col">QTY</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Status</th>
                    <th scope="col">Konfirmasi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="text-center">
                    <th scope="row">INV/2021/0020</th>
                    <td>Raafi Azizan Alim</td>
                    <td>r44f1</td>
                    <!-- <td>21-3-2021</td> -->
                    <td>36</td>
                    <td>Rp. 2.160.000</td>
                    <td>Lunas</td>
                    <td style="width: 180px">
                      <!-- <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow"><img src="gambar/p1.png" style="width: 20px;" alt=""></button> -->
                      <div class="d-inline-flex m-0 p-1 bd-highlight">
                        <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow wdth">Detail</button>
                      </div>
                      <div class="d-inline-flex m-0 p-1 bd-highlight">
                        <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow wdth">Nota</button>
                      </div>
                      <div class="d-inline-flex m-0 p-1 bd-highlight">
                        <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow wdth disabled">50%</button>
                      </div>
                      <div class="d-inline-flex m-0 p-1 bd-highlight">
                        <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow wdth disabled">Lunas</button>
                      </div>
                    </td>
                  </tr>
                  <tr class="text-center">
                    <th scope="row">INV/2021/0021</th>
                    <td>Alim</td>
                    <td>alim</td>
                    <!-- <td>23-3-2021</td> -->
                    <td>15</td>
                    <td>Rp. 1.200.00 </td>
                    <td>50%</td>
                    <td style="width: 180px">
                      <!-- <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow"><img src="gambar/p1.png" style="width: 20px;" alt=""></button> -->
                      <div class="d-inline-flex m-0 p-1 bd-highlight">
                        <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow wdth">Detail</button>
                      </div>
                      <div class="d-inline-flex m-0 p-1 bd-highlight">
                        <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow wdth">Nota</button>
                      </div>
                      <div class="d-inline-flex m-0 p-1 bd-highlight">
                        <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow wdth disabled">50%</button>
                      </div>
                      <div class="d-inline-flex m-0 p-1 bd-highlight">
                        <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow wdth">Lunas</button>
                      </div>
                    </td>
                  </tr>
                  <tr class="text-center">
                    <th scope="row">INV/2021/0022</th>
                    <td>Azizan</td>
                    <td>4za1zan</td>
                    <td>12</td>
                    <td>Rp. 1.380.000</td>
                    <td>Poses Bayar</td>
                    <td style="width: 180px">
                      <!-- <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow"><img src="gambar/p1.png" style="width: 20px;" alt=""></button> -->
                      <div class="d-inline-flex m-0 p-1 bd-highlight">
                        <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow wdth disabled">Detail</button>
                      </div>
                      <div class="d-inline-flex m-0 p-1 bd-highlight">
                        <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow wdth">Nota</button>
                      </div>
                      <div class="d-inline-flex m-0 p-1 bd-highlight">
                        <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow wdth">50%</button>
                      </div>
                      <div class="d-inline-flex m-0 p-1 bd-highlight">
                        <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow wdth">Lunas</button>
                      </div>
                    </td>
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