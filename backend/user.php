<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrator - Kontak</title>
<?php

include('../template/header_admin.php');

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kontak</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th  scope="col">No</th>
                        <th  scope="col">Nama</th>
                        <th  scope="col">Username</th>
                        <th  scope="col">Email</th>
                        <th  scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while($u = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <th class="m-1" scope="row"><?= $no++ ?></th>
                        <td class="m-1" ><?= $u['nama'] ?></td>
                        <td class="m-1" ><?= $u['username'] ?></td>
                        <td class="m-1"><?= $u['email'] ?></td>
                        <td>
                            <?php if($u['status'] == 'tidak') { ?>
                            <a href="user.php?action=ubah&id=<?= $u['id'] ?>" type="button" class="btn btn-success m-1">
                                <i class="fas fa-fw fa-check"></i>
                            </a>
                            <?php } ?>
                            <a href="user.php?action=hapus&id_data=<?= $u['id'] ?>" class="btn btn-danger m-1" type="button">
                                <i class="fas fa-fw fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } 
                    if(mysqli_num_rows($result) == 0) {
                        echo "<tr><td colspan='5' align='center'><b>Belum ada user yang mendaftar</b></td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php
include('../template/footer_admin.php');
?>