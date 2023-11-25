<!DOCTYPE html>
<html>
<head>
    <title>Grafik Data</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style type="text/css">
            .container {
                width: 40%;
                margin: 15px auto;
            }
        </style>
</head>
<body>

<div class="container">
<canvas id="grafikData" width="150" height="100"></canvas>

</div>

<?php
$servername = "localhost";
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "dashboard_iot"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT nama_alat, nilai FROM tampung_data_device";
$result = $conn->query($query);

$data = array();
foreach ($result as $row) {
    $data[] = $row;
}

$conn->close();

// Mengonversi data ke format JSON
$jsonData = json_encode($data);
?>

<script>
    var data = <?php echo $jsonData; ?>;

    var labels = data.map(function(e) {
        return e.nama_alat;
    });
    var nilai = data.map(function(e) {
        return e.nilai;
    });

    var ctx = document.getElementById('grafikData').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line', // Ganti jenis grafik sesuai kebutuhan (bar, line, pie, dll.)
        data: {
            labels: labels,
            datasets: [{
                label: 'Nilai',
                data: nilai,
                backgroundColor: 'rgba(0, 123, 255, 0.5)',
                borderColor: 'rgba(0, 123, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</body>
</html>
