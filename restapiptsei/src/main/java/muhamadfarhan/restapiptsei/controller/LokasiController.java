package muhamadfarhan.restapiptsei.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;
import java.util.ArrayList;
import java.util.Collections;
import java.util.List;
import java.util.Map;
import muhamadfarhan.restapiptsei.model.Lokasi;
import muhamadfarhan.restapiptsei.repository.LokasiRepository;

@RestController
@RequestMapping("/lokasi")
public class LokasiController {

    @Autowired
    private LokasiRepository lokasiRepository;

    @PostMapping
    public ResponseEntity<Object> addLokasi(@RequestBody Lokasi lokasi) {
        List<String> errors = new ArrayList<>();

        if (lokasi.getNamaLokasi() == null || lokasi.getNamaLokasi().isEmpty()) {
            errors.add("Nama Lokasi wajib diisi!");
        }
        if (lokasi.getNegara() == null || lokasi.getNegara().isEmpty()) {
            errors.add("Negara wajib diisi!");
        }
        if (lokasi.getProvinsi() == null || lokasi.getProvinsi().isEmpty()) {
            errors.add("Provinsi wajib diisi!");
        }
        if (lokasi.getKota() == null || lokasi.getKota().isEmpty()) {
            errors.add("Kota wajib diisi!");
        }

        if (!errors.isEmpty()) {
            return ResponseEntity.badRequest().body(Collections.singletonMap("errors", String.join(", ", errors)));
        }

        try {
            lokasiRepository.save(lokasi);
            return ResponseEntity.ok(Collections.singletonMap("data", "Berhasil menambahkan data lokasi"));
        } catch (Exception e) {
            return ResponseEntity.status(HttpStatus.INTERNAL_SERVER_ERROR)
                    .body(Collections.singletonMap("errors", "Terjadi sesuatu yang salah!"));
        }
    }

    @GetMapping
    public ResponseEntity<Map<String, Object>> getAllLokasi() {
        try {
            List<Lokasi> lokasiList = lokasiRepository.findAll();
            return ResponseEntity.ok(Collections.singletonMap("data", lokasiList));
        } catch (Exception e) {
            return ResponseEntity.status(HttpStatus.INTERNAL_SERVER_ERROR)
                    .body(Collections.singletonMap("errors", "Terjadi sesuatu yang salah!"));
        }
    }

    @PutMapping("/{id}")
    public ResponseEntity<Map<String, Object>> updateLokasi(@PathVariable Integer id, @RequestBody Lokasi lokasi) {
        List<String> errors = new ArrayList<>();

        if (lokasi.getNamaLokasi() == null || lokasi.getNamaLokasi().isEmpty()) {
            errors.add("Nama Lokasi wajib diisi!");
        }
        if (lokasi.getNegara() == null || lokasi.getNegara().isEmpty()) {
            errors.add("Negara wajib diisi!");
        }
        if (lokasi.getProvinsi() == null || lokasi.getProvinsi().isEmpty()) {
            errors.add("Provinsi wajib diisi!");
        }
        if (lokasi.getKota() == null || lokasi.getKota().isEmpty()) {
            errors.add("Kota wajib diisi!");
        }

        if (!errors.isEmpty()) {
            return ResponseEntity.badRequest()
                    .body(Collections.singletonMap("errors", String.join(", ", errors)));
        }

        try {
            Lokasi existingLokasi = lokasiRepository.findById(id).orElse(null);
            if (existingLokasi == null) {
                return ResponseEntity.status(HttpStatus.NOT_FOUND)
                        .body(Collections.singletonMap("errors", "Data tidak ditemukan"));
            }

            if (lokasi.getNamaLokasi() != null)
                existingLokasi.setNamaLokasi(lokasi.getNamaLokasi());
            if (lokasi.getNegara() != null)
                existingLokasi.setNegara(lokasi.getNegara());
            if (lokasi.getProvinsi() != null)
                existingLokasi.setProvinsi(lokasi.getProvinsi());
            if (lokasi.getKota() != null)
                existingLokasi.setKota(lokasi.getKota());

            lokasiRepository.save(existingLokasi);
            return ResponseEntity.ok(Collections.singletonMap("data", "Berhasil mengupdate data lokasi"));
        } catch (Exception e) {
            return ResponseEntity.status(HttpStatus.INTERNAL_SERVER_ERROR)
                    .body(Collections.singletonMap("errors", "Terjadi sesuatu yang salah!"));
        }
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<Map<String, String>> deleteLokasi(@PathVariable Integer id) {
        try {
            if (lokasiRepository.existsById(id)) {
                lokasiRepository.deleteById(id);
                return ResponseEntity.ok(Collections.singletonMap("data", "Berhasil menghapus data lokasi"));
            } else {
                return ResponseEntity.status(HttpStatus.NOT_FOUND)
                        .body(Collections.singletonMap("errors", "Data tidak ditemukan"));
            }
        } catch (Exception e) {
            return ResponseEntity.status(HttpStatus.INTERNAL_SERVER_ERROR)
                    .body(Collections.singletonMap("errors", "Terjadi sesuatu yang salah!"));
        }
    }

}
