<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Post extends CI_Controller
{
    private $array_is_active = array(
        '0'         => 'Non Active',
        '1'         => 'Active',
    );

    private $cfg_header = array(
            'Title',
            'Post Date',
            'Is Active',
            'Post By',
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
        $this->load->model('Post_model');
        $this->load->library('form_validation');
        $this->_init();
    }
    private function _init()
    {
        $this->output->set_template('lte');
        $this->output->set_title("Post");

    }
    public function index()
    {
        $post = $this->Post_model->get_all();
        
        // $i = 0;
        // foreach ($post as $row) {
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
            'header' => $this->cfg_header,
            'record' => $post,
            'controller' => 'post',
        );
        $this->load->view('admin/post/list_table',$data);
    }

    public function read($id) 
    {
        $row = $this->Post_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_provinsi' => $row->id_provinsi,
		'provinsi' => $row->provinsi,
		'thn2008' => $row->thn2008,
		'thn2011' => $row->thn2011,
		'thn2014' => $row->thn2014,
	    );
            $this->load->view('post/post_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('post'));
        }
    }

    public function create() 
    {
        $data = array(
            'module_title' =>'Post',
            'button' => 'Create',
            'action' => site_url( "post/create_action"),
            'title' => set_value('title'),
            'description' => set_value('description'),
            'image' => set_value('image'),
            'id_post' => set_value('id_post'),
            'is_active' => set_value('is_active'),
            'post_by' => set_value('post_by'),
            'post_date' => set_value('post_date'),
            'array_is_active' => $this->array_is_active,
        );
        $this->load->view('admin/post/post_form', $data);
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
                    redirect(site_url('post'));
                } else {
                    $data['image'] = $this->upload->data('file_name');
                    // $upload_data = array('upload_data' => $this->upload->data());
                }
            }

            $data['title'] = $this->input->post('title', TRUE);
            $data['description'] = $this->input->post('description', TRUE);
            $data['is_active'] = $this->input->post('is_active', TRUE);
            $data['post_by'] = $this->session->userdata('nama_admin');
            $data['post_date'] = $this->convert_date_sql($this->input->post('post_date', TRUE), 3);


            // $this->Post_model->update($this->input->post('id_provinsi', TRUE), $data);
            $this->Post_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('post'));
        }

            
    }
    
    // public function update($id) 
    public function update($id) 
    {
        $row = $this->Post_model->get_by_id($id);

        if ($row) {
            // print_r($row);
            // die();
            $data = array(
                'module_title' =>'Post',
                'button' => 'Update',
                'action' => site_url("post/update_action"),
		'title' => set_value('title', $row->title),
		'description' => set_value('description', $row->description),
		'image' => set_value('image', $row->image),
		'id_post' => set_value('id_post', $row->id_post),
		'is_active' => set_value('is_active', $row->is_active),
		'post_by' => set_value('post_by', $row->post_by),
		'post_date' => set_value('post_date', date('d/m/Y',strtotime($row->post_date))),
        'array_is_active' => $this->array_is_active,
	    );
            $this->load->view('admin/post/post_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('post'));
        }
    }
    
    public function update_action() 
    {
        // print_r($this->input->post('image',TRUE));
        // die();
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $id = $this->update($this->input->post( 'id_post', TRUE));
            
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
                    redirect(site_url('post'));
                }else{
                    $data['image'] = $this->upload->data('file_name');
                    // $upload_data = array('upload_data' => $this->upload->data());
                }
            }

            $data['title'] = $this->input->post('title',TRUE);
            $data['description'] = $this->input->post('description',TRUE);
            $data['is_active'] = $this->input->post('is_active',TRUE);
            // $data['post_date'] = date('Y-m-d',strtotime($this->input->post('post_date', TRUE)));
            $data['post_date'] = $this->convert_date_sql( $this->input->post('post_date', TRUE),3);
            // $this->Post_model->update($this->input->post('id_provinsi', TRUE), $data);
            $this->Post_model->update($this->input->post('id_post', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('post'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Post_model->get_by_id($id);

        if ($row) {
            $this->Post_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('post'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('post'));
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

	foreach ($this->Post_model->get_all() as $data) {
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
            'post_data' => $this->Post_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('post/post_doc',$data);
    }

    private function convert_date_sql($tanggal, $format = "1")
    {
        $tanggal_array = explode("/", $tanggal); //format 31/01/2013
        $_tanggal_array = count($tanggal_array);
        if ($format == '0') { //format 01/31/2013
            if ($_tanggal_array > 1) {
                $output = "'" . $tanggal_array[1] . "/" . $tanggal_array[0] . "/" . $tanggal_array[2] . "'";
            } else {
                $output = "NULL";
            }
        } elseif ($format == '1') { //format 2013-01-31
            if ($_tanggal_array > 1) {
                $output = "'" . $tanggal_array[2] . "-" . $tanggal_array[1] . "-" . $tanggal_array[0] . "'";
            } else {
                $output = "NULL";
            }
        } elseif ($format == '2') { //format 2013-31-01
            if ($_tanggal_array > 1) {
                $output = "'" . $tanggal_array[2] . "-" . $tanggal_array[0] . "-" . $tanggal_array[1] . "'";
            } else {
                $output = "NULL";
            }
        } elseif ($format == '3') { //format 2013-31-01
            if ($_tanggal_array > 1) {
                $output = "" . $tanggal_array[2] . "-" . $tanggal_array[1] . "-" . $tanggal_array[0] . "";
            } else {
                $output = "NULL";
            }
        }
        return $output;
    }

}

/* End of file post.php */
/* Location: ./application/controllers/post.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-25 15:02:42 */
/* http://harviacode.com */