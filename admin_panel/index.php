<?php
include_once "main/db.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<?php
include "main/head.php";
?>
<body>
<div class="container-scroller">
    <?php
    include "main/navbar.php";
    date_default_timezone_set('Tashkent/Asia');
    $today = date('d.m.y');

    ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!--sidebar -->
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
                    <?
                    if (isset($_SESSION['message'])){?>
                        <div class="btn btn-inverse-<? echo $_SESSION['msg_type'];?> font-weight-bold">
                        <?
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                        ?>
                        </div>
                    <?}?>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                <span></span><label class="badge badge-success text-dark font-weight-bold"><? echo $today;  ?> <i class="mdi mdi-calendar icon-sm text-dark align-middle font-weight-bold"></i></label>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="row">
                    <?
                    $sql = query("SELECT * FROM users WHERE ttf = 1");
                    while($fetch=fetch_array($sql)) {
                        $name = $fetch["first_name"];
                        $id = $fetch['id'];
                        $tel = $fetch['phone_number'];
                        ?>
                        <div class="col-md-4  grid-margin">
                            <div class="card bg-light text-dark">
                                <div class="card-body">
                                    <?
                                    echo "<h5> <b class='mdi mdi-account text-dark'></b> " . $name . "</h5>";

                                    if ($tel != Null){?>
                                    <p>
                                    <?
                                        echo "<b class='mdi mdi-phone-classic text-dark'></b> ".$tel;
                                    ?>
                                    </p><hr>

                                    <?}else{?>
                                    <p>
                                    <?
                                        echo "<b class='mdi mdi-phone-classic text-dark'></b> Nomer kiritilmadi";
                                    ?>
                                    </p><hr>
                                    <?
                                    }
                                    $sql1 = query("Select * from dp_korzina where first_name = '{$name}'");

                                    while ($fetch1 = fetch_array($sql1)) {
                                        $pname = $fetch1['product_name'];
                                        $stat = $fetch1['status'];
                                        $pn = $fetch1['product_number'];
                                        $sum += $fetch1['product_price'];
                                        ?>
                                        <ul>
                                            <li><? echo $pname." - <b>".$pn."</b>x"; ?></li>
                                        </ul>
                                    <? }?><hr><?
                                    if (zakas($name) != Null) {
                                        echo "<b class='mdi mdi-buffer text-dark'> " . zakas($name) . "</b> ta kitob<br>";
                                    }else {
                                        echo "<b class='mdi mdi-cart text-dark'></b> Savat bo'sh";
                                    }
                                    if (summ($name) != Null) {
                                        echo "<b class='mdi mdi-cards-outline text-dark'> " . summ($name) . "</b> so'm";
                                    }else {
                                        echo "";
                                    }
                                    ?>
                                    </p>
                                    <h5>
                                        <?
                                        if ($stat == "off"){?>
                                            <a href="vendor/update.php?id=<?= $id ?>"><button type="submit" name="off" class="btn btn-inverse-danger p-md-2"><i class="mdi mdi-plus mdi-18px"></i></button></a>
                                        <?}else{?>
                                            <a href="vendor/update.php?id=<?= $id ?>"><button type="submit" name="on" class="btn btn-inverse-success p-md-2"><i class="mdi mdi-check mdi-18px"></i></button></a>
                                        <?}?>
                                        <a href="vendor/delete.php?id=<?= $id ?>"><button type="submit" name="delete" class="btn btn-inverse-danger p-md-2"><i class="mdi mdi-delete mdi-18px"></i></button></a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    <?}?>
                </div>
            </div>
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="assets/vendors/chart.js/Chart.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="assets/js/dashboard.js"></script>
<script src="assets/js/todolist.js"></script>
<!-- End custom js for this page -->
</body>
</html>
