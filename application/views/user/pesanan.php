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
                    <p class="mb-0">Pesanan yang sudah Terkirim, dapat dilihat di "List Pesanan Selesai"</p>
                    <?= $this->session->flashdata('message'); ?>
                </div>
                <div class="col-sm-3 p-2 text-end">
                    <a href="<?= base_url('user/pesananTerKir'); ?>">
                        <button type="button" class="btn btn-primary btn-sm rounded-pill shadow">List Pesanan Selesai</button>
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
                          <td><?= $this->model->cekPem($dk['id_pemesanan']) == null ? 'Lakukan Pembayaran' : $dk['status_pemesanan']; ?></td>
                          <td><?= $dk['total_harga']; ?></td>
                          <td>
                            <div class="d-inline-flex m-0 p-1 bd-highlight">
                                <a href="<?= base_url('user/dtlPesanan/'.$dk['id_pemesanan']); ?>">
                                    <button type="button" class="btn btn-primary btn-sm rounded-pill shadow">Liat/Ubah</button>
                                </a>
                            </div>
                            <div class="d-inline-flex m-0 p-1 bd-highlight">
                                <button type="button" class="btn btn-primary btn-sm rounded-pill shadow wdth" onclick="myModalBayar('<?= $dk['id_pemesanan']; ?>', '<?= $dk['total_harga']; ?>')">Bayar</button>
                            </div>
                            <div class="d-inline-flex m-0 p-1 bd-highlight">
                                <a href="<?= base_url('user/hapus/ps/'.$dk['id_pemesanan']); ?>">
                                    <button type="button" class="btn btn-danger btn-sm rounded-pill shadow wdth" 
                                    onclick="return confirm('Anda yakin mau membatalkan pesanan ini?')">Hapus</button>
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
<script>
    function myModalBayar(param, total) {
        var modal = document.getElementById('addBayar');
        document.getElementById('noOrder').value = param;
        document.getElementById('setengah').textContent = 'Rp. ' + (parseInt(total)/2);
        document.getElementById('total').textContent = 'Rp. ' + total;

        $(modal).modal('show');
    }
</script>

<!-- Modal Bayar -->
<div class="modal fade" id="addBayar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addBayarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBayarLabel">
                    Bayar (50% -> <small id="setengah"></small> atau 100% -> <small id="total"></small>) Pesanan</h5>
            </div>
            <?= form_open_multipart('user/pesanan'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="noOrder">No Order</label>
                    <input type="text" class="form-control form-control-user" id="noOrder" name="noOrder" readonly>
                </div>
                <div class="form-group">
                    <label for="idBank">Pembayaran</label>
                    <select name="idBank" id="idBank" class="form-control">
                        <option value="">Pilih Bank</option>
                        <option value="cod">Bayar ditempat</option>
                        <?php foreach ($jasaBank as $bank) :?>
                            <option value="<?= $bank['id_jasa_bank']; ?>"><?= $bank['nama_jasa_bank']; ?> (<?= $bank['no_rekening']; ?>) <?= $bank['nama_pemilik_rekening']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('idBank', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="skemaPembayaran">Skema Pembayaran</label>
                    <select name="skemaPembayaran" id="skemaPembayaran" class="form-control">
                        <option value="">Pilih Skema Pembayaran</option>
                        <option value="50">50%</option>
                        <option value="100">Lunas (100%)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputPicture">Picture (Max. 64 kb & 512x384 px)</label>
                    <input type="file" class="custom-file-input" id="inputPicture" name="inputPicture">
                </div>
                <div class="form-group">
                    <label for="formKeterangan">Keterangan</label>
                    <textarea class="form-control" id="formKeterangan" name="formKeterangan" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>