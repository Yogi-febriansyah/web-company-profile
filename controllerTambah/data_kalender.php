<?php

include('../db/koneksi.php');

if(isset($_POST['simpan'])) {
    $event_description = $_POST['event_description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $sql = "INSERT INTO events (id, event_description, start_date, end_date) 
    VALUES (null, '$event_description', '$start_date', '$end_date')";

    if ($conn->query($sql) === TRUE) {
        header('location:../backend/data_kalender.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>