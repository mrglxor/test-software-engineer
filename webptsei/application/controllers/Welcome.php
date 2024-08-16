<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProyekModel');
	}

	public function index()
    {
        $data['count_proyek'] = $this->ProyekModel->count_proyek_data();
        $data['count_lokasi'] = $this->ProyekModel->count_lokasi_data();
        $data['count_proyek_lokasi'] = count($this->ProyekModel->get_proyek_lokasi_data());
        $data['proyek_data'] = $this->ProyekModel->get_proyek_lokasi_data();
        $data['lokasi_data'] = $this->ProyekModel->get_lokasi_data();
        $this->load->view('welcome_message', $data);
    }
}
