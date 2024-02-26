<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        cek_login_user('user');
        $this->load->library('form_validation');
        $this->load->model('model');
    }

    public function index()
    {
        $data['title'] = 'Home';
        $data['user'] = $this->model->getUserExPas($this->session->userdata('username'));
        $data['dhome'] = $this->model->getProduk();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/user_sidebar', $data);
        $this->load->view('templates/user_topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function pemesanan($id = NULL, $id1 = NULL)
    {
        if ($id && $id1) {
            $key = $id.'/'.$id1;
        } else {
            $key = '/';
        }
        $data['title'] = 'Pemesanan';
        $data['user'] = $this->model->getUserExPas($this->session->userdata('username'));
        if ($key == '/') {
            $data['produk'] = $this->model->getProdukPes();
            
            foreach ($data['produk'] as $p) {
                $data['data']['all'][] = [
                    'nama_produk' => $p['nama_produk'],
                    'jenis_bahan' => $p['jenis_bahan'],
                    'spesifikasi' => $p['spesifikasi'],
                    'stok' => $p['stok']
                ];
            }
        } else {
            $data['produk'] = $this->model->getPesProdukbyId($key);
            $data['data']['all'] = '';
        }
        // jika benar maka data tunggal atau user langsung klik fitur pemesanan
        in_array($key, $data['produk']) ? $data['cek'] = TRUE : $data['cek'] = FALSE;

        $this->form_validation->set_rules('selectProduk', 'Produk', 'required|trim');
        $this->form_validation->set_rules('selectBahan', 'Bahan Produk', 'required|trim');
        $this->form_validation->set_rules('selectSpesifikasi', 'Spesifikasi', 'required|trim');
        $this->form_validation->set_rules('inputUkuran', 'Ukuran', 'required|trim|max_length[7]');
        $this->form_validation->set_rules('selectLengan', 'Lengan', 'trim|in_list[Panjang,Pendek]');
        $this->form_validation->set_rules('inputWarna', 'Warna', 'required|trim|max_length[25]');
        $this->form_validation->set_rules('inputQty', 'Jumlah Pesan', 'required|trim|is_natural|max_length[4]');
        $this->form_validation->set_rules('formKeterangan', 'Keterangan', 'trim|max_length[400]');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/user_sidebar', $data);
            $this->load->view('templates/user_topbar', $data);
            $this->load->view('user/pemesanan', $data);
            $this->load->view('templates/footer');
        } else {
            $dataPemesanan['Id_Stok'] = $this->model->getIdStokProduk(
                $this->input->post('selectProduk', true),
                $this->input->post('selectBahan', true),
                $this->input->post('selectSpesifikasi', true) == 'e' ? ' ': $this->input->post('selectSpesifikasi', true)
            );
            $dataPemesanan['id_user'] = $data['user']['id_pelanggan'];
            $dataPemesanan['qty'] = $this->input->post('inputQty', true);
            
            if ($dataPemesanan['qty'] <= $dataPemesanan['Id_Stok']['stok']) {
                $dataPemesanan['detail_pemesanan'] = $this->model->getLastId('id_detail_pemesanan', 'detail_pemesanan');
                
                $data = [
                    'id_detail_pemesanan' => $this->_setId($dataPemesanan['detail_pemesanan']['id_detail_pemesanan'], 3),
                    'jumlah_pesanan' => $dataPemesanan['qty'],
                    'size' => htmlspecialchars($this->input->post('inputUkuran', true)),
                    'color' => htmlspecialchars($this->input->post('inputWarna', true)),
                    'lengan_pe_pa' => htmlspecialchars($this->input->post('selectLengan', true)),
                    'deskripsi' => htmlspecialchars($this->input->post('formKeterangan', true)),
                    'n_user' => $dataPemesanan['id_user'],
                    'id_produk' => $dataPemesanan['Id_Stok']['id_produk']
                ];
                
                $data = $this->inpGambar($data, 'pemesanan');
                $this->model->updateStokByIdProduk($dataPemesanan['Id_Stok']['id_produk'], ($dataPemesanan['Id_Stok']['stok'] - $dataPemesanan['qty']));
                $this->db->insert('detail_pemesanan', $data);
                
                $this->session->set_flashdata('message', '<p class="mb-0 text-primary">Produk telah ditambahkan ke keranjang</p>');
                redirect('user/keranjang');
            } else {
                $this->session->set_flashdata('message', '<p class="mb-0 text-danger">Stok kurang dari jumlah pesan!</p>');
                redirect('user/pemesanan');
            }

        }
    }

    public function keranjang()
    {
        $data['user'] = $this->model->getUserExPas($this->session->userdata('username'));
        $data['title'] = 'Keranjang';
        $data['dkeranjang'] = $this->model->getDataKeranjang($data['user']['id_pelanggan']);
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/user_sidebar', $data);
        $this->load->view('templates/user_topbar', $data);
        $this->load->view('user/keranjang', $data);
        $this->load->view('templates/footer');
    }

    public function editDataKer($id, $id1, $id2)
    {
        $key = $id.'/'.$id1.'/'.$id2;
        $data['user'] = $this->model->getUserExPas($this->session->userdata('username'));
        $data['title'] = 'Edit Data Keranjang';
        $data['dkeranjang'] = $this->model->getDataKeranjangById($key, $data['user']['id_pelanggan']);
        $data['id'] = $key;

        $this->form_validation->set_rules('selectProduk', 'Produk', 'in_list['.$data['dkeranjang']['nama_produk'].']');
        $this->form_validation->set_rules('selectBahan', 'Bahan Produk', 'in_list['.$data['dkeranjang']['jenis_bahan'].']');
        $this->form_validation->set_rules('selectSpesifikasi', 'Spesifikasi', 'in_list['.$data['dkeranjang']['spesifikasi'].']');
        $this->form_validation->set_rules('inputUkuran', 'Ukuran', 'required|trim|max_length[7]');
        $this->form_validation->set_rules('selectLengan', 'Lengan', 'trim|in_list[Panjang,Pendek]');
        $this->form_validation->set_rules('inputWarna', 'Warna', 'required|trim|max_length[25]');
        $this->form_validation->set_rules('inputQty', 'Jumlah Pesan', 'required|trim|is_natural|max_length[4]');
        $this->form_validation->set_rules('formKeterangan', 'Keterangan', 'trim|max_length[400]');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/user_sidebar', $data);
            $this->load->view('templates/user_topbar', $data);
            $this->load->view('user/editker', $data);
            $this->load->view('templates/footer');
        } else {
            $dataPemesanan['stok_oldqty'] = $data['dkeranjang']['stok']+$data['dkeranjang']['jumlah_pesanan'];
            $dataPemesanan['newqty'] = htmlspecialchars($this->input->post('inputQty', true));
            $dataPemesanan['cek_qty'] = $data['dkeranjang']['jumlah_pesanan'] != $dataPemesanan['newqty'] ? 1 : 0;
            
            if ($dataPemesanan['newqty'] <= $dataPemesanan['stok_oldqty']) {
                $dataPemesanan['id'] = $data['dkeranjang']['id_produk'];

                $data = [
                    'jumlah_pesanan' => $dataPemesanan['newqty'],
                    'size' => htmlspecialchars($this->input->post('inputUkuran', true)),
                    'color' => htmlspecialchars($this->input->post('inputWarna', true)),
                    'lengan_pe_pa' => htmlspecialchars($this->input->post('selectLengan', true)),
                    'deskripsi' => htmlspecialchars($this->input->post('formKeterangan', true))
                ];
                
                $data = $this->inpGambar($data, 'editDataKer/'.$key);
                if ($dataPemesanan['cek_qty']) {
                    $this->model->updateStokByIdProduk($dataPemesanan['id'], ($dataPemesanan['stok_oldqty'] - $dataPemesanan['newqty']));
                }
                $this->model->setDataEditById('detail_pemesanan', $key, $data);
                
                $this->session->set_flashdata('message', '<p class="mb-0 text-primary">Produk pesanan telah diubah!</p>');
                redirect('user/keranjang');
            } else {
                $this->session->set_flashdata('message', '<p class="mb-0 text-danger">Stok kurang dari jumlah pesan!</p>');
                redirect('user/editDataKer/'.$key);
            }

        }
    }

    public function orderPemesanan()
    {
        $data['user'] = $this->model->getUserExPas($this->session->userdata('username'));
        $data['title'] = 'Order Pemesanan';
        $data['jsp'] = $this->model->getDataJPgmn();
        $data['peng'] = $this->model->getDPeng($data['user']['id_pelanggan']);
        // $namaLengkap = '';
        // foreach ($data['jsp'] as $key) {
        //     echo '\''.$key['jasa_pengiriman'].'\''.,;
        // }
        // var_dump($namaLengkap);
        // die;
        // $data['order'] = $this->model->getDataKeranjang($data['user']['id_pelanggan']);
        
        if ($data['user']['no_telephone'] == '' || $data['user']['alamat'] == '') {
            redirect('user/edit/1');
        } else {
            $this->form_validation->set_rules('inputHP', 'No Hp', 'required|trim|is_natural|min_length[11]|max_length[12]');
            $this->form_validation->set_rules('inputKPos', 'Kode Pos', 'required|trim|is_natural|min_length[2]|max_length[8]');
            // $this->form_validation->set_rules('selectJPeng', 'Jasa Antar', 'required|in_arr['.foreach ($data['jsp'] as $d) {
            //     $d['jasa_pengiriman'];'.,.'
            // }.']);
            $this->form_validation->set_rules('selectJPeng', 'Jasa Antar', 'required');
            $this->form_validation->set_rules('inputNPen', 'Nama Penerima', 'required|trim|min_length[5]|max_length[30]');
            $this->form_validation->set_rules('innOrder', 'Nama Orderan', 'required|trim|min_length[2]|max_length[30]');
            $this->form_validation->set_rules('datepicker', 'Tanggal', 'required');
            $this->form_validation->set_rules('formAlamat', 'Alamat', 'required|trim|max_length[250]');

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/user_sidebar', $data);
                $this->load->view('templates/user_topbar', $data);
                $this->load->view('user/order', $data);
                $this->load->view('templates/footer');
            } else {
                $d = [
                    'alamat' => htmlspecialchars($this->input->post('formAlamat', true)),
                    'id_jasa_antar' => htmlspecialchars($this->input->post('selectJPeng', true)),
                    'no_hp' => htmlspecialchars($this->input->post('inputHP', true)),
                    'kode_pos' => htmlspecialchars($this->input->post('inputKPos', true)),
                ];

                $d['id_pelanggan'] = $data['user']['id_pelanggan'];
                $d['id_pen'] = $data['peng']['id_pengiriman'];
                $data = null;
                $d = array_merge($d, 
                    $this->model->getLastId('id_pengiriman', 'pengiriman'), 
                    $this->model->getLastId('id_pemesanan', 'pemesanan')
                );

                $data['pengiriman'] = [
                    'id_pengiriman' => $this->_setId($d['id_pengiriman'], 2),
                    'alamat' => $d['alamat'],
                    'no_telephone' => $d['no_hp'],
                    'kode_pos' => $d['kode_pos'],
                    'id_pelanggan' => $d['id_pelanggan'],
                    'id_jasa_pengirim' => $d['id_jasa_antar']
                ];
                
                $this->db->insert('pengiriman', $data['pengiriman']);
                
                $d['tanggal'] = htmlspecialchars($this->input->post('datepicker', true));
                $d['tanggal'] = substr($d['tanggal'], 6, 4).'/'.substr($d['tanggal'], 0, 5);
                
                $data['pel'] = [
                    'nama_pelanggan' => htmlspecialchars($this->input->post('inputNPen', true)),
                    'no_telephone' => $d['no_hp'],
                    'alamat' => $d['alamat']
                ];

                $d['id_pem'] = $this->_setId($d['id_pemesanan'], 3);
                $data['pemesanan'] = [
                    'id_pemesanan' => $d['id_pem'],
                    'nama_order' => htmlspecialchars($this->input->post('innOrder', true)),
                    'tanggal_pesan' => $d['tanggal'],
                    'status_pemesanan' => 'Proses',
                    'id_pelanggan' => $d['id_pelanggan'],
                    'id_pengiriman' => $data['pengiriman']['id_pengiriman']
                ];

                $this->db->insert('pemesanan', $data['pemesanan']);
                $this->model->setDPUpdate($d['id_pelanggan'], $d['id_pem']);
                $d = null;
                $data = null;

                $this->session->set_flashdata('message', '<p class="mb-0 text-primary">Pesanan berhasil dipesan!</p>');
                redirect('user/pesanan');
            }
        }
    }

    public function listJA()
    {
        $data['user'] = $this->model->getUserExPas($this->session->userdata('username'));
        $data['title'] = 'Daftar Jasa Pengiriman';
        $data['jsp'] = $this->model->getAllDataJPgmn();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/user_sidebar', $data);
        $this->load->view('templates/user_topbar', $data);
        $this->load->view('user/tabelJA', $data);
        $this->load->view('templates/footer');
    }
    
    public function pesanan()
    {
        $data['user'] = $this->model->getUserExPas($this->session->userdata('username'));
        $data['title'] = 'Pesanan';
        $data['dpes'] = $this->model->getPemesanan($data['user']['id_pelanggan']);
        $data['jasaBank'] = $this->model->getJasaBank();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/user_sidebar', $data);
        $this->load->view('templates/user_topbar', $data);
        $this->load->view('user/pesanan', $data);
        $this->load->view('templates/footer');
    }

    public function pesananTerKir()
    {
        $data['user'] = $this->model->getUserExPas($this->session->userdata('username'));
        $data['title'] = 'Pesanan';
        $data['dpes'] = $this->model->getPemesananTerKir($data['user']['id_pelanggan']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/user_sidebar', $data);
        $this->load->view('templates/user_topbar', $data);
        $this->load->view('user/pesanan_kir', $data);
        $this->load->view('templates/footer');
    }
    
    public function dtlPesanan($id, $id1, $id2, $cek = null)
    {
        $data['cek'] = $cek;
        $data['id'] = $id.'/'.$id1.'/'.$id2;
        $data['user'] = $this->model->getUserExPas($this->session->userdata('username'));
        $data['title'] = 'Detail Pesanan';
        $data['detail_pes'] = $this->model->getDetailPes($data['id']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/user_sidebar', $data);
        $this->load->view('templates/user_topbar', $data);
        $this->load->view('user/detail_pes', $data);
        $this->load->view('templates/footer');
    }

    
    public function editPes($id, $id1, $id2)
    {
        $data['id'] = $id.'/'.$id1.'/'.$id2;
        $data['user'] = $this->model->getUserExPas($this->session->userdata('username'));
        $data['title'] = 'Edit Pengiriman';
        $data['jsp'] = $this->model->getDataJPgmn();
        $data['pes'] = $this->model->getDPesById($data['id']);

        $this->form_validation->set_rules('inputHP', 'No Hp', 'required|trim|is_natural|min_length[11]|max_length[12]');
        $this->form_validation->set_rules('inputKPos', 'Kode Pos', 'required|trim|is_natural|min_length[2]|max_length[8]');
        $this->form_validation->set_rules('selectJPeng', 'Jasa Antar', 'required');
        $this->form_validation->set_rules('inputNPen', 'Nama Penerima', 'required|trim|min_length[5]|max_length[30]');
        $this->form_validation->set_rules('innOrder', 'Nama Orderan', 'required|trim|min_length[2]|max_length[30]');
        $this->form_validation->set_rules('formAlamat', 'Alamat', 'required|trim|max_length[250]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/user_sidebar', $data);
            $this->load->view('templates/user_topbar', $data);
            $this->load->view('user/edit_pes', $data);
            $this->load->view('templates/footer');
        } else {
            $d = [
                'alamat' => htmlspecialchars($this->input->post('formAlamat', true)),
                'no_telephone' => htmlspecialchars($this->input->post('inputHP', true)),
                'kode_pos' => htmlspecialchars($this->input->post('inputKPos', true)),
                'id_jasa_pengirim' => htmlspecialchars($this->input->post('selectJPeng', true))
            ];

            $i = 1; // sama (pengiriman)
            foreach ($d as $key) {
                if(in_array($key, $data['pes'])) {
                    $i *= 1;
                } else {
                    $i *= 0;
                }
            };

            if (!$i) {
                $this->model->setDataEditById('pengiriman', $data['pes']['id_pengiriman'], $d);
            };
            $d = null;
            $d['nama_order'] = htmlspecialchars($this->input->post('innOrder', true));
            
            if (!in_array($d['nama_order'], $data['pes'])) {
                $this->model->setDataEditById('pemesanan', $data['id'], $d);
                $i = 0;
            };
            $d = null;
            $d['nama_pelanggan'] = htmlspecialchars($this->input->post('inputNPen', true));

            if (!in_array($d['nama_pelanggan'], $data['user'])) {
                $this->model->setDataEditById('pelanggan', $data['user']['id_pelanggan'], $d);
                $i = 0;
            };
            $d = null;
            
            if (!$i) {
                $this->session->set_flashdata('message', '<p class="mb-0 text-primary">Pengiriman berhasil diedit!</p>');
            };
            redirect('user/dtlPesanan/'.$data['id']);
            $data = null;
        }
    }

    public function editDtlPesanan($id, $id1, $id2)
    {
        $key = $id.'/'.$id1.'/'.$id2;
        $data['user'] = $this->model->getUserExPas($this->session->userdata('username'));
        $data['title'] = 'Edit Data Pesanan';
        $data['dpes'] = $this->model->getDataPesanById($key, $data['user']['id_pelanggan']);
        $data['id'] = $key;
        $key1 = $data['dpes']['id_pemesanan'];

        $this->form_validation->set_rules('selectProduk', 'Produk', 'in_list['.$data['dpes']['nama_produk'].']');
        $this->form_validation->set_rules('selectBahan', 'Bahan Produk', 'in_list['.$data['dpes']['jenis_bahan'].']');
        $this->form_validation->set_rules('selectSpesifikasi', 'Spesifikasi', 'in_list['.$data['dpes']['spesifikasi'].']');
        $this->form_validation->set_rules('inputUkuran', 'Ukuran', 'required|trim|max_length[7]');
        $this->form_validation->set_rules('selectLengan', 'Lengan', 'trim|in_list[Panjang,Pendek]');
        $this->form_validation->set_rules('inputWarna', 'Warna', 'required|trim|max_length[25]');
        $this->form_validation->set_rules('inputQty', 'Jumlah Pesan', 'required|trim|is_natural|max_length[4]');
        $this->form_validation->set_rules('formKeterangan', 'Keterangan', 'trim|max_length[400]');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/user_sidebar', $data);
            $this->load->view('templates/user_topbar', $data);
            $this->load->view('user/edit_dtlps', $data);
            $this->load->view('templates/footer');
        } else {
            $dataPemesanan['stok_oldqty'] = $data['dpes']['stok']+$data['dpes']['jumlah_pesanan'];
            $dataPemesanan['newqty'] = htmlspecialchars($this->input->post('inputQty', true));
            $dataPemesanan['cek_qty'] = $data['dpes']['jumlah_pesanan'] != $dataPemesanan['newqty'] ? 1 : 0;
            
            if ($dataPemesanan['newqty'] <= $dataPemesanan['stok_oldqty']) {
                $dataPemesanan['id'] = $data['dpes']['id_produk'];
                $data = null;

                $data = [
                    'jumlah_pesanan' => $dataPemesanan['newqty'],
                    'size' => htmlspecialchars($this->input->post('inputUkuran', true)),
                    'color' => htmlspecialchars($this->input->post('inputWarna', true)),
                    'lengan_pe_pa' => htmlspecialchars($this->input->post('selectLengan', true)),
                    'deskripsi' => htmlspecialchars($this->input->post('formKeterangan', true))
                ];
                
                $data = $this->inpGambar($data, 'editDtlPesanan/'.$key);
                if ($dataPemesanan['cek_qty']) {
                    $this->model->updateStokByIdProduk($dataPemesanan['id'], ($dataPemesanan['stok_oldqty'] - $dataPemesanan['newqty']));
                }
                $this->model->setDataEditById('detail_pemesanan', $key, $data);
                
                $this->session->set_flashdata('message', '<p class="mb-0 text-primary">Produk pesanan telah diubah!</p>');
                redirect('user/dtlPesanan/'.$key1);
            } else {
                $this->session->set_flashdata('message', '<p class="mb-0 text-danger">Stok kurang dari jumlah pesan!</p>');
                redirect('user/editDtlPesanan/'.$key);
            }

        }
    }

    public function pembayaran()
    {
        $data['user'] = $this->model->getUserExPas($this->session->userdata('username'));
        $data['title'] = 'Pembayaran';
        // $data['user'] = $this->model->getUserExPas($this->session->userdata('username'));

        $this->load->view('templates/header', $data);
        $this->load->view('templates/user_sidebar', $data);
        $this->load->view('templates/user_topbar', $data);
        $this->load->view('user/pembayaran', $data);
        $this->load->view('templates/footer');
    }
    
// udah (ke bawah)
    public function profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->model->getUserExPas($this->session->userdata('username'));
        if (strlen($data['user']['no_telephone']) == 12) {
            $data['user']['no_telephone'] = '+62 '.substr($data['user']['no_telephone'], 1, 3).'-'.substr($data['user']['no_telephone'], 4, 4).'-'.substr($data['user']['no_telephone'], 8);
        } elseif (strlen($data['user']['no_telephone']) == 11) {
            $data['user']['no_telephone'] = '+62 '.substr($data['user']['no_telephone'], 1, 2).'-'.substr($data['user']['no_telephone'], 3, 4).'-'.substr($data['user']['no_telephone'], 7);
        }
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/user_sidebar', $data);
        $this->load->view('templates/user_topbar', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates/footer');
    }

    public function edit($cek = NULL)
    {
        $data['cek'] = '/'.$cek;
        if ($cek) {
            $data['title'] = 'Isi Alamat dan No Hp sebelum memesan';
            $this->form_validation->set_rules('formTextarea', 'Alamat', 'required|trim|max_length[250]');
        } else {
            $data['title'] = 'Edit Profile';
            $this->form_validation->set_rules('formTextarea', 'Alamat', 'trim|max_length[250]');
        }
        $data['user'] = $this->model->getUserExPas($this->session->userdata('username'));

        $this->form_validation->set_rules('inputName', 'Full Name', 'required|trim|min_length[5]|max_length[30]');
        $this->form_validation->set_rules('inputNoHp', 'No Hp', 'required|trim|is_natural|min_length[11]|max_length[12]');
        $this->form_validation->set_rules('inputEmail', 'Email', 'trim|valid_email|max_length[40]');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/user_sidebar', $data);
            $this->load->view('templates/user_topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $user = $data['user']['id_pelanggan'];
            $data = [
                'nama_pelanggan' => htmlspecialchars($this->input->post('inputName', true)),
                'no_telephone' => htmlspecialchars($this->input->post('inputNoHp', true)),
                'email' => htmlspecialchars($this->input->post('inputEmail', true)),
                'alamat' => htmlspecialchars($this->input->post('formTextarea', true))
            ];

            // cek gambar yg diupload
            $image = $_FILES['inputGambar']['name'];

            if ($image) {
                $config['upload_path'] = './assets/img/uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']  = '64';
                $config['max_width'] = '512';
                $config['max_height'] = '384';

                $this->load->library('upload', $config);
                $this->upload->do_upload();
                
                if ($this->upload->do_upload('inputGambar')) {
                    $data['gambar'] = file_get_contents($this->upload->data('full_path'));
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">'.$this->upload->display_errors().'</div>');
                    redirect('user/edit');
                }
            }

            $this->model->setProfileUpdate($user, $data);
            unlink(FCPATH . 'assets/img/uploads/' . $image);
            if ($cek) {
                redirect('user/orderPemesanan');
            } else {
                $this->session->set_flashdata('message', '<p class="mb-0 text-primary">Your profile has been updated!</p>');
                redirect('user/profile');
            }
        }
    }

    public function ubahPass()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->model->getUserPass($this->session->userdata('username'));

        $this->form_validation->set_rules('current_password', 'Current Password', 'trim|required');
        $this->form_validation->set_rules('new_password1', 'Password', 'required|trim|min_length[5]|max_length[20]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Password', 'required|trim|matches[new_password1]');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/user_sidebar', $data);
            $this->load->view('templates/user_topbar', $data);
            $this->load->view('user/ubahpassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_pass = $this->input->post('current_password');
            $new_pass = $this->input->post('new_password1');

            if ($current_pass != $data['user']['password']) {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                Wrong Current Password!</div>');
                redirect('user/ubahpass');
            } else {
                if ($current_pass == $new_pass) {
                    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                    New Password cannot be the same as Current Password!</div>');
                    redirect('user/ubahpass');
                } else {
                    $this->model->setUserPass($data['user']['id_pelanggan'], $new_pass);
                    $this->session->set_flashdata('message', '<p class="mb-0 text-primary">Password Change!!</p>');
                    redirect('user/profile');
                }
            }
        }
    }

    public function hapus($ac, $id, $id1, $id2 = NULL)
    {
        if ($ac == 'kr') {
            // order produk
            $d = $this->model->getDataJumlahStok($id.'/'.$id1.'/'.$id2);
            $this->model->setStokBHapus($d['id_bahan_produk'], ['stok'=>$d['stok']]);
            $this->model->hapusDataKer($id.'/'.$id1.'/'.$id2);
            $this->session->set_flashdata('message', '<p class="mb-0 text-primary">Data order produk berhasil dihapus!</p>');
            redirect('user/keranjang');
        } elseif ($ac == 'gd') {
            // gambar desain
            $this->model->setDataEditById('detail_pemesanan', $id.'/'.$id1.'/'.$id2, ['gambar' => '']);
            $this->session->set_flashdata('message', '<p class="mb-0 text-primary">Gambar desain berhasil dihapus!</p>');
            redirect('user/keranjang');
        } elseif ($ac == 'gdp') {
            // gambar desain pesanan
            $this->model->setDataEditById('detail_pemesanan', $id.'/'.$id1.'/'.$id2, ['gambar' => '']);
            $this->session->set_flashdata('message', '<p class="mb-0 text-primary">Gambar desain berhasil dihapus!</p>');
            redirect('user/editDtlPesanan/'.$id.'/'.$id1.'/'.$id2);
        } elseif ($ac == 'ps') {
            // pesanan
            $k = $id.'/'.$id1.'/'.$id2;
            // cek sudah melakukan pembayaran atau belum, jika belum maka stok kembali
            $d = $this->model->cekPem($k);
            if ($d == null) {
                $va = $this->model->getIdDPem($k);
                foreach ($va as $key) {
                    $d = $this->model->getDJStok($key['id_detail_pemesanan']);
                    $this->model->setStokBHapus($d['id_bahan_produk'], ['stok'=>$d['stok']]);
                }
            }
            $this->model->hapusDataById('pemesanan', $k);
            $this->session->set_flashdata('message', '<p class="mb-0 text-primary">Pesanan berhasil dihapus!</p>');
            redirect('user/pesanan');
        } elseif ($ac == 'dps') {
            // produk pesanan
            // $d = $this->model->getDataJumlahStok($id.'/'.$id1.'/'.$id2);
            // $this->model->setStokBHapus($d['id_bahan_produk'], ['stok'=>$d['stok']]);
            // $this->model->hapusDataKer($id.'/'.$id1.'/'.$id2);
            // $this->session->set_flashdata('message', '<p class="mb-0 text-primary">Data order produk berhasil dihapus!</p>');
            // redirect('user/keranjang');
        }
    }

    private function _setId($data, $cek)
    {
        if ($cek == 3) {
            if (date('Y') == substr($data, 4, 4)) {
                $num = substr($data, 9) + 1;
            } elseif (date('Y') != substr($data, 4, 4)) {
                return substr($data, 0, 4).''.date('Y').'/0001';
            }
            
            if (substr($data, 9) < 9) {
                $data = substr($data, 0, 4).''.date('Y').'/'.substr($data, 9, 3).''.$num;
            } elseif (substr($data, 9) < 99) {
                $data = substr($data, 0, 4).''.date('Y').'/'.substr($data, 9, 2).''.$num;
            } elseif (substr($data, 9) < 999) {
                $data = substr($data, 0, 4).''.date('Y').'/'.substr($data, 9, 1).''.$num;
            } else {
                $data = substr($data, 0, 4).''.date('Y').'/'.$num;
            }
        } elseif ($cek == 2) {
            $num = substr($data, 4) + 1;
            if (substr($data, 4) < 9) {
                $data = substr($data, 0, 6).''.$num;
            } elseif (substr($data, 4) < 99) {
                $data = substr($data, 0, 5).''.$num;
            } else {
                $data = substr($data, 0, 4).''.$num;
            }
        }

        return $data;
    }

    private function inpGambar($data, $hlm)
    {
        $image = $_FILES['inputGambar']['name'];
        
        if ($image) {
            $config['upload_path'] = './assets/img/uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']  = '64';
            $config['max_width'] = '720';
            $config['max_height'] = '720';
            
            $this->load->library('upload', $config);
            $this->upload->do_upload();
            
            if ($this->upload->do_upload('inputGambar')) {
                $data['gambar'] = file_get_contents($this->upload->data('full_path'));
            } else {
                $this->session->set_flashdata('message', '<p class="mb-0 bg-warning text-dark">'.$this->upload->display_errors().'</p>');
                redirect('user/'.$hlm);
            }
            unlink(FCPATH . 'assets/img/uploads/' . $image);
        }
        return $data;
    }
}