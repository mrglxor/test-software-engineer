<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('LokasiModel');
        $this->load->model('ProyekLokasiModel');
    }

    public function index()
    {
        $data['data_lokasi'] = $this->LokasiModel->get_lokasi_data();
        $this->load->view('lokasi', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $data = [
            'namaLokasi' => $this->input->post('nama_lokasi'),
            'negara' => $this->input->post('negara'),
            'provinsi' => $this->input->post('provinsi'),
            'kota' => $this->input->post('kota')
        ];

        $this->LokasiModel->update_lokasi($id, $data);

        $this->session->set_flashdata('message', 'Lokasi berhasil diupdate.');
        redirect(base_url('lokasi'));
    }
    public function tambah()
    {
        $data_lokasi = [
            'namaLokasi' => $this->input->post('nama_lokasi'),
            'negara' => $this->input->post('negara'),
            'provinsi' => $this->input->post('provinsi'),
            'kota' => $this->input->post('kota')
        ];

        $result = $this->LokasiModel->tambah_lokasi($data_lokasi);

        if ($result['status']) {
            $this->session->set_flashdata('message', 'Lokasi berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('message', $result['message']);
        }

        redirect(base_url('lokasi'));
    }
    public function delete()
    {
        $id = $this->input->post('id');

        $this->ProyekLokasiModel->delete_by_lokasi_id($id);

        $this->LokasiModel->delete_lokasi($id);

        $this->session->set_flashdata('message', 'Lokasi berhasil dihapus.');
        redirect(base_url('lokasi'));
    }
}
