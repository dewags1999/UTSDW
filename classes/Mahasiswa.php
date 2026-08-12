<?php

class Mahasiswa
{
    private $conn;
    private $table = "mahasiswa";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $query = "SELECT * FROM mahasiswa";
        return $this->conn->query($query);
    }

    public function tambah(
        $nim,
        $nama,
        $kode_jurusan,
        $gender,
        $tempat,
        $tanggal_lahir,
        $alamat,
        $email,
        $no_hp
    ) {
        $query = "INSERT INTO mahasiswa
            (nim, nama, kode_jurusan, gender, tempat, tanggal_lahir, alamat, email, no_hp)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);

        $stmt->bind_param(
            "sssssssss",
            $nim,
            $nama,
            $kode_jurusan,
            $gender,
            $tempat,
            $tanggal_lahir,
            $alamat,
            $email,
            $no_hp
        );

        return $stmt->execute();
    }

    public function hapus($nim)
    {
        $query = "DELETE FROM mahasiswa WHERE nim = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $nim);

        return $stmt->execute();
    }
}