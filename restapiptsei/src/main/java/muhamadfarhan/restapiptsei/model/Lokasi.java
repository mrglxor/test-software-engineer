package muhamadfarhan.restapiptsei.model;

import lombok.Data;
import jakarta.persistence.*;

import java.time.ZoneId;
import java.time.ZonedDateTime;
import java.time.LocalDateTime;

@Entity
@Table(name = "lokasi")
@Data
public class Lokasi {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Integer id;

    private String namaLokasi;
    private String negara;
    private String provinsi;
    private String kota;

    @Column(name = "created_at", updatable = false)
    private LocalDateTime createdAt;

    @PrePersist
    protected void onCreate(){
        ZonedDateTime zonedDateTime = ZonedDateTime.now(ZoneId.of("Asia/Jakarta"));
        this.createdAt = zonedDateTime.toLocalDateTime();
    }
}