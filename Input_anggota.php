<?php
$conn = new mysqli("localhost","root","","db_sks");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaLengkap = $_POST["nama_lengkap"];
    $tempatLahir = $_POST["tempat_lahir"];
    $tanggalLahir = $_POST["tanggal_lahir"];
    $jenisKelamin = $_POST["jenis_kelamin"];
    $tanggalJoin = $_POST["tanggal_join"];

    $sql = "INSERT INTO anggota (nama_lengkap, tempat_lahir, tanggal_lahir, jenis_kelamin, tanggal_join) 
            VALUES ('$namaLengkap', '$tempatLahir', '$tanggalLahir', '$jenisKelamin', '$tanggalJoin')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan.";
        echo "<a href='Input_anggota.html'>Kembali</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
