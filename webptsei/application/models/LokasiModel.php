<?php

class LokasiModel extends CI_Model
{

    public function get_lokasi_data()
    {
        $response = file_get_contents('http://localhost:8080/lokasi');
        $data = json_decode($response, true);
        return $data['data'];
    }

    public function update_lokasi($id, $data)
    {
        $api_url = 'http://localhost:8080/lokasi/';
        $url = $api_url . $id;

        $json_data = json_encode($data);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($json_data)
        ]);

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
    public function tambah_lokasi($data_lokasi)
    {
        $api_url = 'http://localhost:8080/lokasi';

        $ch = curl_init($api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_lokasi));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

        $response = curl_exec($ch);
        $response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($response === false) {
            return ['status' => false, 'message' => 'Gagal menghubungi API'];
        }

        $response_data = json_decode($response, true);

        if ($response_code == 200 && isset($response_data['data'])) {
            return ['status' => true, 'message' => 'Lokasi berhasil ditambahkan'];
        } else {
            $message = isset($response_data['errors']) ? $response_data['errors'] : 'Gagal menambahkan Lokasi';
            return ['status' => false, 'message' => $message];
        }
    }
    public function delete_lokasi($id)
    {
        $api_url = 'http://localhost:8080/lokasi/';

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
}
