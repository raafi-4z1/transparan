<!-- ============================================================== -->
<!-- Container -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- isi -->
    <!-- ============================================================== -->
    <div class="row mt-4">
        <div class="col-lg">
            <h4 class="page-title text-center">Produk Kami</h4>
            <div class="hline-w"></div>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-2 m-2">
        <?php
        foreach($produk as $pd): 
        ?>
        <div class="col mb-2">
            <div class="card">
                <div class="card-header text-uppercase"><?= $pd['nama_produk']; ?> Bahan <?= $pd['jenis_bahan']; ?></div>
                <div class="row">
                    <div class="col-md-5 text-center">
                        <img src="<?= $pd['gambar'] == '' ? base_url('assets/img/default/no_image1.png') : 'data:image/jpeg;base64,'.base64_encode( $pd['gambar'] ); ?>" style="max-width:165px; padding-top:10px;">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title">Spesifikasi</h5>
                            <p class="card-text pb-2">
                                - <?= str_replace(", ", "<br>- ", $pd['deskripsi']); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card-body row">
                        <div class="col">
                            <h5 class="card-title">Harga</h5>
                            <p class="card-text">Rp. <?= $pd['harga']; ?></p>
                        </div>
                        <div class="col">
                            <p class="card-text text-muted"><?= $pd['spesifikasi']; ?></p>
                            <p class="card-text">Stok: <?= $pd['stok']; ?></p>
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
<!-- End Container -->
<!-- ============================================================== -->
<div style="background-color:#e0e3ed; margin-top: 20px;">
    <div class="container-fluid">
        <div class="row p-2">
            <div class="col-lg-6">
                <h4 class="warna">TRANSPARAN SCREENPRINTING</h4>
                <div class="hline-w"></div>
                <p class="warna">Memberikan jawaban buat kamu yang ingin punya kaos kualitas distro untuk event dengan harga menguntungkan. Kami juga menerima pemesanan dalam skala besar maupun kecil, kalian akan mendapatkan garansi sablonan/bordiran plus bonus kaos untuk pemesanan minimal 100pcs. Pelayanan tercepat dan kualitas terbaik adalah keunggulan kami dibandingkan yang lain.</p>
            </div>
            <div class="col-lg-2">
                <h4 class="warna">Social Links</h4>
                <div class="hline-w"></div>
                <p>
                    <a href="#" style="padding: 0 5px;"><i class="fab fa-whatsapp fa-3x"></i></i></a>
                    <a href="#" style="padding: 0 5px;"><i class="fab fa-instagram fa-3x"></i></a>
                </p>
            </div>
            <div class="col-lg-4">
                <h4 class="warna">Our Address</h4>
                <div class="hline-w"></div>
                <p class="warna">
                    Jalan Dempet-Minteng km 3,<br/> Ds Tlogosih, RT/RW 03/03, Kebonagung,<br/> Demak, Jawa Tengah.<br/>
                </p>
            </div>
        </div>
    </div>
</div>

<footer class="footer text-center bg-secondary text-white">
    <p class="m-0 p-3"><?= date('Y'); ?> © Transparan Screen Printing...</p>
</footer>