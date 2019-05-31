<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact_us extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Contact_us_model');
        $this->load->library('form_validation');
        $this->_init();
    }
    private function _init()
    {
        $this->output->set_template('lte');
    }
    public function index()
    {
        $this->output->set_title("Contact Us");
        $this->update();
    }

    public function read($id) 
    {
        $row = $this->Contact_us_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_provinsi' => $row->id_provinsi,
		'provinsi' => $row->provinsi,
		'thn2008' => $row->thn2008,
		'thn2011' => $row->thn2011,
		'thn2014' => $row->thn2014,
	    );
            $this->load->view('contact_us/contact_us_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('contact_us'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('contact_us/create_action'),
            'id_provinsi' => set_value('id_provinsi'),
            'provinsi' => set_value('provinsi'),
            'thn2008' => set_value('thn2008'),
            'thn2011' => set_value('thn2011'),
            'thn2014' => set_value('thn2014'),
	);
        $this->load->view('contact_us/contact_us_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'provinsi' => $this->input->post('provinsi',TRUE),
		'thn2008' => $this->input->post('thn2008',TRUE),
		'thn2011' => $this->input->post('thn2011',TRUE),
		'thn2014' => $this->input->post('thn2014',TRUE),
	    );

            $this->Contact_us_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('contact_us'));
        }
    }
    
    // public function update($id) 
    public function update() 
    {
        $row = $this->Contact_us_model->get_all();

        if ($row) {
            // print_r($row);
            // die();
            $data = array(
                'button' => 'Update',
                'action' => site_url('contact_us/update_action'),
                'description' => set_value('description', $row->description),
                'id_contact' => set_value('id_contact', $row->id_contact),
	    );
            $this->load->view('admin/contact_us_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('contact_us'));
        }
    }
    
    public function update_action() 
    {
        // print_r($this->input->post('image',TRUE));
        // die();
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            // $this->update($this->input->post('id_provinsi', TRUE));
            $this->update();
        } else {
            $data['description'] = $this->input->post('description',TRUE);

            $this->Contact_us_model->update($this->input->post('id_contact', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('contact_us'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Contact_us_model->get_by_id($id);

        if ($row) {
            $this->Contact_us_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('contact_us'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('contact_us'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('description', 'description', 'trim|required');

	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "Contact_us.xls";
        $judul = "Contact_us";
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

	foreach ($this->Contact_us_model->get_all() as $data) {
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
        header("Content-Disposition: attachment;Filename=Contact_us.doc");

        $data = array(
            'Contact_us_data' => $this->Contact_us_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('Contact_us/Contact_us_doc',$data);
    }

}

/* End of file Contact_us.php */
/* Location: ./application/controllers/Contact_us.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-25 15:02:42 */
/* http://harviacode.com */