<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- isi -->
    <!-- ============================================================== -->
    <div class="row border border-secondary no-gutters bg-white" style="min-height: 450px;">
        <div class="col p-0">
            <div class="row m-2 mt-3 shadow-sm mb-4 rounded" style="background-color: rgb(177, 236, 247)">
                <div class="col" style="align-self: center;">
                    <!-- <p class="mb-0">.... </p> -->
                    <?= $this->session->flashdata('message'); ?>
                </div>
                <div class="col-sm-3 p-2 text-end">
                    <a href="<?= base_url('user/pesanan'); ?>">
                        <button type="button" class="btn btn-primary btn-sm rounded-pill shadow">Kembali</button>
                    </a>
                </div>
            </div>
            
            <div class="row m-2">
                
                <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr class="text-center">
                            <th scope="col">No Order</th>
                            <th scope="col">Nama Order</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Jasa Antar</th>
                            <th scope="col">Status</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr class="text-center">
                            <th scope="col">No Order</th>
                            <th scope="col">Nama Order</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Jasa Antar</th>
                            <th scope="col">Status</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Action</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php if (empty($dpes[0]['id_pemesanan'])): ?>
                        <tr class="text-center">
                            <td colspan="7">Tidak ada daftar pesanan</td>
                        </tr>
                        
                        <?php
                        else:
                            foreach($dpes as $dk):
                        ?>
                        <tr class="text-center">
                          <th scope="row"><?= $dk['id_pemesanan']; ?></th>
                          <td><?= $dk['nama_order']; ?></td>
                          <td><?= substr($dk['tanggal_pesan'], 8, 2).'-'.substr($dk['tanggal_pesan'], 5, 2).'-'.substr($dk['tanggal_pesan'], 0, 4); ?></td>
                          <td><?= $dk['jasa_pengiriman']; ?></td>
                          <td><?= $dk['status_pemesanan']; ?></td>
                          <td><?= $dk['total_harga']; ?></td>
                          <td>
                            <div class="d-inline-flex m-0 p-1 bd-highlight">
                                <a href="<?= base_url('user/dtlPesanan/'.$dk['id_pemesanan'].'/t'); ?>">
                                    <button type="button" class="btn btn-primary btn-sm rounded-pill shadow wdth">Liat</button>
                                </a>
                            </div>
                            <div class="d-inline-flex m-0 p-1 bd-highlight">
                                <a href="<?= base_url('user/---/-/'.$dk['id_pemesanan']); ?>">
                                    <button type="button" class="btn btn-danger btn-sm rounded-pill shadow wdth" 
                                    onclick="return confirm('Anda yakin mau menghapusnya?')">Hapus</button>
                                </a>
                            </div>
                          </td>
                        </tr>
                        <?php
                            endforeach;        
                        endif; ?>
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