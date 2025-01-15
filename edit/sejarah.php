<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrator - Ubah Data</title>
<?php
include('../db/koneksi.php');
$id = $_GET['iya'];
$result = mysqli_query($conn, "SELECT * FROM sejarah WHERE id = '$id'");
$data = mysqli_fetch_array($result);
include('../template/header_admin.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Data</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="../controllerEdit/sejarah.php" method="POST">
                <div class="mb-3" style="display: none;">
                    <label for="id" class="form-label">Entitas Data</label>
                    <input type="text" class="form-control" value="<?= $data['id'] ?>" name="entitas" id="id">
                </div>
                <div class="mb-3">
                    <label for="paragraf" class="form-label">Paragraf</label>
                    <textarea type="text" class="form-control" name="paragraf" id="paragraf"><?= $data['paragraf'] ?></textarea>
                </div>
                <button type="submit" name="ubah" class="btn btn-warning">Ubah</button>
                <a href="../backend/sejarah.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php
include('../template/footer_admin.php');
?>