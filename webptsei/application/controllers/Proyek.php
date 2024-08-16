<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proyek extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProyekModel');
        $this->load->model('ProyekLokasiModel');
    }

    public function index()
    {
        $data['data_proyek'] = $this->ProyekModel->get_proyek_data();
        $this->load->view('proyek', $data);
    }

    public function tambah()
    {

        $data_proyek = [
            'namaProyek' => $this->input->post('nama_proyek'),
            'client' => $this->input->post('client'),
            'tglMulai' => $this->input->post('tgl_mulai'),
            'tglSelesai' => $this->input->post('tgl_selesai'),
            'pimpinanProyek' => $this->input->post('pimpinan_proyek'),
            'keterangan' => $this->input->post('keterangan'),
            'lokasi' => [
                ['id' => $this->input->post('lokasi')]
            ]
        ];

        $result = $this->ProyekModel->tambah_proyek($data_proyek);

        if ($result['status']) {
            $this->session->set_flashdata('message', 'Proyek berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('message', $result['message']);
        }

        redirect(base_url());
    }
    public function delete()
    {
        $id = $this->input->post('id');

        $this->ProyekLokasiModel->delete_by_proyek_id($id);

        $this->ProyekModel->delete_proyek($id);

        $this->session->set_flashdata('message', 'Proyek berhasil dihapus.');
        redirect(base_url());
    }
    public function update()
    {
        $id = $this->input->post('id');
        $data = [
            'namaProyek' => $this->input->post('nama_proyek'),
            'client' => $this->input->post('client'),
            'tglMulai' => $this->input->post('tgl_mulai'),
            'tglSelesai' => $this->input->post('tgl_selesai'),
            'pimpinanProyek' => $this->input->post('pimpinan_proyek'),
            'keterangan' => $this->input->post('keterangan'),
        ];

        $this->ProyekModel->update($id, $data);

        $this->session->set_flashdata('message', 'Proyek berhasil diupdate.');
        redirect(base_url('proyek'));
    }
}
