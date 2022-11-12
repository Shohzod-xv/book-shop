<?php

    require_once 'config/connect.php';
    $product_id = $_GET['id'];
    $product = mysqli_query($connect, "SELECT * FROM `mahsulot` WHERE `id` = '$product_id'");
    $product = mysqli_fetch_assoc($product);
?>
<!DOCTYPE html>
<html lang="en">
<?
include "main/head.php";
?>
<body>
<div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <? include "main/navbar.php"; ?>
    <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <? include "main/sidebar.php"; ?>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title"> Product Updates </h3>
                </div>
                <?
                date_default_timezone_set('Asia/Tashkent');
                $today = date("d.m.y");
                ?>
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Malumotlarni o'zgartirish</h4>
                                <h6 class="badge badge-info"> <? echo $today;?> </h6>
                                <form class="forms-sample" action="vendor/update.php" method="post">
                                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                    <div class="form-group row">
                                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">B/S</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="bs" class="form-control" value="<?= $product['bs'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Nomi</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" value="<?= $product['nomi'] ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Kerak</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="kerak" value="<?= $product['kerak'] ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Holati</label><select name="holat" class="form-control">
                                        <?
                                        if ($product['holati'] == "Done") {?>
                                            <option selected>Done</option>
                                            <option>Progress</option>
                                            <option>Rejected</option>
                                        <?}elseif ($product['holati'] == "Progress"){?>
                                            <option>Done</option>
                                            <option selected>Progress</option>
                                            <option>Rejected</option>
                                        <?}else{?>
                                            <option>Done</option>
                                            <option>Progress</option>
                                            <option selected>Rejected</option>
                                        <?}?>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Tayyor</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="tayyor" value="<?= $product['tayyor'] ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Vaqti</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="t_vaqt" value="<?= $product['t_vaqt'] ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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