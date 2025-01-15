<?php

include('../db/koneksi.php');

if(isset($_POST['simpan'])) {
    $semester = $_POST['semester'];
    $mulai = $_POST['mulai'];
    $sampai = $_POST['sampai'];

    $sql = "INSERT INTO kalender (id, semester, mulai, sampai) VALUES (null, '$semester', '$mulai', $sampai)";

    if ($conn->query($sql) === TRUE) {
        header('location:../backend/kalender.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>