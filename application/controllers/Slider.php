<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Slider extends CI_Controller
{
    private $array_is_active = array(
        '0'         => 'Non Active',
        '1'         => 'Active',
    );

    private $cfg_header = array(
            'Title',
            'Description',
            'Image',

    );

    private $cfg_data = array(
            'title',
            'description',
            'post_date',
            'is_active',
            'post_by',
            'image',

    );

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("auth"));
        }
        $this->load->model('Slider_model');
        $this->load->library('form_validation');
        $this->_init();
    }
    private function _init()
    {
        $this->output->set_template('lte');
        $this->output->set_title("Slider");

    }
    public function index()
    {
        $slider = $this->Slider_model->get_all();
        
        // $i = 0;
        // foreach ($slider as $row) {
        //     foreach ($this->cfg_data as $key => $val) {
        //         if($val== 'is_active'){
        //             $row->$val = 'active';
        //         }
        //         $record[$i][$val] = $row->$val;
        //     }
        //     $i++;
        // }
        // print_r($record);
        // die();
        $data = array(
            'module_title' => 'slider',
            'header' => $this->cfg_header,
            'record' => $slider,
            'controller' => 'slider',
        );
        $this->load->view('admin/slider/list_table',$data);
    }

    public function read($id) 
    {
        $row = $this->Slider_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_provinsi' => $row->id_provinsi,
		'provinsi' => $row->provinsi,
		'thn2008' => $row->thn2008,
		'thn2011' => $row->thn2011,
		'thn2014' => $row->thn2014,
	    );
            $this->load->view('slider/slider_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('slider'));
        }
    }

    public function create() 
    {
        $data = array(
            'module_title' =>'slider',
            'button' => 'Create',
            'action' => site_url( "slider/create_action"),
            'title' => set_value('title'),
            'description' => set_value('description'),
            'image' => set_value('image'),
            'id_slider' => set_value('id_slider'),
            // 'array_is_active' => $this->array_is_active,
        );
        $this->load->view('admin/slider/slider_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            if (!isset($_FILES['image']) || $_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) {
                // nothing
            } else {
                $config['upload_path']          = './gambar/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['file_name']            = 'image_' . uniqid();
                // $config['max_size']             = 100;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message_error', $error);
                    redirect(site_url('slider'));
                } else {
                    $data['image'] = $this->upload->data('file_name');
                    // $upload_data = array('upload_data' => $this->upload->data());
                }
            }

            $data['title'] = $this->input->post('title', TRUE);
            $data['description'] = $this->input->post('description', TRUE);

            // $this->Slider_model->update($this->input->post('id_provinsi', TRUE), $data);
            $this->Slider_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('slider'));
        }

            
    }
    
    // public function update($id) 
    public function update($id) 
    {
        $row = $this->Slider_model->get_by_id($id);

        if ($row) {
            // print_r($row);
            // die();
            $data = array(
                'module_title' =>'slider',
                'button' => 'Update',
                'action' => site_url("slider/update_action"),
		'title' => set_value('title', $row->title),
		'description' => set_value('description', $row->description),
		'image' => set_value('image', $row->image),
		'id_slider' => set_value('id_slider', $row->id_slider),
	    );
            $this->load->view('admin/slider/slider_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('slider'));
        }
    }
    
    public function update_action() 
    {
        // print_r($this->input->post('image',TRUE));
        // die();
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $id = $this->update($this->input->post( 'id_slider', TRUE));
            
            $this->update($id);
        } else {
            if(!isset($_FILES['image']) || $_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) {
                    // nothing
            }else{
                $config['upload_path']          = './gambar/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['file_name']            = 'image_'.uniqid();
                // $config['max_size']             = 100;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('image')){
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message_error', $error);
                    redirect(site_url('slider'));
                }else{
                    $data['image'] = $this->upload->data('file_name');
                    // $upload_data = array('upload_data' => $this->upload->data());
                }
            }

            $data['title'] = $this->input->post('title',TRUE);
            $data['description'] = $this->input->post('description',TRUE);

            // $this->Slider_model->update($this->input->post('id_provinsi', TRUE), $data);
            $this->Slider_model->update($this->input->post('id_slider', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('slider'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Slider_model->get_by_id($id);

        if ($row) {
            $this->Slider_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('slider'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('slider'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('title', 'title', 'trim|required');
	$this->form_validation->set_rules('description', 'description', 'trim|required');

	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "post.xls";
        $judul = "post";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Provinsi");
	xlsWriteLabel($tablehead, $kolomhead++, "Thn2008");
	xlsWriteLabel($tablehead, $kolomhead++, "Thn2011");
	xlsWriteLabel($tablehead, $kolomhead++, "Thn2014");

	foreach ($this->Slider_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->provinsi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->thn2008);
	    xlsWriteNumber($tablebody, $kolombody++, $data->thn2011);
	    xlsWriteNumber($tablebody, $kolombody++, $data->thn2014);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=post.doc");

        $data = array(
            'post_data' => $this->Slider_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('slider/slider_doc',$data);
    }

}

/* End of file post.php */
/* Location: ./application/controllers/post.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-25 15:02:42 */
/* http://harviacode.com */