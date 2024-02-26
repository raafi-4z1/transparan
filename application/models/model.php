<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model extends CI_Model{

    # Admin
    public function getAdmin($username)
    {    
        return $this->db->get_where('admin', ['username' => $username])->row_array();
    }

    public function getdUser()
    {
        $query = "SELECT `id_pelanggan`, `nama_pelanggan`, `no_telephone`, `email`, `alamat` FROM `pelanggan` WHERE `id_pelanggan`!='PEL/0000'";
        return $this->db->query($query)->result_array();
    }

    public function hapusDataUser($key)
    {
        $this->db->where('id_pelanggan', $key);
        $this->db->delete('pelanggan');
    }

    public function getDataPelangganById($key)
    {
        return $this->db->get_where('pelanggan', ['id_pelanggan' => $key])->row_array();
    }

    public function getDataProduk()
    {
        $query = "SELECT `produk`.`id_produk`,`produk`.`nama_produk`, `bahan_produk`.`jenis_bahan`, `bahan_produk`.`spesifikasi`, `produk`.`deskripsi`, `produk`.`harga`
        FROM `produk` INNER JOIN `bahan_produk` ON `produk`.`id_bahan_produk` = `bahan_produk`.`id_bahan_produk`";
        return $this->db->query($query)->result_array();
    }

    public function hapusDataProduk($key)
    {
        $this->db->where('id_produk', $key);
        $this->db->delete('produk');
    }

    public function hapusDataBahanProduk($key)
    {
        $this->db->where('id_bahan_produk', $key);
        $this->db->delete('bahan_produk');
    }

    # All
    public function setDataEditById($tabel, $key, $data)
    {
        $this->db->where('id_'.$tabel, $key);
        $this->db->update($tabel, $data);
    }

    public function hapusDataById($tabel, $key)
    {
        $this->db->where('id_'.$tabel, $key);
        $this->db->delete($tabel);
    }

    public function getDataEditById($key, $tabel)
    {
        return $this->db->get_where($tabel, ['id_'.$tabel => $key])->row_array();
    }

    public function getLastId($key, $tabel)
    {
        $query = "SELECT `$key` FROM `$tabel` ORDER BY `$key` DESC LIMIT 1";
        return $this->db->query($query)->row_array();
    }

    public function getProdukLimit($limit)
    {
        $query = "SELECT `produk`.`id_produk`,`produk`.`nama_produk`, `produk`.`deskripsi`, `produk`.`harga`, `produk`.`gambar`, `bahan_produk`.`jenis_bahan`, `bahan_produk`.`stok`, `bahan_produk`.`spesifikasi`
        FROM `produk` INNER JOIN `bahan_produk`
        ON `produk`.`id_bahan_produk` = `bahan_produk`.`id_bahan_produk` LIMIT $limit";
        return $this->db->query($query)->result_array();
    }

    public function getIdStokProduk($nama_produk, $bahan_produk, $spesifikasi)
    {
        $query = "SELECT `produk`.`id_produk`,`bahan_produk`.`stok` FROM `produk` INNER JOIN `bahan_produk` ON `produk`.`id_bahan_produk` = `bahan_produk`.`id_bahan_produk` 
        WHERE `produk`.`nama_produk`='$nama_produk' AND `bahan_produk`.`jenis_bahan`='$bahan_produk' AND `bahan_produk`.`spesifikasi`='$spesifikasi'";
        return $this->db->query($query)->row_array();
    }

    public function getJasaBank()
    {
        return $this->db->get('jasa_bank')->result_array();
    }

    # User
    public function getPelanggan($username)
    {
        return $this->db->get_where('pelanggan', ['username' => $username])->row_array();
    }
    
    // Produk dan Bahan Produk
    public function getProduk()
    {
        $query = "SELECT `produk`.`id_produk`,`produk`.`nama_produk`, `produk`.`deskripsi`, `produk`.`harga`, `produk`.`gambar`, `bahan_produk`.`jenis_bahan`, `bahan_produk`.`stok`, `bahan_produk`.`spesifikasi`
        FROM `produk` INNER JOIN `bahan_produk`
        ON `produk`.`id_bahan_produk` = `bahan_produk`.`id_bahan_produk`";
        return $this->db->query($query)->result_array();
    }

    public function getProdukPes()
    {
        $query = "SELECT `produk`.`id_produk`,`produk`.`nama_produk`, `bahan_produk`.`jenis_bahan`, `bahan_produk`.`stok`, `bahan_produk`.`spesifikasi` 
        FROM `produk` INNER JOIN `bahan_produk`
        ON `produk`.`id_bahan_produk` = `bahan_produk`.`id_bahan_produk`";
        return $this->db->query($query)->result_array();
    }

    public function getPesProdukbyId($key)
    {
        $query = "SELECT `produk`.`id_produk`,`produk`.`nama_produk`, `bahan_produk`.`jenis_bahan`, `bahan_produk`.`stok`, `bahan_produk`.`spesifikasi` 
        FROM `produk` INNER JOIN `bahan_produk`
        ON `produk`.`id_bahan_produk` = `bahan_produk`.`id_bahan_produk`
        WHERE `produk`.`id_produk` = '$key'";
        return $this->db->query($query)->row_array();
    }

    public function getPesProdukbyProduk($key)
    {
        $query = "SELECT `produk`.`id_produk`,`produk`.`nama_produk`, `bahan_produk`.`jenis_bahan`, `bahan_produk`.`stok`, `bahan_produk`.`spesifikasi` 
        FROM `produk` INNER JOIN `bahan_produk`
        ON `produk`.`id_bahan_produk` = `bahan_produk`.`id_bahan_produk`
        WHERE `produk`.`nama_produk` = $key";
        return $this->db->query($query)->result_array();
    }

    public function updateStokByIdProduk($key, $newStok)
    {
        $query = "UPDATE `bahan_produk` SET `bahan_produk`.`stok` = $newStok WHERE `bahan_produk`.`id_bahan_produk` = (SELECT `produk`.`id_bahan_produk` 
        FROM `produk` WHERE `produk`.`id_produk` = '$key')";
        $this->db->query($query);
    }

    // Keranjang
    public function getDataKeranjang($key)
    {
        $query = "SELECT detail_pemesanan.`id_detail_pemesanan`,produk.`nama_produk`,bahan_produk.`jenis_bahan`,bahan_produk.`spesifikasi`, detail_pemesanan.`jumlah_pesanan`,produk.`harga`
        FROM ((bahan_produk INNER JOIN produk ON bahan_produk.`id_bahan_produk`=produk.`id_bahan_produk`)
        INNER JOIN detail_pemesanan ON produk.`id_produk`=detail_pemesanan.`id_produk`)
        WHERE detail_pemesanan.`n_user`='$key' AND detail_pemesanan.`id_pemesanan` IS NULL";
        return $this->db->query($query)->result_array();
    }

    public function getDataKeranjangById($key, $key1)
    {
        $query = "SELECT detail_pemesanan.`jumlah_pesanan`, detail_pemesanan.`size`, detail_pemesanan.`color`,
        detail_pemesanan.`lengan_pe_pa`, detail_pemesanan.`deskripsi`, detail_pemesanan.`gambar`, detail_pemesanan.`id_produk`,
        produk.`nama_produk`, bahan_produk.`jenis_bahan`, bahan_produk.`stok`, bahan_produk.`spesifikasi` FROM ((detail_pemesanan 
        INNER JOIN produk ON detail_pemesanan.`id_produk`=produk.`id_produk`) INNER JOIN bahan_produk ON produk.`id_bahan_produk`=bahan_produk.`id_bahan_produk`) 
        WHERE detail_pemesanan.`id_detail_pemesanan`='$key' AND detail_pemesanan.`n_user`='$key1' AND detail_pemesanan.`id_pemesanan` IS NULL";
        return $this->db->query($query)->row_array();
    }

    public function getDataJumlahStok($key)
    {
        $query = "SELECT (detail_pemesanan.`jumlah_pesanan`+bahan_produk.`stok`) AS 'stok', bahan_produk.`id_bahan_produk`
        FROM ((detail_pemesanan INNER JOIN produk ON detail_pemesanan.`id_produk`=produk.`id_produk`) 
        INNER JOIN bahan_produk ON produk.`id_bahan_produk`=bahan_produk.`id_bahan_produk`) 
        WHERE detail_pemesanan.`id_detail_pemesanan`='$key' AND detail_pemesanan.`id_pemesanan` IS NULL";
        return $this->db->query($query)->row_array();
    }

    public function setStokBHapus($key, $data)
    {
        $this->db->where('id_bahan_produk', $key);
        $this->db->update('bahan_produk', $data);
    }

    public function hapusDataKer($key)
    {
        $this->db->where('id_detail_pemesanan', $key);
        $this->db->delete('detail_pemesanan');
    }

    // Order
    public function getDataJPgmn()
    {
        $query = "SELECT id_jasa_pengirim, jasa_pengiriman FROM jasa_pengiriman";
        return $this->db->query($query)->result_array();
    }

    public function getAllDataJPgmn()
    {
        $query = "SELECT * FROM jasa_pengiriman";
        return $this->db->query($query)->result_array();
    }

    public function setDPUpdate($key, $data)
    {
        $query = "UPDATE detail_pemesanan SET id_pemesanan = '$data' WHERE detail_pemesanan.`n_user` = '$key' AND detail_pemesanan.`id_pemesanan` IS NULL";
        $this->db->query($query);
    }

    public function getDPeng($key)
    {
        $query = "SELECT pengiriman.`id_pengiriman`, pengiriman.`alamat`, pengiriman.`no_telephone`, pengiriman.`kode_pos`,
        pengiriman.`id_jasa_pengirim`,jasa_pengiriman.`jasa_pengiriman`
        FROM pengiriman INNER JOIN jasa_pengiriman ON pengiriman.`id_jasa_pengirim`=jasa_pengiriman.`id_jasa_pengirim`
        WHERE pengiriman.`id_pelanggan`='$key' ORDER BY pengiriman.`id_pengiriman` DESC LIMIT 1";
        return $this->db->query($query)->row_array();
    }

    // public function getIdPengiriman($id, $ks)
    // {
    //     $query = "SELECT id_pengiriman FROM pengiriman WHERE id_pelanggan='$id' AND kode_pos='$ks'";
    //     return $this->db->query($query)->row_array();
    // }

    // Pesanan
    public function getPemesanan($key)
    {
        $query = "SELECT pemesanan.`id_pemesanan`,pemesanan.`nama_order`,pemesanan.`tanggal_pesan`,jasa_pengiriman.`jasa_pengiriman`,
        pemesanan.`status_pemesanan`,SUM(detail_pemesanan.`jumlah_pesanan`*produk.`harga`) AS 'total_harga' 
        FROM (((produk INNER JOIN detail_pemesanan ON produk.`id_produk`=detail_pemesanan.`id_produk`) 
        INNER JOIN pemesanan ON detail_pemesanan.`id_pemesanan`=pemesanan.`id_pemesanan`) INNER JOIN pengiriman
        ON pemesanan.`id_pengiriman`=pengiriman.`id_pengiriman`) INNER JOIN jasa_pengiriman 
        ON pengiriman.`id_jasa_pengirim`=jasa_pengiriman.`id_jasa_pengirim` WHERE pemesanan.`status_pemesanan`!='Terkirim' 
        AND pemesanan.`id_pelanggan`='$key' GROUP BY pemesanan.`id_pemesanan`";
        return $this->db->query($query)->result_array();
    }

    public function getPemesananTerKir($key)
    {
        $query = "SELECT pemesanan.`id_pemesanan`,pemesanan.`nama_order`,pemesanan.`tanggal_pesan`,jasa_pengiriman.`jasa_pengiriman`,
        pemesanan.`status_pemesanan`,SUM(detail_pemesanan.`jumlah_pesanan`*produk.`harga`) AS 'total_harga' 
        FROM (((produk INNER JOIN detail_pemesanan ON produk.`id_produk`=detail_pemesanan.`id_produk`) 
        INNER JOIN pemesanan ON detail_pemesanan.`id_pemesanan`=pemesanan.`id_pemesanan`) INNER JOIN pengiriman
        ON pemesanan.`id_pengiriman`=pengiriman.`id_pengiriman`) INNER JOIN jasa_pengiriman 
        ON pengiriman.`id_jasa_pengirim`=jasa_pengiriman.`id_jasa_pengirim` WHERE pemesanan.`status_pemesanan`='Terkirim' 
        AND pemesanan.`id_pelanggan`='$key'";
        return $this->db->query($query)->result_array();
    }

    public function getDetailPes($key)
    {
        $query = "SELECT detail_pemesanan.`id_detail_pemesanan`,produk.`nama_produk`,bahan_produk.`jenis_bahan`,bahan_produk.`spesifikasi`, detail_pemesanan.`jumlah_pesanan`,produk.`harga`
        FROM ((bahan_produk INNER JOIN produk ON bahan_produk.`id_bahan_produk`=produk.`id_bahan_produk`)
        INNER JOIN detail_pemesanan ON produk.`id_produk`=detail_pemesanan.`id_produk`)
        WHERE detail_pemesanan.`id_pemesanan`='$key'";
        return $this->db->query($query)->result_array();
    }

    public function getIdDPem($key)
    {
        $query = "SELECT detail_pemesanan.`id_detail_pemesanan` FROM detail_pemesanan WHERE detail_pemesanan.`id_pemesanan`='$key'";
        return $this->db->query($query)->result_array();
    }

    public function cekPem($key)
    {
        $query = "SELECT pembayaran.`id_pembayaran` FROM pembayaran WHERE pembayaran.`id_pemesanan`='$key'";
        return $this->db->query($query)->row_array();
    }

    public function getDJStok($key)
    {
        $query = "SELECT (detail_pemesanan.`jumlah_pesanan`+bahan_produk.`stok`) AS 'stok', bahan_produk.`id_bahan_produk`
        FROM ((detail_pemesanan INNER JOIN produk ON detail_pemesanan.`id_produk`=produk.`id_produk`) 
        INNER JOIN bahan_produk ON produk.`id_bahan_produk`=bahan_produk.`id_bahan_produk`) 
        WHERE detail_pemesanan.`id_detail_pemesanan`='$key'";
        return $this->db->query($query)->row_array();
    }

    public function getDataPesanById($key, $key1)
    {
        $query = "SELECT detail_pemesanan.`id_pemesanan`,detail_pemesanan.`jumlah_pesanan`, detail_pemesanan.`size`, detail_pemesanan.`color`,
        detail_pemesanan.`lengan_pe_pa`, detail_pemesanan.`deskripsi`, detail_pemesanan.`gambar`, detail_pemesanan.`id_produk`,
        produk.`nama_produk`, bahan_produk.`jenis_bahan`, bahan_produk.`stok`, bahan_produk.`spesifikasi` FROM ((detail_pemesanan 
        INNER JOIN produk ON detail_pemesanan.`id_produk`=produk.`id_produk`) INNER JOIN bahan_produk ON produk.`id_bahan_produk`=bahan_produk.`id_bahan_produk`) 
        WHERE detail_pemesanan.`id_detail_pemesanan`='$key' AND detail_pemesanan.`n_user`='$key1'";
        return $this->db->query($query)->row_array();
    }
    
    public function getDPesById($key)
    {
        $query = "SELECT pengiriman.`alamat`, pemesanan.`nama_order`, pemesanan.`tanggal_pesan`, pemesanan.`id_pengiriman`, pengiriman.`id_jasa_pengirim`, pengiriman.`kode_pos`, 
        pengiriman.`no_telephone` FROM pemesanan INNER JOIN pengiriman ON pemesanan.`id_pengiriman`=pengiriman.`id_pengiriman` WHERE pemesanan.`id_pemesanan`='$key'";
        return $this->db->query($query)->row_array();
    }


    // public function getData_ById($key, $key1)
    // {
    //     $query = "SELECT detail_pemesanan.`jumlah_pesanan`, detail_pemesanan.`size`, detail_pemesanan.`color`,
    //     detail_pemesanan.`lengan_pe_pa`, detail_pemesanan.`deskripsi`, detail_pemesanan.`gambar`, detail_pemesanan.`id_produk`,
    //     produk.`nama_produk`, bahan_produk.`jenis_bahan`, bahan_produk.`stok`, bahan_produk.`spesifikasi` FROM ((detail_pemesanan 
    //     INNER JOIN produk ON detail_pemesanan.`id_produk`=produk.`id_produk`) INNER JOIN bahan_produk ON produk.`id_bahan_produk`=bahan_produk.`id_bahan_produk`) 
    //     WHERE detail_pemesanan.`id_detail_pemesanan`='$key' AND detail_pemesanan.`n_user`='$key1' AND detail_pemesanan.`id_pemesanan` IS NULL";
    //     return $this->db->query($query)->row_array();
    // }

    // Profile
    public function getUserExPas($username)
    {
        $query = "SELECT `id_pelanggan`,`username`,`nama_pelanggan`,`no_telephone`,`email`,`alamat`,`gambar` FROM `pelanggan` WHERE `username` = '$username'";
        return $this->db->query($query)->row_array();
    }

    public function setProfileUpdate($key, $data)
    {
        $this->db->where('id_pelanggan', $key);
        $this->db->update('pelanggan', $data);
    }
    
    public function getUserPass($username)
    {
        $query = "SELECT `id_pelanggan`, `password`, `nama_pelanggan`,`gambar` FROM `pelanggan` WHERE `username` = '$username'";
        return $this->db->query($query)->row_array();
    }

    public function setUserPass($key, $pass)
    {
        $query = "UPDATE `pelanggan` SET `password` =  '$pass' WHERE `id_pelanggan` = '$key'";
        $this->db->query($query);
    }
}
?>