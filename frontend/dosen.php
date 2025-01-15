<?php
include('../controller/dosen_control.php');
include('../template/header.php');
?>

<!-- container start -->
<div class="container-fluid m-0">
    <!-- content start -->
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <h3 class="m-3 text-bold">DOSEN</h3>
                <hr>
                <?php if(mysqli_num_rows($result) == 0) { ?>
                    <div class="w-100">
                        <h1 class="d-flex justify-content-center align-items-center">Belum ada data dosen saat ini</h1>
                    </div>
                <?php } else { ?>
                <div class="row row-cols-1 row-cols-md-4 g-3 mb-3 justify-content-center">
                <?php while($data = mysqli_fetch_array($result)) {
                    if ($data['foto']) {
                        $foto = '../image/'.$data['foto'];
                    } else {
                        $foto = '../asset/img/nophoto.jpg';
                    } 
                    ?>
                    <div class="col">
                        <div class="card" style="width: 16rem;">
                            <img src="<?= $foto ?>" class="card-img-top" height="270px" alt="gambar dosen">
                            <div class="card-body">
                                <h6 class="card-title text-center"><?= $data['nama'] ?></h6>
                                <p class="card-text text-center">Dosen <?= $data['dosen'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- content end -->
</div>
<!-- container end -->


<?php
include('../template/footer.php');
?>