<?php
include 'koneksi.php';

if (isset($_POST['nama_lengkap'])) {
    $namaLengkap = $_POST["nama_lengkap"];
    $tempatLahir = $_POST["tempat_lahir"];
    $tanggalLahir = $_POST["tanggal_lahir"];
    $jenisKelamin = $_POST["jenis_kelamin"];
    $tanggalJoin = $_POST["tanggal_join"];

    $query = "UPDATE anggota SET tempat_lahir='$tempatLahir', tanggal_lahir='$tanggalLahir', jenis_kelamin='$jenisKelamin', tanggal_join='$tanggalJoin' WHERE nama_lengkap='$namaLengkap'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Data berhasil diubah!";
        echo "<a href='laporan_anggota.php'>Kembali</a>";
    } else {
        echo "Data gagal diubah!";
        echo "<a href='edit.php'>Kembali</a>";
    }
}
?>