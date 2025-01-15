<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrator - Kalender Akademik</title>
<?php
include('../controllerBackend/kalender.php');
include('../template/header_admin.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kalender Akademik</h1>
    </div>
    <?php if(mysqli_num_rows($result) == 0) { ?>
    <a href="../tambah/kalender.php" class="btn btn-info mb-3"><i class="fas fa-fw fa-plus"></i> Tambah</a>
    <?php } ?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table" width="100%">
                <thead>
                    <tr>
                        <th width="7%" scope="col">Semester</th>
                        <th width="39%" scope="col">Tahun Ajaran</th>
                        <th width="15%" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($p = $result->fetch_assoc()) { ?>
                    <tr>
                        <td class="m-1"><?= $p['semester']  ?></td>
                        <td class="m-1" ><?= $p['mulai']  ?> - <?= $p['sampai']  ?></td>
                        <td>
                            <a href="../backend/data_kalender.php" type="button" class="btn btn-warning m-1">
                                <i class="fas fa-fw fa-gear"></i>
                            </a>
                            <a href="kalender.php?action=hapus&id=<?= $p['id'] ?>" class="btn btn-danger m-1" type="button">
                                <i class="fas fa-fw fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                <?php }
                if(mysqli_num_rows($result) == 0) {
                    echo "<tr><td colspan='3' align='center'><b>Belum ada kalender yang dibuat</b></td></tr>";
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