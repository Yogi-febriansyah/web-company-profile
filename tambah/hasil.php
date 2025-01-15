<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrator - Tambah Data</title>
<?php
include('../template/header_admin.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="../controllerTambah/hasil.php" method="POST">
                <div class="mb-3">
                    <label for="penelitian" class="form-label">Hasil Penelitian</label>
                    <input type="text" class="form-control" name="penelitian" id="penelitian">
                </div>
                <div class="mb-3">
                    <label for="dosen" class="form-label">Dosen Ketua</label>
                    <input type="text" class="form-control" name="dosen" id="dosen">
                </div>
                <div class="mb-3">
                    <label for="tahun" class="form-label">Tahun</label>
                    <input type="date" class="form-control" name="tahun" id="tahun">
                </div>
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                <a href="../backend/hasil.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php
include('../template/footer_admin.php');
?>