```php
<?php

require_once "config/Database.php";
require_once "classes/Mahasiswa.php";
require_once "classes/Mahasiswa.php";
var_dump(class_exists("Mahasiswa"));
require_once "classes/Jurusan.php";
var_dump(class_exists("Jurusan"));

$database = new Database();
$db = $database->getConnection();

$mahasiswa = new Mahasiswa($db);
$jurusan = new Jurusan($db);

$dataJurusan = $jurusan->getAll();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $kode_jurusan = $_POST["kode_jurusan"];
    $gender = $_POST["gender"];
    $tempat = $_POST["tempat"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $alamat = $_POST["alamat"];
    $email = $_POST["email"];
    $no_hp = $_POST["no_hp"];

    if ($mahasiswa->tambah(
        $nim,
        $nama,
        $kode_jurusan,
        $gender,
        $tempat,
        $tanggal_lahir,
        $alamat,
        $email,
        $no_hp
    )) {
        echo "Data mahasiswa berhasil ditambahkan.";
    } else {
        echo "Data mahasiswa gagal ditambahkan.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Input Mahasiswa</title>
</head>
<body>

<h2>Form Input Mahasiswa</h2>

<form method="POST">

    <label>NIM</label><br>
    <input type="text" name="nim" required>
    <br><br>

    <label>Nama</label><br>
    <input type="text" name="nama" required>
    <br><br>

    <label>Jurusan</label><br>
    <select name="kode_jurusan" required>
        <option value="">-- Pilih Jurusan --</option>

        <?php while ($row = $dataJurusan->fetch_assoc()) { ?>
            <option value="<?= $row['kode_jurusan']; ?>">
                <?= $row['kode_jurusan'] . " - " . $row['nama_jurusan']; ?>
            </option>
        <?php } ?>

    </select>
    <br><br>

    <label>Gender</label><br>

    <input type="radio" name="gender" value="L" required>
    Laki-laki

    <input type="radio" name="gender" value="P">
    Perempuan

    <br><br>

    <label>Tempat Lahir</label><br>
    <input type="text" name="tempat" required>
    <br><br>

    <label>Tanggal Lahir</label><br>
    <input type="date" name="tanggal_lahir" required>
    <br><br>

    <label>Alamat</label><br>
    <textarea name="alamat"></textarea>
    <br><br>

    <label>Email</label><br>
    <input type="email" name="email">
    <br><br>

    <label>No. HP</label><br>
    <input type="text" name="no_hp">
    <br><br>

    <button type="submit">Simpan</button>

</form>

</body>
</html>
```
