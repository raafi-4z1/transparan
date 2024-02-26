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
                    <p class="mb-0">Data Profile</p>
                    <?= $this->session->flashdata('message'); ?>
                </div>
                <div class="col-sm-3 p-2 text-end">
                    <a href="<?= base_url('user/edit'); ?>">
                        <button type="button" class="btn btn-primary btn-sm rounded-pill shadow">Ubah Data</button>
                    </a>
                </div>
            </div>

            <div class="row m-2">
                <div class="card mb-3">
                    <div class="row no-gutters mt-3">
                        <div class="col-md-4 text-center">
                            <img src="<?= $user['gambar'] == '' ? base_url('assets/img/default/profile.png') : 'data:image/jpeg;base64,'.base64_encode( $user['gambar'] ); ?>" class="img-fluid rounded-circle" style="max-width: 236px; min-width: 200px;">
                        </div>
                        <div class="col-md-4 p-0">
                            <div class="card-body">
                                <div class="row p-10">
                                    <h5 class="card-title col-sm-4">Nama</h5>
                                    <p class="card-text col"><?= $user['nama_pelanggan']; ?></p>
                                </div>
                                <div class="row p-10">
                                    <h5 class="card-title col-sm-4">Email</h5>
                                    <p class="card-text col"><?= $user['email']; ?></p>
                                </div>
                                <div class="row p-10">
                                    <h5 class="card-title col-sm-4">Alamat</h5>
                                    <p class="card-text col"><?= $user['alamat']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 p-0">
                            <div class="card-body">
                                <div class="row p-10">
                                    <h5 class="card-title col">Username</h5>
                                    <p class="card-text col-sm-7"><?= $user['username']; ?></p>
                                </div>
                                <div class="row p-10">
                                    <h5 class="card-title col">No Hp</h5>
                                    <p class="card-text col-sm-7"><?= $user['no_telephone']; ?></p>
                                </div>
                                <div class="row p-10">
                                    <h5 class="card-title col">Ubah Password</h5>
                                    <p class="card-text col-sm-7">
                                        <a class="page-link shadow-sm rounded" style="max-width: 38px;" href="<?= base_url('user/ubahpass'); ?>" aria-label="Previous">
                                            <span aria-hidden="true"><i class="fas fa-key"></i></span>
                                        </a>
                                    </p>
                                </div>
                            </div>
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