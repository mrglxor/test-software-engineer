package muhamadfarhan.restapiptsei.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import muhamadfarhan.restapiptsei.model.Lokasi;
import muhamadfarhan.restapiptsei.model.Proyek;
import muhamadfarhan.restapiptsei.repository.LokasiRepository;
import muhamadfarhan.restapiptsei.repository.ProyekRepository;

import java.util.ArrayList;
import java.util.Collections;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

@RestController
@RequestMapping("/proyek")
public class ProyekController {

    @Autowired
    private ProyekRepository proyekRepository;

    @Autowired
    private LokasiRepository lokasiRepository;

    @PostMapping
    public ResponseEntity<Map<String, Object>> addProyek(@RequestBody Proyek proyek) {
        List<String> errors = new ArrayList<>();

        if (proyek.getNamaProyek() == null || proyek.getNamaProyek().isEmpty()) {
            errors.add("Nama Proyek wajib diisi!");
        }
        if (proyek.getClient() == null || proyek.getClient().isEmpty()) {
            errors.add("Client wajib diisi!");
        }
        if (proyek.getTglMulai() == null) {
            errors.add("Tanggal Mulai wajib diisi!");
        }
        if (proyek.getTglSelesai() == null) {
            errors.add("Tanggal Selesai wajib diisi!");
        }
        if (proyek.getPimpinanProyek() == null || proyek.getPimpinanProyek().isEmpty()) {
            errors.add("Pimpinan Proyek wajib diisi!");
        }

        if (proyek.getLokasi() != null && !proyek.getLokasi().isEmpty()) {
            for (Lokasi lokasi : proyek.getLokasi()) {
                if (!lokasiRepository.existsById(lokasi.getId())) {
                    errors.add("Data lokasi tidak ditemukan!");
                }
            }
        } else {
            errors.add("Lokasi wajib diisi!");
        }

        if (!errors.isEmpty()) {
            return ResponseEntity.badRequest().body(Collections.singletonMap("errors", String.join(", ", errors)));
        }

        try {
            Proyek savedProyek = proyekRepository.save(proyek);

            Map<String, Object> response = new HashMap<>();
            response.put("status", "Berhasil menambahkan data proyek");
            response.put("data", savedProyek);

            return ResponseEntity.ok(response);
        } catch (Exception e) {
            return ResponseEntity.status(HttpStatus.INTERNAL_SERVER_ERROR)
                    .body(Collections.singletonMap("errors", "Terjadi sesuatu yang salah!"));
        }
    }

    @GetMapping
    public ResponseEntity<Map<String, Object>> getAllProyek() {
        try {
            List<Proyek> proyekList = proyekRepository.findAll();
            return ResponseEntity.ok(Collections.singletonMap("data", proyekList));
        } catch (Exception e) {
            return ResponseEntity.status(HttpStatus.INTERNAL_SERVER_ERROR)
                    .body(Collections.singletonMap("errors", "Terjadi sesuatu yang salah!"));
        }
    }

    @PutMapping("/{id}")
    public ResponseEntity<Map<String, Object>> updateProyek(@PathVariable Integer id,
            @RequestBody Proyek proyekDetails) {
        List<String> errors = new ArrayList<>();

        if (proyekDetails.getNamaProyek() == null || proyekDetails.getNamaProyek().isEmpty()) {
            errors.add("Nama Proyek wajib diisi!");
        }
        if (proyekDetails.getClient() == null || proyekDetails.getClient().isEmpty()) {
            errors.add("Client wajib diisi!");
        }
        if (proyekDetails.getTglMulai() == null) {
            errors.add("Tanggal Mulai wajib diisi!");
        }
        if (proyekDetails.getTglSelesai() == null) {
            errors.add("Tanggal Selesai wajib diisi!");
        }
        if (proyekDetails.getPimpinanProyek() == null || proyekDetails.getPimpinanProyek().isEmpty()) {
            errors.add("Pimpinan Proyek wajib diisi!");
        }

        if (!errors.isEmpty()) {
            return ResponseEntity.badRequest()
                    .body(Collections.singletonMap("errors", String.join(", ", errors)));
        }

        try {
            Proyek existingProyek = proyekRepository.findById(id).orElse(null);
            if (existingProyek == null) {
                return ResponseEntity.status(HttpStatus.NOT_FOUND)
                        .body(Collections.singletonMap("errors", "Data tidak ditemukan"));
            }

            if (proyekDetails.getNamaProyek() != null)
                existingProyek.setNamaProyek(proyekDetails.getNamaProyek());
            if (proyekDetails.getClient() != null)
                existingProyek.setClient(proyekDetails.getClient());
            if (proyekDetails.getTglMulai() != null)
                existingProyek.setTglMulai(proyekDetails.getTglMulai());
            if (proyekDetails.getTglSelesai() != null)
                existingProyek.setTglSelesai(proyekDetails.getTglSelesai());
            if (proyekDetails.getPimpinanProyek() != null)
                existingProyek.setPimpinanProyek(proyekDetails.getPimpinanProyek());
            if (proyekDetails.getKeterangan() != null)
                existingProyek.setKeterangan(proyekDetails.getKeterangan());
            if (proyekDetails.getLokasi() != null && !proyekDetails.getLokasi().isEmpty()) {
                for (Lokasi lokasi : proyekDetails.getLokasi()) {
                    if (lokasiRepository.existsById(lokasi.getId())) {
                        existingProyek.getLokasi().add(lokasi);
                    } else {
                        errors.add("Data lokasi tidak ditemukan!");
                    }
                }
            }

            if (!errors.isEmpty()) {
                return ResponseEntity.badRequest()
                        .body(Collections.singletonMap("errors", String.join(", ", errors)));
            }

            proyekRepository.save(existingProyek);
            return ResponseEntity.ok(Collections.singletonMap("data", "Berhasil mengupdate data proyek"));
        } catch (Exception e) {
            return ResponseEntity.status(HttpStatus.INTERNAL_SERVER_ERROR)
                    .body(Collections.singletonMap("errors", "Terjadi sesuatu yang salah!"));
        }
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<Map<String, String>> deleteProyek(@PathVariable Integer id) {
        try {
            if (proyekRepository.existsById(id)) {
                proyekRepository.deleteById(id);
                return ResponseEntity.ok(Collections.singletonMap("data", "Berhasil menghapus data proyek"));
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
