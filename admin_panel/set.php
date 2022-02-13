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
    ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!--sidebar -->
        <?php
        include "main/sidebar.php";
        session_start();
        ?>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white me-2">
      <i class="mdi mdi-home"></i>
    </span> Foydalanuvchilar
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
                                <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Users</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Ism</th>
                                            <th>Telefon</th>
                                            <th>User_id</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?
                                        $sorov = query("Select * from users");
                                        while ($user = fetch_array($sorov)){
                                            $id = $user['id'];
                                            ?>
                                            <tr>
                                                <td><? echo $user['id']; ?></td>
                                                <td><? echo $user['first_name']; ?></td>
                                                <td><? echo $user['phone_number']; ?></td>
                                                <td><? echo $user['user_id']; ?></td>
                                                <td>
                                                    <a href="vendor/edit.php?id=<?= $id ?>"><button type="submit" name="edit" class="btn btn-inverse-warning p-md-2"><i class="mdi mdi-pencil mdi-18px"></i></button></a>
                                                    <a href="vendor/delet.php?id=<?= $id ?>"><button type="submit" name="delete" class="btn btn-inverse-danger p-md-2"><i class="mdi mdi-delete mdi-18px"></i></button></a>
                                                </td>
                                            </tr>
                                        <? }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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
