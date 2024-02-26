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
                    <p class="mb-0">Total: <?= count($jsp); ?> Jasa Pengirim</p>
                </div>
                <div class="col-sm-3 p-2 text-end">
                    <a href="<?= base_url('user/orderpemesanan'); ?>">
                        <button type="button" class="btn btn-primary btn-sm rounded-pill shadow">Kembali</button>
                    </a>
                </div>
            </div>
            
            <div class="row m-2">
                
                <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr class="text-center">
                          <th scope="col">No</th>
                          <th scope="col">Nama Jasa Pengiriman</th>
                          <th scope="col">Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if (empty($jsp)): ?>
                        <tr class="text-center">
                            <td colspan="3">Tidak ada daftar Jasa Pengiriman</td>
                        </tr>
                        
                        <?php
                        endif;
                            $i = 0;
                            foreach($jsp as $j): 
                            $i++;
                        ?>
                        <tr class="text-center">
                          <th scope="row"><?= $i ?></th>
                          <td><?= $j['jasa_pengiriman']; ?></td>
                          <td><?= $j['keterangan']; ?></td>
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