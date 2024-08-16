<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProyekLokasiModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function delete_by_proyek_id($proyek_id)
    {
        $this->db->where('proyek_id', $proyek_id);
        $this->db->delete('proyek_lokasi');
    }
    public function delete_by_lokasi_id($lokasi_id)
    {
        $this->db->where('lokasi_id', $lokasi_id);
        $this->db->delete('proyek_lokasi');
    }
}
