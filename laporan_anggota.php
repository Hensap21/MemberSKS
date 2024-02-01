<!DOCTYPE html>
<html>

<head>
    <title>Laporan Anggota</title>
    <link rel="stylesheet" type="text/css" href="css/Home.css">
    <script src="js/chart.js"></script>
    <style>
        canvas {
            max-width: 200px;
            margin: 0 auto;
            display: block;
        }

        h4.statistik {
            text-align: center;
            color: #333;
        }

        table {
            max-width: 1300px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 8px;
            border-collapse: collapse;
        }

        h4.laporananggota {
            text-align: center;
            color: #333;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        td a {
            display: inline-block;
            padding: 5px 10px;
            text-decoration: none;
            background-color: #3498db;
            color: #fff;
            border-radius: 3px;
            margin-right: 5px;
        }

        td a.delete {
            background-color: #e74c3c;
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
                <h4 class="statistik">STATISTIK ANGGOTA</h4>
                <canvas id="pieChart" width="50" height="50"></canvas>
                <h4 class="laporananggota">DAFTAR ANGGOTA</h4>
                <table border="1">
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Join</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $conn = new mysqli("localhost", "root", "", "db_sks");

                    if ($conn->connect_error) {
                        die("Koneksi gagal: " . $conn->connect_error);
                    }
                    $sql = "SELECT jenis_kelamin, COUNT(*) as jumlah FROM anggota GROUP BY jenis_kelamin";
                    $result = $conn->query($sql);

                    $data = array();
                    while ($row = $result->fetch_assoc()) {
                        $data[$row['jenis_kelamin']] = $row['jumlah'];
                    }

                    $lakiLaki = isset($data['laki laki']) ? $data['laki laki'] : 0;
                    $perempuan = isset($data['perempuan']) ? $data['perempuan'] : 0;


                    $sql = "SELECT * FROM anggota";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['nama_lengkap'] . "</td>";
                            echo "<td>" . $row['tempat_lahir'] . "</td>";
                            echo "<td>" . $row['tanggal_lahir'] . "</td>";
                            echo "<td>" . $row['jenis_kelamin'] . "</td>";
                            echo "<td>" . $row['tanggal_join'] . "</td>";
                            echo "<td><a href='edit.php?nama_lengkap=" . $row['nama_lengkap'] . "'' class ='edit'>Edit</a> | <a href='delete.php?nama_lengkap=" . $row['nama_lengkap'] . "'' class ='delete'>Delete</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
                    }

                    $conn->close();
                    ?>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var ctx = document.getElementById('pieChart').getContext('2d');
        var data = {
            labels: ['laki laki', 'perempuan'],
            datasets: [{
                data: [<?php echo $lakiLaki; ?>, <?php echo $perempuan; ?>],
                backgroundColor: [
                    '#3498db', // Blue for Laki-laki
                    '#e74c3c' // Red for Perempuan
                ]
            }]
        };
        var pieChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                responsive: true
            }
        });
    </script>


</body>

</html>