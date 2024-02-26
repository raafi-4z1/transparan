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
        <div class="row border border-secondary no-gutters bg-white min-hgt">
        <div class="col p-0">
          <div class="row m-2">
            <div class="col">
              <h4 class="d-inline-flex m-0 bd-highlight">User: <?= count($pelanggan); ?></h4>
            </div>
          </div>
          <div class="row m-2 shadow-sm mb-3 p-2 rounded" style="background-color: rgb(177, 236, 247)">
            <div class="col" style="align-self: center;">
              <p class="d-inline-flex m-0 bd-highlight">Ganti password user dapat diubah di tombol 'Ubah'</p>
            </div>
            <div class="col-sm-3 text-end">
              <button type="submit" class="btn btn-primary btn-sm rounded-pill float-sm-right shadow">Tambah User</button>
            </div>
          </div>    
          <div class="row m-2">
              <!-- DataTales Example -->
              <div class="card shadow mb-3">
                  <div class="card-body">
                      <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr class="text-center">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">No Hp</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                              </thead>
                              <tfoot>
                                <tr class="text-center">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">No Hp</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                              </tfoot>
                              <tbody>
                                <?php
                                $i = 1; 
                                foreach($pelanggan as $p): 
                                ?>
                                <tr>
                                    <th class="text-center" scope="row"><?= $i; ?></th>
                                    <td><?= $p['nama_pelanggan']; ?></td>
                                    <td><?= $p['no_telephone']; ?></td>
                                    <td><?= $p['email']; ?></td>
                                    <td><?= $p['alamat']; ?></td>
                                    <td class="wdth">
                                    <div class="d-inline-flex m-0 p-1 bd-highlight">
                                        <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow wdth">Lihat</button>
                                    </div>
                                    <div class="d-inline-flex m-0 p-1 bd-highlight">
                                        <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow wdth">Ubah</button>
                                    </div>
                                    <div class="d-inline-flex m-0 p-1 bd-highlight">
                                        <button type="submit" class="btn btn-primary btn-sm rounded-pill shadow wdth">Hapus</button>
                                    </div>
                                    </td>
                                </tr>
                                <?php 
                                $i++;
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