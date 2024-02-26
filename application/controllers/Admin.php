<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        cek_login_user('admin');
        $this->load->library('form_validation');
        $this->load->model('model');
        // untuk liat dan edit user pake form untuk pindah
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
    
    // User
    public function dUser()
    {
        $data['title'] = 'Data User';
        $data['pelanggan'] = $this->model->getdUser();

        $this->formVal();
        $this->form_validation->set_rules('inputUsername', 'Username', 'required|trim|min_length[5]|max_length[20]|is_unique[pelanggan.username]');
        $this->form_validation->set_rules('inputPassword1', 'Password', 'required|trim|min_length[5]|max_length[20]|matches[inputPassword2]');
        $this->form_validation->set_rules('inputPassword2', 'Password', 'required|trim|matches[inputPassword1]');
        
        if ($this->form_validation->run() == false) {    
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('admin/duser', $data);
            $this->load->view('templates/footer');
        } else {
            $user = $this->model->getLastId('id_pelanggan', 'pelanggan');
            
            $data = [
                'id_pelanggan' => $this->_setId($user['id_pelanggan'], 4),
                'username' => htmlspecialchars($this->input->post('inputUsername', true)),
                'password' => $this->input->post('inputPassword1'),
                'nama_pelanggan' => htmlspecialchars($this->input->post('inputName', true)),
                'no_telephone' => htmlspecialchars($this->input->post('inputNoHp', true)),
                'email' => htmlspecialchars($this->input->post('inputEmail', true)),
                'alamat' => htmlspecialchars($this->input->post('formTextarea', true))
            ];
            
            $data = $this->inpGambar($data, 'duser');
            $this->db->insert('pelanggan', $data);
            
            $this->session->set_flashdata('message', '<p class="mb-0 text-primary">User telah berhasil ditambahkan!</p>');
            redirect('admin/duser');
        }
    }

    public function liat_edit($acc, $id, $id1)
    {
        $key = $id.'/'.$id1;
        $data['pelanggan'] = $this->model->getDataPelangganById($key);
        $data['title'] = $data['pelanggan']['nama_pelanggan'];
        $data['acc'] = $acc;

        $this->formVal();
        $this->form_validation->set_rules('inputPassword', 'Password', 'required|trim|min_length[5]|max_length[20]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('admin/liat_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'password' => $this->input->post('inputPassword'),
                'nama_pelanggan' => htmlspecialchars($this->input->post('inputName', true)),
                'no_telephone' => htmlspecialchars($this->input->post('inputNoHp', true)),
                'email' => htmlspecialchars($this->input->post('inputEmail', true)),
                'alamat' => htmlspecialchars($this->input->post('formTextarea', true))
            ];
            $data = $this->inpGambar($data, 'duser');
            $this->model->setProfileUpdate($key, $data);
            
            $this->session->set_flashdata('message', '<p class="mb-0 text-primary">User telah berhasil di ubah!</p>');
            redirect('admin/duser');
        }
    }
    
    // Produk
    public function dProduk()
    {
        $data['title'] = 'Data Produk';
        $data['produk'] = $this->model->getDataProduk();
        $data['bahan'] = $this->db->where('id_bahan_produk !=', 'BPR/000')->get('bahan_produk')->result_array();

        $this->form_validation->set_rules('inputName', 'Nama Produk', 'required|trim|min_length[3]|max_length[20]');
        $this->form_validation->set_rules('inputHarga', 'Harga Produk', 'required|trim|is_natural|min_length[3]|max_length[8]');
        $this->form_validation->set_rules('formDeskripsi', 'Deskripsi Produk', 'trim|max_length[300]');
        $this->form_validation->set_rules('id_bahan', 'Bahan', 'required');
        
        if ($this->form_validation->run() == false) {    
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('admin/dproduk', $data);
            $this->load->view('templates/footer');
        } else {
            $user = $this->model->getLastId('id_produk', 'produk');

            $data = [
                'id_produk' => $this->_setId($user['id_produk'], 3),
                'nama_produk' => htmlspecialchars($this->input->post('inputName', true)),
                'deskripsi' => htmlspecialchars($this->input->post('formDeskripsi', true)),
                'harga' => htmlspecialchars($this->input->post('inputHarga', true)),
                'id_bahan_produk' => htmlspecialchars($this->input->post('id_bahan', true))
            ];

            $data = $this->inpGambar($data, 'dproduk');
            $this->db->insert('produk', $data);
            
            $this->session->set_flashdata('message', '<p class="mb-0 text-primary">Produk telah berhasil ditambahkan!</p>');
            redirect('admin/dproduk');
        }
    }

    public function produkEdit($acc, $id, $id1)
    {
        $key = $id.'/'.$id1;
        $data['produk'] = $this->model->getDataEditById($key, 'produk');
        $data['bahan'] = $this->db->get('bahan_produk')->result_array();
        $data['title'] = $data['produk']['nama_produk'];
        $data['acc'] = $acc;

        $this->form_validation->set_rules('inputName', 'Nama Produk', 'required|trim|min_length[3]|max_length[20]');
        $this->form_validation->set_rules('inputHarga', 'Harga Produk', 'required|trim|is_natural|min_length[3]|max_length[8]');
        $this->form_validation->set_rules('formDeskripsi', 'Deskripsi', 'trim|max_length[250]');
        $this->form_validation->set_rules('id_bahan', 'Bahan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('admin/produk_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_produk' => htmlspecialchars($this->input->post('inputName', true)),
                'deskripsi' => htmlspecialchars($this->input->post('formDeskripsi', true)),
                'harga' => htmlspecialchars($this->input->post('inputHarga', true)),
                'id_bahan_produk' => htmlspecialchars($this->input->post('id_bahan', true))
            ];

            $data = $this->inpGambar($data, 'dproduk');
            $this->model->setDataEditById('produk', $key, $data);
            
            $this->session->set_flashdata('message', '<p class="mb-0 text-primary">Produk telah berhasil di ubah!</p>');
            redirect('admin/dproduk');
        }
    }
    
    // Bahan
    public function dStok()
    {
        $data['title'] = 'Data Stok & Bahan';
        $data['dstok'] = $this->db->where('id_bahan_produk !=', 'BPR/000')->get('bahan_produk')->result_array();

        $this->form_validation->set_rules('inputBahan', 'Bahan Produk', 'required|trim|min_length[3]|max_length[20]');
        $this->form_validation->set_rules('inputStok', 'Stok', 'required|trim|is_natural|min_length[1]|max_length[8]');
        $this->form_validation->set_rules('inputSpesifikasi', 'Spesifikasi', 'trim|max_length[20]');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('admin/dstok', $data);
            $this->load->view('templates/footer');
        } else {
            $user = $this->model->getLastId('id_bahan_produk', 'bahan_produk');

            $data = [
                'id_bahan_produk' => $this->_setId($user['id_bahan_produk'], 3),
                'jenis_bahan' => htmlspecialchars($this->input->post('inputBahan', true)),
                'stok' => htmlspecialchars($this->input->post('inputStok', true)),
                'spesifikasi' => htmlspecialchars($this->input->post('inputSpesifikasi', true))
            ];

            $this->db->insert('bahan_produk', $data);            
            $this->session->set_flashdata('message', '<p class="mb-0 text-primary">Bahan Produk telah berhasil ditambahkan!</p>');
            redirect('admin/dstok');
        }
    }

    public function dStokEdit($id, $id1)
    {
        $key = $id.'/'.$id1;
        $data['title'] = 'Edit Data Stok & Bahan';
        $data['dstok'] = $this->model->getDataEditById($key, 'bahan_produk');

        $this->form_validation->set_rules('inputBahan', 'Bahan Produk', 'required|trim|min_length[3]|max_length[20]');
        $this->form_validation->set_rules('inputStok', 'Stok', 'required|trim|is_natural|min_length[1]|max_length[8]');
        $this->form_validation->set_rules('inputSpesifikasi', 'Spesifikasi', 'trim|max_length[20]');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('admin/stok_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'jenis_bahan' => htmlspecialchars($this->input->post('inputBahan', true)),
                'stok' => htmlspecialchars($this->input->post('inputStok', true)),
                'spesifikasi' => htmlspecialchars($this->input->post('inputSpesifikasi', true))
            ];

            $this->model->setDataEditById('bahan_produk', $key, $data);            
            $this->session->set_flashdata('message', '<p class="mb-0 text-primary">Bahan Produk telah berhasil di ubah!</p>');
            redirect('admin/dstok');
        }
    }

    public function pesanan()
    {
        $data['title'] = 'Pesanan';
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('admin/pesanan', $data);
        $this->load->view('templates/footer');
    }

    public function pembayaran()
    {
        $data['title'] = 'Pembayaran';
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('admin/pembayaran', $data);
        $this->load->view('templates/footer');
    }

    public function laporan()
    {
        $data['title'] = 'Laporan';
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('admin/laporan', $data);
        $this->load->view('templates/footer');
    }

    private function _setId($data, $cek)
    {
        $num = substr($data, 4) + 1;
        if ($cek == 4) {
            if (substr($data, 4) < 9) {
                $data = substr($data, 0, 7).''.$num;
            } elseif (substr($data, 4) < 99) {
                $data = substr($data, 0, 6).''.$num;
            } elseif (substr($data, 4) < 999) {
                $data = substr($data, 0, 5).''.$num;
            } else {
                $data = substr($data, 0, 4).''.$num;
            }
        } elseif ($cek == 3) {
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

    public function hapus($ac, $id, $id1)
    {
        if ($ac == 'u') {
            $this->model->hapusDataUser($id.'/'.$id1);
            $this->session->set_flashdata('message', '<p class="mb-0 text-primary">Data user berhasil dihapus!</p>');
            redirect('admin/duser');
        } elseif ($ac == 'p') {
            $this->model->hapusDataProduk($id.'/'.$id1);
            $this->session->set_flashdata('message', '<p class="mb-0 text-primary">Data produk berhasil dihapus!</p>');
            redirect('admin/dproduk');
        } elseif ($ac == 'bp') {
            $this->model->hapusDataBahanProduk($id.'/'.$id1);
            $this->session->set_flashdata('message', '<p class="mb-0 text-primary">Data bahan produk berhasil dihapus!</p>');
            redirect('admin/dstok');
        }
    }


    public function formVal()
    {
        $this->form_validation->set_rules('inputName', 'Full Name', 'required|trim|min_length[5]|max_length[30]');
        $this->form_validation->set_rules('inputNoHp', 'No Hp', 'required|trim|is_natural|min_length[11]|max_length[12]');
        $this->form_validation->set_rules('inputEmail', 'Email', 'trim|valid_email|max_length[40]');
        $this->form_validation->set_rules('formTextarea', 'Alamat', 'trim|max_length[250]');
    }

    private function inpGambar($data, $hlm)
    {
        $image = $_FILES['inputPicture']['name'];
        
        if ($image) {
            $config['upload_path'] = './assets/img/uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']  = '64';
            $config['max_width'] = '512';
            $config['max_height'] = '384';
            
            $this->load->library('upload', $config);
            $this->upload->do_upload();
            
            if ($this->upload->do_upload('inputPicture')) {
                $data['gambar'] = file_get_contents($this->upload->data('full_path'));
            } else {
                $this->session->set_flashdata('message', '<p class="mb-0 text-danger">'.$this->upload->display_errors().'</p>');
                redirect('admin/'.$hlm);
            }
            unlink(FCPATH . 'assets/img/uploads/' . $image);
        }
        return $data;
    }
}