<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dashboard_iot";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql1 =
        "SELECT nilai FROM tampung_data_device WHERE nama_alat='sensor_jarak1' 
      ORDER BY id DESC LIMIT 1";

    $result = $conn->query($sql1);
    $nilai1 = 0;

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nilai1 = $row['nilai'];
    }
    $conn->close();
    ?>
