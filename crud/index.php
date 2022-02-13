<?php
require_once 'config/connect.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include "main/head.php";
    ?>
</head>
<body>
<div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php
    include "main/navbar.php";
    ?>
    <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <?php
        include "main/sidebar.php";
        ?>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Bosh Menu
                    </h3>
                    <?php
if (isset($_SESSION['message'])):
?>
<div class="btn-inverse-<?=$_SESSION['msg_type']?>">
<?
echo $_SESSION['message'];
unset($_SESSION['message']);
?>
</div>
      <?php endif; ?>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                            </li>
                        </ul>
                    </nav>
                </div>
                <?
                date_default_timezone_set('Asia/Tashkent');
                $today = date("d.m.y");
                ?>
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Kitoblar</h4>
                                <h6 class="badge badge-info"> <? echo $today;?> </h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>B/S</th>
                                            <th>Nomi</th>
                                            <th>Kerak</th>
                                            <th>Holati</th>
                                            <th>Tayyor</th>
                                            <th>Taxminiy vaqt</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $products = mysqli_query($connect, "SELECT * FROM `mahsulot`");
                                        $products = mysqli_fetch_all($products);
                                        foreach ($products as $product) {
                                        ?>
                                        <tr>
                                            <td><?= $product[1] ?></td>
                                            <td><?= $product[2] ?></td>
                                            <td><?= $product[3] ?></td>
                                            <td>
                                                <?
                                                if ($product[4] == "Done"){?>
                                                <button class="btn btn-inverse-success"><?= $product[4] ?></button>
                                                <?}elseif ($product[4] == "Progress"){?>
                                                <button class="btn btn-inverse-warning"><?= $product[4] ?></button>
                                                <?}else{?>
                                                <button class="btn btn-inverse-danger"><?= $product[4] ?></button>
                                                <?}?>
                                            </td>
                                            <td><?= $product[5] ?></td>
                                            <td><?= $product[6] ?></td>
                                            <td><a href="update.php?id=<?= $product[0] ?>" class="badge badge-success"><i class="mdi mdi-eyedropper"></i></a></td>
                                            <td><a href="vendor/delete.php?delete=<?= $product[0] ?>" class="badge badge-danger"><i class="mdi mdi-delete"></i></a></td>
                                        </tr>
                                        </tbody>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add new product</h4>
                                <form class="forms-sample" action="vendor/create.php" method="post">
                                    <div class="form-group">
                                        <input type="number" name="bs" class="form-control" id="exampleInputUsername1" placeholder="Bazadagi kitoblar soni">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" id="exampleInputUsername1" placeholder="Kitob nomi">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="kerak" class="form-control" id="exampleInputUsername1" placeholder="Tayyorlash kerak bolgan kitoblar soni">
                                    </div>
                                    <div class="form-group">
                                        <select name="holat" class="form-control">
                                            <option>Done</option>
                                            <option>Progress</option>
                                            <option selected>Rejected</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="tayyor" class="form-control" placeholder="Nechtasi tayyor">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="t_vaqt" class="form-control" placeholder="To'liq tayyor bolishi uchun kerak vaqt">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="save" class="btn btn-success me-2">Add new product</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="container-fluid d-flex justify-content-between">
                    <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © Company Name 2022</span>
                    </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../../assets/js/off-canvas.js"></script>
<script src="../../assets/js/hoverable-collapse.js"></script>
<script src="../../assets/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="../../assets/js/file-upload.js"></script>
<!-- End custom js for this page -->
</body>
</html>