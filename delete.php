<?php
    include ('koneksi.php');
    $namaLengkap = $_GET['nama_lengkap'];
    $stmt = $conn->prepare("DELETE FROM anggota WHERE nama_lengkap=?");
    $stmt->bind_param("s", $namaLengkap);
    
    if($stmt->execute()){
        echo "Data berhasil dihapus";
    } else {
        echo "Data gagal dihapus";
    }
    
    header("Location:laporan_anggota.php");    
?>