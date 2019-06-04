<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estate extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('About_us_model');
        $this->load->model('Highlight_model');
        $this->load->model('Post_model');
        $this->load->model('Slider_model');
        $this->load->model('Post_model');
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
        $highlight = $this->Highlight_model->get_all();
        $slider = $this->Slider_model->get_all();
        $post = $this->Post_model->get_top3();
        $data = array(
            'about_us_data' => $about_us,
			'highlight_data' => $highlight,
			'post_data' => $post,
			'slider_data' => $slider,
        );
		$this->load->view('estate/home',$data);
	}
	
}
