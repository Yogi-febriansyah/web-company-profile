<?php

include('../db/koneksi.php');

$sql = "SELECT * FROM pedoman";
$result = $conn->query($sql);
if(isset($_GET['action']) && $_GET['action'] == 'hapus') {
    $id = $_GET['id'];
    $data = mysqli_query($conn, "SELECT * FROM pedoman where id = '$id'");
    $query = mysqli_fetch_array($data);
    if(mysqli_num_rows($data)) {
        $gambar = $query['foto'];
        $hapus = unlink('../file/'.$gambar);
        $hapus_data = mysqli_query($conn, "DELETE FROM pedoman where id = '$id'");
        if(!$hapus_data && !$hapus) {
            die('Query Error '. mysqli_error($conn));
        } else {
            header('location:pedoman.php');
        }
    }
}
?>