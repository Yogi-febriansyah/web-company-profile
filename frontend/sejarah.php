<?php
include('../controller/sejarah_control.php');
include('../template/header.php');
?>

<!-- container start -->
<div class="container-fluid m-0">
    <!-- content start -->
    <div class="content">
        <div class="row">
            <div class="col-md-9">
              <h3 class="m-3 text-bold">SEJARAH UNIBA MADURA</h3>
              <hr>
              <?php while($data = mysqli_fetch_array($sejarah)) { ?>
              <p class="mt-3 mb-3"><?= $data['paragraf'] ?></p>
              <?php } ?>
              <?php if(mysqli_num_rows($sejarah) == 0) {
                    echo "<h6 class='justify-content-center'>Belum ada sejarah yang diinputkan saat ini</h6>";
                } ?>
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