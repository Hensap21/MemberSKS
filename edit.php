<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Anggota</title>
    <link rel="stylesheet" type="text/css" href="css/Home.css">
    <style>
        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 8px;
        }

        h4.inputanggota {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin: 5px 0 5px;
            color: #333;
        }

        input[type="text"],
        input[type="date"],
        input[type="radio"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
            align-items: center;
        }

        input[type="radio"] {
            margin-left: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div id="template">
        <div id="menu">
            <nav>
                <p>Hallo, Friends!</p>
            </nav>
        </div>
        <div id="content">
            <div id="left-content">
                <h4 class="anggota">ANGGOTA</h4>
                <p class="input-anggota"><a href="Input_anggota.html">INPUT ANGGOTA</a></p>
                <h4 class="laporan">LAPORAN</h4>
                <p class="laporan-anggota"><a href="laporan_anggota.php">LAPORAN ANGGOTA</a></p>
            </div>
            <div id="right-content">
                <h4 class="inputanggota">EDIT ANGGOTA</h4>
                <?php
                $namaLengkap = $_GET['nama_lengkap'];

                $query = "SELECT * FROM anggota WHERE nama_lengkap='$namaLengkap'";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                } else {
                    echo "Data tidak ditemukan.";
                    exit;
                }
                ?>
                <form method="post" action="EDT.php?nama_lengkap=<?php echo $row['nama_lengkap']; ?>">
                    <label for="nama_lengkap">Nama Lengkap:</label>
                    <input type="text" name="nama_lengkap" value="<?php echo $row['nama_lengkap']; ?>" required>

                    <label for="tempat_lahir">Tempat Tanggal Lahir:</label>
                    <input type="text" name="tempat_lahir" value="<?php echo $row['tempat_lahir']; ?>" required>
                    <input type="date" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>" required>

                    <label>Jenis Kelamin:</label>
                    <input type="radio" name="jenis_kelamin" value="<?php echo $row['jenis_kelamin']; ?>" required>
                    <label for="laki laki">laki laki</label>
                    <input type="radio" name="jenis_kelamin" value="<?php echo $row['jenis_kelamin']; ?>" required>
                    <label for="perempuan">perempuan</label>

                    <label for="tanggal_join">Tanggal Join:</label>
                    <input type="date" name="tanggal_join" value="<?php echo $row['tanggal_join']; ?>" required>

                    <input type="submit" name="Update" value="Update">
                </form>
            </div>
        </div>
    </div>
</body>

</html>