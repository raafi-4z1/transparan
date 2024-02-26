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
                    <p class="mb-0">Pesanan yang sudah dilakukan, dapat dilihat di List Pesanan </p>
                    <?= $this->session->flashdata('message'); ?>
                </div>
                <div class="col-sm-3 p-2 text-end">
                    <a href="<?= base_url('user/pesanan'); ?>">
                        <button type="button" class="btn btn-primary btn-sm rounded-pill shadow">List Pesanan</button>
                    </a>
                </div>
            </div>
            
            <div class="row m-2">
                
                <div class="table-responsive">
                    <table class="table table-hover">
                        <caption style="text-align: right">
                            <div class="d-inline-flex m-0 p-1 bd-highlight">
                                
                            <?php
                                $tharga = 0;
                                $tunit = 0;
                                if (!empty($dkeranjang)):
                            ?>
                                <a href="<?= base_url('user/orderpemesanan'); ?>">
                                    <button type="button" class="btn btn-primary">Pesan Produk</button>
                                </a>                            
                            <?php
                                foreach($dkeranjang as $d) {
                                    $tharga += $d['harga']*$d['jumlah_pesanan'];
                                    $tunit += $d['jumlah_pesanan'];
                                }
                                endif; 
                            ?>
                            </div>
                        </caption>
                      <thead>
                        <tr class="text-center">
                          <th scope="col">No</th>
                          <th scope="col">Produk</th>
                          <th scope="col">Bahan</th>
                          <th scope="col">Spesifikasi</th>
                          <th scope="col">Jumlah Pesan</th>
                          <th scope="col">Harga/unit</th>
                          <th scope="col">Total Harga</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                      <tr class="text-center">
                          <th scope="col" colspan="4">Total</th>
                          <th scope="col"><?= $tunit; ?></th>
                          <th scope="col"></th>
                          <th scope="col"><?= $tharga; ?></th>
                          <th scope="col"></th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php if (empty($dkeranjang)): ?>
                        <tr class="text-center">
                            <td colspan="8">Tidak ada daftar keranjang</td>
                        </tr>
                        
                        <?php
                        endif;
                            $i = 0;
                            foreach($dkeranjang as $dk): 
                            $i++;
                        ?>
                        <tr class="text-center">
                          <th scope="row"><?= $i ?></th>
                          <td><?= $dk['nama_produk']; ?></td>
                          <td><?= $dk['jenis_bahan']; ?></td>
                          <td><?= $dk['spesifikasi']; ?></td>
                          <td><?= $dk['jumlah_pesanan']; ?></td>
                          <td><?= $dk['harga']; ?></td>
                          <td><?= $dk['harga']*$dk['jumlah_pesanan']; ?></td>
                          <td>
                            <div class="d-inline-flex m-0 p-1 bd-highlight">
                                <a href="<?= base_url('user/editDataKer/'.$dk['id_detail_pemesanan']); ?>">
                                    <button type="button" class="btn btn-primary btn-sm rounded-pill shadow wdth">Ubah</button>
                                </a>
                            </div>
                            <div class="d-inline-flex m-0 p-1 bd-highlight">
                                <a href="<?= base_url('user/hapus/kr/'.$dk['id_detail_pemesanan']); ?>">
                                    <button type="button" class="btn btn-danger btn-sm rounded-pill shadow wdth" 
                                    onclick="return confirm('Anda yakin mau menghapusnya ?')">Hapus</button>
                                </a>
                            </div>
                          </td>
                        </tr>
                        <?php
                        endforeach; ?>
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