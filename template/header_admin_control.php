<?php

session_start();


if (!isset($_SESSION['id'])) {

    header("Location:../login.php");
    exit();
}

// Ambil data dari session
$nama = $_SESSION['nama'];
$user_id = $_SESSION['id'];

include('../db/koneksi.php');

$sql = "SELECT * FROM users WHERE id != $user_id";
$result = $conn->query($sql);
if(isset($_GET['action']) && $_GET['action'] == 'ubah') {
    $id = $_GET['id'];
    $status = "aktif";
    $data = mysqli_query($conn, "SELECT * FROM users where id = '$id'");
    if(mysqli_num_rows($data)) {
        $ubah_data = mysqli_query($conn, "UPDATE users SET status = '$status' where id = '$id'");
        if(!$ubah_data) {
            die('Query Error '. mysqli_error($conn));
        } else {
            header('location:user.php');
        }
    }
}
if(isset($_GET['action']) && $_GET['action'] == 'hapus') {
    $id_data = $_GET['id_data'];
    $data = mysqli_query($conn, "SELECT * FROM users where id = '$id_data'");
    if(mysqli_num_rows($data)) {
        $ubah_data = mysqli_query($conn, "DELETE FROM users where id = '$id_data'");
        if(!$ubah_data) {
            die('Query Error '. mysqli_error($conn));
        } else {
            header('location:user.php');
        }
    }
}


?>