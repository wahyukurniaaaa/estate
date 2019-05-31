<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('About_us_model');
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
        $data = array(
            'about_us_data' => $about_us,
        );
		$this->load->view('admin/home',$data);
	}

	
}
