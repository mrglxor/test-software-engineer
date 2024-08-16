# Lokasi API Spec

## Menambahkan data

Endpoint : POST /lokasi

Request Body :

```json
{
  "namaLokasi": "Cicalengka",
  "negara": "Indonesia",
  "provinsi": "Jawa Barat",
  "kota": "Bandung"
}
```

Response Body (Success) :

```json
{
  "data": "Berhasil menambahkan data lokasi"
}
```

Response Body (Failed) :

```json
{
  "errors": "Provinsi wajib diisi!, Nama Lokasi wajib diisi!"
}
```

## Menampilkan data

Endpoint : GET /lokasi

Response Body (Success) :

```json
{
  "data": [
    {
      "id": "1",
      "namaLokasi": "Cicalengka",
      "negara": "Indonesia",
      "provinsi": "Jawa Barat",
      "kota": "Bandung",
      "createdAt": "2024-08-15T14:58:38"
    },
    {
      "id": "2",
      "namaLokasi": "Majalaya",
      "negara": "Indonesia",
      "provinsi": "Jawa Barat",
      "kota": "Bandung",
      "createdAt": "2024-08-15T14:58:38"
    },
    {
      "id": "3",
      "namaLokasi": "Leles",
      "negara": "Indonesia",
      "provinsi": "Jawa Barat",
      "kota": "Garut",
      "createdAt": "2024-08-15T14:58:38"
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

Endpoint : PUT /lokasi/{id}

Parameter : Id lokasi

Request Body :

```json
{
  "namaLokasi": "Leles",
  "negara": "Indonesia",
  "provinsi": "Jawa Barat",
  "kota": "Garut"
}
```

Response Body (Success) :

```json
{
  "data": "Berhasil mengupdate data lokasi"
}
```

Response Body (Failed) :

```json
{
  "errors": "Provinsi wajib diisi!, Nama Lokasi wajib diisi!"
}
```

## Menghapus data

Endpoint : DELETE /proyek/{id}

Parameter : Id lokasi

Response Body (Success) :

```json
{
  "data": "Berhasil menghapus data lokasi"
}
```

Response Body (Failed) :

```json
{
  "errors": "Data tidak ditemukan!"
}
```
