<?php
include('../controller/pedoman_control.php');
include('../template/header.php');
?>

<!-- container start -->
<div class="container-fluid m-0">
    <!-- content start -->
    <div class="content">
        <div class="row">
            <div class="col-md-9">
                <h3 class="m-3 text-bold">PEDOMAN AKADEMIK</h3>
                <hr>
                <?php if($data == 0) { ?>
                    <div class="w-100">
                        <h1 class="d-flex justify-content-center align-items-center">Belum ada data yang dimasukkan saat ini</h1>
                    </div>
                <?php } ?>
                <div class="mb-3">
                    <embed src="../file/<?= $data['file'] ?>" width="100%" height="500">
                </div>
            </div>
            <div class="col-md-3 mb-2">
                <h3 class="m-3 text-bold">INFORMASI</h3>
                <hr>
                    <table>
                        <?php while($query = mysqli_fetch_array($result2)) {
                        ?>
                            <tr>
                                <td>
                                    <img src="../asset/img/logo.png" alt="Logo" width="50" height="50" class="d-inline-block align-text-top ms-1 mx-2">
                                </td>
                                <td>
                                    <p><a href="detail_informasi.php?id=<?= $query['id'] ?>" class="paraf"><?= $query['judul'] ?></a></p>
                                </td>
                            </tr>
                        <?php } 
                        if(mysqli_num_rows($result2) == 0) { }
                        ?>
                    </table>
            </div>
        </div>
    </div>
    <!-- content end -->
</div>
<!-- container end -->


<?php
include('../template/footer.php');
?>