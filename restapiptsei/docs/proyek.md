# Proyek API Spec

## Menambahkan data

Endpoint : POST /proyek

Request Body :

```json
{
  "namaProyek": "Web E-Commerce",
  "client": "Sandhika Galih",
  "tglMulai": "2024-07-19T07:00:00",
  "tglSelesai": "2024-08-19T12:30:00",
  "pimpinanProyek": "Eko Kurniawan Khannedy",
  "keterangan": "Membuat Website E-Commerce yang menggunakan teknologi framework Spring Boot dan Memakai Bahasa Pemrograman Java",
  "lokasi": [
    {
      "id": 1
    }
  ]
}
```

Response Body (Success) :

```json
{
  "data": {
    "id": 17,
    "namaProyek": "E-Commerce",
    "client": "Eko",
    "tglMulai": "2024-08-16T09:00:00",
    "tglSelesai": "2024-08-20T17:00:00",
    "pimpinanProyek": "Sandhika",
    "keterangan": "",
    "createdAt": "2024-08-16T23:44:13.6805378",
    "lokasi": [
      {
        "id": 10
      }
    ]
  },
  "status": "Berhasil menambahkan data proyek"
}
```

Response Body (Failed) :

```json
{
  "errors": "Nama Lokasi wajib diisi!, Nama Client wajib diisi!"
}
```

## Menampilkan data

Endpoint : GET /proyek

Response Body (Success) :

```json
{
  "data": [
    {
      "id": "1",
      "nama_proyek": "Web E-Commerce",
      "client": "Sandhika Galih",
      "tgl_mulai": "19-07-2024 07:00:00",
      "tgl_selesai": "19-08-2024 12:30:00",
      "pimpinan_proyek": "Eko Kurniawan Khannedy",
      "keterangan": "Membuat Website E-Commerce yang menggunakan teknologi framework Spring Boot dan Memakai Bahasa Pemrograman Java",
      "nama_lokasi": "Cicalengka",
      "negara": "Indonesia",
      "provinsi": "Jawa Barat",
      "kota": "Bandung"
    },
    {
      "id": "2",
      "nama_proyek": "Web E-Learning",
      "client": "Sandhika Galih",
      "tgl_mulai": "19-07-2024 07:00:00",
      "tgl_selesai": "19-08-2024 12:30:00",
      "pimpinan_proyek": "Eko Kurniawan Khannedy",
      "keterangan": "Membuat Website E-Learning yang menggunakan teknologi framework Spring Boot dan Memakai Bahasa Pemrograman Java",
      "nama_lokasi": "Cicalengka",
      "negara": "Indonesia",
      "provinsi": "Jawa Barat",
      "kota": "Bandung"
    }
  ]
}
```

Response Body (Failed) :

```json
{
  "errors": "Terjadi sesuatu yang salah!"
}
```

## Update data

Endpoint : PUT /proyek/{id}

Parameter: Id Proyek

Request Body :

```json
{
  "namaProyek": "Web E-Commerce Update",
  "client": "Sandhika Galih",
  "tglMulai": "2024-07-19T07:00:00",
  "tglSelesai": "2024-08-19T12:30:00",
  "pimpinanProyek": "Eko Kurniawan Khannedy",
  "keterangan": "Membuat Website E-Commerce yang menggunakan teknologi framework Spring Boot dan Memakai Bahasa Pemrograman Java",
  "lokasi": [
    {
      "id": 1
    }
  ]
}
```

Response Body (Success) :

```json
{
  "data": "Berhasil mengupdate data proyek"
}
```

Response Body (Failed) :

```json
{
  "errors": "Pimpinan Proyek wajib diisi!"
}
```

## Menghapus data

Endpoint : DELETE /proyek/{id}

Parameter : Id Proyek

Response Body (Success) :

```json
{
  "data": "Berhasil menghapus data proyek"
}
```

Response Body (Failed) :

```json
{
  "errors": "Terjadi sesuatu yang salah!"
}
```
