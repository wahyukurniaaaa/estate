<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontend extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('About_us_model');
        $this->load->model('Highlight_model');
        $this->load->model('Post_model');
        $this->load->model('Slider_model');
        $this->load->model('Post_model');
        $this->load->model('Contact_us_model');
        $this->load->model('Map_location_model');
        $this->load->model('Site_plan_model');
        $this->load->model('Specification_model');
        $this->load->model('Housetype_model');
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

	public function blog()
	{

        $post = $this->Post_model->get_active();
        $data = array(
			'post_data' => $post,
        );
		$this->load->view('estate/blog_list',$data);
	}

	public function blog_detail($id)
	{

        $post = $this->Post_model->get_by_id($id);
        $data = array(
			'post_data' => $post,
        );
		$this->load->view('estate/blog_detail',$data);
	}

	public function contact()
	{

        $post = $this->Contact_us_model->get_all();
        $data = array(
			'contact_data' => $post,
        );
		$this->load->view('estate/contact',$data);
	}

	public function  map_location()
	{

        $post = $this->Map_location_model->get_all();
        $data = array(
			'location_data' => $post,
        );
		$this->load->view('estate/map_location',$data);
	}


	public function  site_plan()
	{

        $post = $this->Site_plan_model->get_all();
        $data = array(
			'site_plan_data' => $post,
        );
		$this->load->view('estate/site_plan',$data);
	}

	public function  specification()
	{

        $post = $this->Specification_model->get_all();
        $data = array(
			'spec_data' => $post,
        );
		$this->load->view('estate/specification',$data);
	}

	public function house_type()
	{

        $post = $this->Housetype_model->get_all();
        $data = array(
			'housetype_data' => $post,
        );
		$this->load->view('estate/house_type',$data);
	}

	public function housetype_detail($id)
	{

        $post = $this->Housetype_model->get_by_id($id);
        $data = array(
			'housetype_data' => $post,
        );
		$this->load->view('estate/housetype_detail',$data);
	}
	
}
