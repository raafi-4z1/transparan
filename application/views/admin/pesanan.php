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
              <h4 class="d-inline-flex m-0 bd-highlight">Daftar Pesanan : </h4>
            </div>
          </div>
          <div class="row m-2 shadow-sm mb-3 p-2 rounded" style="background-color: rgb(177, 236, 247)">
            <div class="col" style="align-self: center;">
              <p class="d-inline-flex m-0 bd-highlight">Untuk mencetak nota order pelanggan ada di 'Detail'</p>
            </div>
            <div class="col-sm-3 text-end">
              <button type="submit" class="btn btn-primary btn-sm rounded-pill float-sm-right shadow">List Terkirim</button>
            </div>
          </div>    
          <div class="row m-2">
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr class="text-center">
                    <th scope="col">No Order</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Nama Order</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th class="text-center" scope="row">ORD/2021/0020</th>
                    <td>Raafi Azizan Alim</td>
                    <td>raafi</td>
                    <td>15-3-2021</td>
                    <td>Selesai</td>
                    <td style="width: 215px">
                      <div class="d-inline-flex m-0 p-1 bd-highlight">
                        <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow wdth">Detail</button>
                      </div>
                      <div class="d-inline-flex m-0 p-1 bd-highlight">
                        <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow wdth disabled">Ubah</button>
                      </div>
                      <div class="d-inline-flex m-0 p-1 bd-highlight">
                        <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow wdth disabled">Selesai</button>
                      </div>
                      <div class="d-inline-flex m-0 p-1 bd-highlight">
                        <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow wdth">Hapus</button>
                      </div>
                      <div class="d-inline-flex m-0 p-1 bd-highlight">
                        <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow wdth">Kirim</button>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">ORD/2021/0021</th>
                    <td>Alim</td>
                    <td>alim</td>
                    <td>20-3-2021</td>
                    <td>Proses</td>
                    <td>
                      <!-- <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow"><img src="gambar/p1.png" style="width: 20px;" alt=""></button> -->
                      <div class="d-inline-flex m-0 p-1 bd-highlight">
                        <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow wdth">Detail</button>
                      </div>
                      <div class="d-inline-flex m-0 p-1 bd-highlight">
                        <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow wdth">Ubah</button>
                      </div>
                      <div class="d-inline-flex m-0 p-1 bd-highlight">
                        <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow wdth">Selesai</button>
                      </div>
                      <div class="d-inline-flex m-0 p-1 bd-highlight">
                        <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow wdth">Hapus</button>
                      </div>
                      <div class="d-inline-flex m-0 p-1 bd-highlight">
                        <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow wdth disabled">Kirim</button>
                      </div>
                    </td>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">ORD/2021/0022</th>
                    <td>Azizan</td>
                    <td>4za1zan</td>
                    <td>24-3-2021</td>
                    <td>Proses</td>
                    <td>
                      <!-- <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow"><img src="gambar/p1.png" style="width: 20px;" alt=""></button> -->
                      <div class="d-inline-flex m-0 p-1 bd-highlight">
                        <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow wdth">Detail</button>
                      </div>
                      <div class="d-inline-flex m-0 p-1 bd-highlight">
                        <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow wdth">Ubah</button>
                      </div>
                      <div class="d-inline-flex m-0 p-1 bd-highlight">
                        <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow wdth">Selesai</button>
                      </div>
                      <div class="d-inline-flex m-0 p-1 bd-highlight">
                        <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow wdth">Hapus</button>
                      </div>
                      <div class="d-inline-flex m-0 p-1 bd-highlight">
                        <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow wdth disabled">Kirim</button>
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