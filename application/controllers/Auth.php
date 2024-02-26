<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->library('form_validation');
        $this->load->model('model');
    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            if ($this->session->userdata('role_access') == 'user') {
                redirect('user');
            } elseif ($this->session->userdata('role_access') == 'admin') {
                redirect('admin');
            }
        }

        $this->form_validation->set_rules('inputUsername', 'Username', 'trim|required');
        $this->form_validation->set_rules('inputPassword', 'Password', 'trim|required');
        
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $data['role'] = 'auth';
            $data['modal'] = 'User';
            $data['produk'] = $this->model->getProdukLimit(4);

            $this->load->view('templates/auth_header', $data);
            $this->load->view('templates/auth_body', $data);
            $this->load->view('auth/user_log', $data);
            $this->load->view('templates/auth_footer');
        } else {
            // validasinya success
            $this->_login('user');
        }
    }

    public function admin()
    {
        if ($this->session->userdata('username')) {
            if ($this->session->userdata('role_access') == 'user') {
                redirect('user');
            } elseif ($this->session->userdata('role_access') == 'admin') {
                redirect('admin');
            }
        }

        $this->form_validation->set_rules('inputUsername', 'Username', 'trim|required');
        $this->form_validation->set_rules('inputPassword', 'Password', 'trim|required');
        
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page Admin';
            $data['role'] = 'auth/admin';
            $data['modal'] = 'Admin';
            $data['produk'] = $this->model->getProdukLimit(4);

            $this->load->view('templates/auth_header', $data);
            $this->load->view('templates/auth_body');
            $this->load->view('auth/admin_log', $data);
            $this->load->view('templates/auth_footer');
        } else {
            // validasinya success
            $this->_login('admin');
        }
    }

    private function _login($role_access)
    {
        $username = $this->input->post('inputUsername');
        $password = $this->input->post('inputPassword');
        
        $this->load->model('model');
        if ($role_access == 'admin') {
            $user = $this->model->getAdmin($username);
        } elseif ($role_access == 'user') {
            $user = $this->model->getPelanggan($username);
        }
        
        // user ada?
        if ($user) {
            // cek password
            if ($password == $user['password']) {
                $data = [
                    'username' => $user['username'],
                    'role_access' => $role_access
                ];
                
                $this->session->set_userdata($data);
                redirect($role_access);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger m-0" role="alert">
                    Wrong password!</div>');
                redirect($role_access == 'admin' ? 'auth/admin' : 'auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger m-0" role="alert">
                Account is not registered!</div>');
            redirect($role_access == 'admin' ? 'auth/admin' : 'auth');
        }
    }

    public function registration()
    {
        if ($this->session->userdata('username')) {
            if ($this->session->userdata('role_access') == 'user') {
                redirect('user');
            } elseif ($this->session->userdata('role_access') == 'admin') {
                redirect('admin');
            }
        }
        
        $this->form_validation->set_rules('inputName', 'Name', 'required|trim|min_length[5]|max_length[30]');
        $this->form_validation->set_rules('inputNoHp', 'No Hp', 'required|trim|is_natural|min_length[11]|max_length[12]');
        $this->form_validation->set_rules('inputUsername', 'Username', 'required|trim|min_length[5]|max_length[20]|is_unique[pelanggan.username]', [
            'is_unique' => 'This username has already registered!'
        ]);
        $this->form_validation->set_rules('inputPassword1', 'Password', 'required|trim|min_length[5]|max_length[20]|matches[inputPassword2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short! Min. 5'
        ]);
        $this->form_validation->set_rules('inputPassword2', 'Password', 'required|trim|matches[inputPassword1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'User Registration';
            $data['role'] = 'auth';
            $data['modal'] = '';

            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $this->load->model('model');
            $user = $this->model->getLastId('id_pelanggan', 'pelanggan');
            
            $data = [
                'id_pelanggan' => $this->_setId($user['id_pelanggan']),
                'username' => htmlspecialchars($this->input->post('inputUsername', true)),
                'nama_pelanggan' => htmlspecialchars($this->input->post('inputName', true)),
                'password' => $this->input->post('inputPassword1'),
                'no_telephone' => htmlspecialchars($this->input->post('inputNoHp', true)),
            ];

            $this->db->insert('pelanggan', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success m-0" role="alert">
                Congratulation! your account has been created</div>');
            redirect('auth');
        }
    }

    private function _setId($data)
    {
        $num = substr($data, 4) + 1;
        if (substr($data, 4) < 9) {
            $data = substr($data, 0, 7).''.$num;
        } elseif (substr($data, 4) < 99) {
            $data = substr($data, 0, 6).''.$num;
        } elseif (substr($data, 4) < 999) {
            $data = substr($data, 0, 5).''.$num;
        } else {
            $data = substr($data, 0, 4).''.$num;
        }
        return $data;
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_access');
        $this->session->set_flashdata('message', '<div class="alert alert-success m-0" role="alert">
                Your has been logout!</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}