<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "login") {
			redirect(base_url("auth"));
		}
        $this->load->model('About_us_model');
        $this->load->model('Slider_model');
        $this->load->model('Housetype_model');
        $this->load->model('Post_model');
        $this->load->model('login_model');
		$this->_init();
	}

	private function _init()
	{
		$this->output->set_template('lte');

	}

	public function index()
	{
		$this->output->set_title("Dashboard");

        $about_us = $this->About_us_model->get_all();
		$jumlah_row_slider = $this->Slider_model->jumlah_row();
		$jumlah_row_housetype = $this->Housetype_model->jumlah_row();
		$jumlah_row_post = $this->Post_model->jumlah_row();
		$jumlah_row_user = $this->login_model->jumlah_row();
        $data = array(
			'about_us_data' => $about_us,
			'jumlah_row_slider' => $jumlah_row_slider,
			'jumlah_row_housetype' => $jumlah_row_housetype,
			'jumlah_row_post' => $jumlah_row_post,
			'jumlah_row_user' => $jumlah_row_user,
        );
		$this->load->view('admin/home',$data);
	}

	
}
