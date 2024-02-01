<?php
$conn = new mysqli("localhost","root","","db_sks");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
if(isset($_POST['submit'])){
    $Email = $_POST['Email'];
    $password = $_POST['password'];

    $data = mysqli_query($conn, "SELECT * FROM login WHERE Email = '$Email' AND password ='$password'");

    if(mysqli_num_rows($data) > 0){
        echo "login Berhasil";
        header("Location: Home.html");
        exit;
    }else{
        echo "login Gagal";
    }
}
?>
