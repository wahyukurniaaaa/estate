<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estate extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('About_us_model');
		$this->_init();
	}

	private function _init()
	{
		$this->output->set_title("Ciputat Residence One");
		$this->output->set_template('estate');

	}

	public function index()
	{

        $about_us = $this->About_us_model->get_all();
        $data = array(
            'about_us_data' => $about_us,
        );
		$this->load->view('estate/home',$data);
	}
	
}
