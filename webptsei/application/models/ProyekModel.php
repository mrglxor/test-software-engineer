<?php

class ProyekModel extends CI_Model
{
    public function get_proyek_data()
    {
        $response = file_get_contents('http://localhost:8080/proyek');
        $data = json_decode($response, true);
        return $data['data'];
    }

    public function count_proyek_data()
    {
        $data = $this->get_proyek_data();
        return count($data);
    }

    public function get_lokasi_data()
    {
        $response = file_get_contents('http://localhost:8080/lokasi');
        $data = json_decode($response, true);
        return $data['data'];
    }

    public function count_lokasi_data()
    {
        $data = $this->get_lokasi_data();
        return count($data);
    }

    public function tambah_proyek($data_proyek)
    {
        $api_url = 'http://localhost:8080/proyek';

        $ch = curl_init($api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_proyek));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

        $response = curl_exec($ch);
        $response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($response === false) {
            return ['status' => false, 'message' => 'Gagal menghubungi API'];
        }

        $response_data = json_decode($response, true);

        if ($response_code == 200 && isset($response_data['data'])) {
            return ['status' => true, 'message' => 'Proyek berhasil ditambahkan'];
        } else {
            $message = isset($response_data['errors']) ? $response_data['errors'] : 'Gagal menambahkan proyek';
            return ['status' => false, 'message' => $message];
        }
    }

    public function get_proyek_lokasi_data()
    {
        $proyek_data = $this->get_proyek_data();
        $lokasi_data = $this->get_lokasi_data();

        foreach ($proyek_data as &$proyek) {
            $lokasi_id = $proyek['lokasi'][0]['id'] ?? null;
            if ($lokasi_id) {
                foreach ($lokasi_data as $lokasi) {
                    if ($lokasi['id'] == $lokasi_id) {
                        $proyek['lokasi'] = $lokasi;
                        break;
                    }
                }
            } else {
                $proyek['lokasi'] = null;
            }
        }

        return $proyek_data;
    }

    public function delete_proyek($id)
    {
        $api_url = 'http://localhost:8080/proyek/';

        $url = $api_url . $id;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        curl_close($ch);

        if ($http_code == 200) {
            $response = json_decode($response, true);
            return $response['data'] ?? 'Delete failed';
        } else {
            return 'Delete failed with status code: ' . $http_code;
        }
    }
    public function update($id, $data)
    {
        $api_url = 'http://localhost:8080/proyek/';

        $url = $api_url . $id;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen(json_encode($data))
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if ($http_code == 200) {
            $response = json_decode($response, true);
            return $response['data'] ?? 'Update failed';
        } else {
            return 'Update failed with status code: ' . $http_code;
        }
    }
}
