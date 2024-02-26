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
                    <p class="mb-0">Pesanan Sablon dapat diubah jika belum membayar minimal 50% </p>
                    <?= $this->session->flashdata('message'); ?>
                </div>
                <div class="col-sm-3 p-2 text-end">
                    <a href="<?= base_url('user/--'); ?>">
                        <button type="button" class="btn btn-primary btn-sm rounded-pill shadow">Cetak</button>
                    </a>
                    <a href="<?= base_url($cek != null ? 'user/pesananTerKir' : 'user/pesanan'); ?>">
                        <button type="button" class="btn btn-primary btn-sm rounded-pill shadow">Kembali</button>
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
                                if ($cek == null):
                            ?>
                                <a href="<?= base_url('user/editPes/'.$id); ?>">
                                    <button type="button" class="btn btn-primary">Edit Alamat</button>
                                </a>                            
                            <?php
                                endif;
                                foreach($detail_pes as $d) {
                                    $tharga += $d['harga']*$d['jumlah_pesanan'];
                                    $tunit += $d['jumlah_pesanan'];
                                }
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
                          <?php if ($cek == null) : ?>
                          <th scope="col">Action</th>
                          <?php endif; ?>
                        </tr>
                      </thead>
                      <tfoot>
                      <tr class="text-center">
                          <th scope="col" colspan="4">Total</th>
                          <th scope="col"><?= $tunit; ?></th>
                          <th scope="col"></th>
                          <th scope="col"><?= $tharga; ?></th>
                          <?php if ($cek == null) : ?>
                          <th scope="col"></th>
                          <?php endif; ?>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php
                            $i = 0;
                            foreach($detail_pes as $dk): 
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
                          <?php if ($cek == null) : ?>
                          <td>
                            <div class="d-inline-flex m-0 p-1 bd-highlight">
                                <a href="<?= base_url('user/editDtlPesanan/'.$dk['id_detail_pemesanan']); ?>">
                                    <button type="button" class="btn btn-primary btn-sm rounded-pill shadow wdth">Ubah</button>
                                </a>
                            </div>
                          </td>
                          <?php endif; ?>
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