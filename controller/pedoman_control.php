<?php

include('../db/koneksi.php');

$judul = "SELECT * FROM pedoman";
$pedoman = $conn->query($judul);
$data = mysqli_fetch_array($pedoman);

$sql2 = "SELECT * FROM informasi ORDER BY id  DESC LIMIT 5";
$result2 = $conn->query($sql2);

$conn->close();
?>