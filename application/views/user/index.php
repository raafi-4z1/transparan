<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- isi -->
    <!-- ============================================================== -->
    <div class="row row-cols-1 row-cols-md-2">
        <?php
        foreach($dhome as $dh): 
        ?>
        <div class="col mb-2">
            <div class="card">
                <div class="card-header text-uppercase"><?= $dh['nama_produk']; ?> Bahan <?= $dh['jenis_bahan']; ?></div>
                <div class="row">
                    <div class="col-md-5 text-center">
                        <img src="<?= $dh['gambar'] == '' ? base_url('assets/img/default/no_image1.png') : 'data:image/jpeg;base64,'.base64_encode( $dh['gambar'] ); ?>" style="max-width:165px; padding-top:10px;">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title">Spesifikasi</h5>
                            <p class="card-text pb-2">
                                - <?= str_replace(", ", "<br>- ", $dh['deskripsi']); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card-body row">
                        <div class="col">
                            <h5 class="card-title">Harga</h5>
                            <p class="card-text">Rp. <?= $dh['harga']; ?></p>
                        </div>
                        <div class="col">
                            <p class="card-text text-muted"><?= $dh['spesifikasi']; ?></p>
                            <p class="card-text">Stok: <?= $dh['stok']; ?></p>
                            <a href="<?= $dh['stok'] != 0 ? base_url('user/pemesanan/'.$dh['id_produk']) : base_url('user'); ?>" class="btn btn-primary">Tambah Ke <i class="fas fa-shopping-cart" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        endforeach; ?>
    </div>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->