<?php include "head.php"; ?>
<?php include "navbar.php"; ?>
<?php include "sidebar.php"; ?>

<?php
require "config.php";

error_reporting(1);
session_start();

if ($_SESSION['status_login'] != TRUE) {
  header("location:index.php");
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">pencatatan keuangan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container-fluid">


        <!-- Small boxes (Stat box) -->
        <div class="row">
        <?php $get_akun = $connect->query("SELECT COUNT(id_akun) AS id_akunx FROM akun"); ?>
<?php while($data=mysqli_fetch_assoc($get_akun)) { ?>     
  <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h4>
                  Jumlah Akun
                </h4>

                <h2><?= $data["id_akunx"]; ?></h2>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
                <a href="akun.php" class="nav-link">
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>

          </div>
          <!-- ./col -->
          <?php } ?>


          <?php $get_transaksi = $connect->query("SELECT COUNT(id_transaksi) AS id_transaksix FROM transaksi"); ?>
<?php while($data=mysqli_fetch_assoc($get_transaksi)) { ?>     
  <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h4>
                  Jumlah Transaksi
                </h4>

                <h2><?= $data["id_transaksix"]; ?></h2>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
                <a href="transaksi.php" class="nav-link">
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>

          </div>
          <!-- ./col -->
          <?php } ?>

      </div>
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <?php include "footer.php"; ?>
  <?php include "body.php"; ?>
