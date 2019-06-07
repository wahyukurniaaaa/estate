<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Housetype extends CI_Controller
{
    private $array_is_active = array(
        '0'         => 'Non Active',
        '1'         => 'Active',
    );

    private $cfg_header = array(
            'Type',
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
        $this->load->model('Housetype_model');
        $this->load->library('form_validation');
        $this->_init();
    }
    private function _init()
    {
        $this->output->set_template('lte');
        $this->output->set_title("House Type");

    }
    public function index()
    {
        $housetype = $this->Housetype_model->get_all();
        
        // $i = 0;
        // foreach ($housetype as $row) {
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
            'module_title' => 'Housetype',
            'header' => $this->cfg_header,
            'record' => $housetype,
            'controller' => 'Housetype',
            'primary_key' => $this->Housetype_model->id,
        );
        $this->load->view('admin/housetype/list_table',$data);
    }

    public function read($id) 
    {
        $row = $this->Housetype_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_provinsi' => $row->id_provinsi,
		'provinsi' => $row->provinsi,
		'thn2008' => $row->thn2008,
		'thn2011' => $row->thn2011,
		'thn2014' => $row->thn2014,
	    );
            $this->load->view('housetype/highlight_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('housetype'));
        }
    }

    public function create() 
    {
        $data = array(
            'module_title' =>'Housetype',
            'button' => 'Create',
            'action' => site_url( "housetype/create_action"),
            'type' => set_value('type'),
            'description' => set_value('description'),
            'image' => set_value('image'),
            'title' => set_value('title'),
            $this->Housetype_model->id => set_value($this->Housetype_model->id),
            // 'array_is_active' => $this->array_is_active,
        );
        $this->load->view('admin/housetype/housetype_form', $data);
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
                    redirect(site_url('housetype'));
                } else {
                    $data['image'] = $this->upload->data('file_name');
                    // $upload_data = array('upload_data' => $this->upload->data());
                }
            }

            $data['type'] = $this->input->post('type', TRUE);
            $data['title'] = $this->input->post('title', TRUE);
            $data['description'] = $this->input->post('description', TRUE);

            // $this->Housetype_model->update($this->input->post('id_provinsi', TRUE), $data);
            $this->Housetype_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('housetype'));
        }

            
    }
    
    // public function update($id) 
    public function update($id) 
    {
        $row = $this->Housetype_model->get_by_id($id);

        if ($row) {
            // print_r($row);
            // die();
            $data = array(
                'module_title' =>'Housetype',
                'button' => 'Update',
                'action' => site_url("housetype/update_action"),
		'type' => set_value('type', $row->type),
		'description' => set_value('description', $row->description),
		'image' => set_value('image', $row->image),
		'title' => set_value('title', $row->title),
        'id_type' => set_value('id_type', $row->id_type),
        // 'primary_key'=> set_value($this->Housetype_model->id,$row->$this->Housetype_model->id),

	    );
            $this->load->view('admin/housetype/housetype_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('housetype'));
        }
    }
    
    public function update_action() 
    {
        // print_r($this->input->post('image',TRUE));
        // die();
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $id = $this->update($this->input->post( 'id_type', TRUE));
            
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
                    redirect(site_url('housetype'));
                }else{
                    $data['image'] = $this->upload->data('file_name');
                    // $upload_data = array('upload_data' => $this->upload->data());
                }
            }

            $data['type'] = $this->input->post('type',TRUE);
            $data['title'] = $this->input->post('title',TRUE);
            $data['description'] = $this->input->post('description',TRUE);

            // $this->Housetype_model->update($this->input->post('id_provinsi', TRUE), $data);
            $this->Housetype_model->update($this->input->post('id_type', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('housetype'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Housetype_model->get_by_id($id);

        if ($row) {
            $this->Housetype_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('housetype'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('housetype'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('type', 'type', 'trim|required');
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

	foreach ($this->Housetype_model->get_all() as $data) {
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
            'post_data' => $this->Housetype_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('housetype/highlight_doc',$data);
    }

}

/* End of file post.php */
/* Location: ./application/controllers/post.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-25 15:02:42 */
/* http://harviacode.com */