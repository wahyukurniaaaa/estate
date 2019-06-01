<?php

class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    function index()
    {
        $this->load->view('auth/v_login');
    }

    function aksi_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'username' => $username,
            'password' => md5($password)
        );
        $cek = $this->login_model->cek_login("tbl_admin", $where)->num_rows();
        if ($cek > 0) {
            $data   = $this->login_model->cek_login("tbl_admin", $where)->row();
            $nama_admin = $data->nama_admin ;
            $data_session = array(
                'nama' => $username,
                'nama_nama_admin' => $nama_admin,
                'status' => "login"
            );

            $this->session->set_userdata($data_session);
            
            redirect(base_url("admin"));
        } else {
            $this->session->set_flashdata('fail','Oops... Username/password salah');
            redirect(base_url("auth"));
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}
