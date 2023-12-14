<?php 

session_start();
require "config.php"; 

?>

<?php include "head.php"; ?>
<?php include "navbar.php"; ?>
<?php include "sidebar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Transaksi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Transaksi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Transaksi </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              <?php
 if (isset($_SESSION["pesan_berhasil"])) {?>

                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
                  <?php
               
               if (isset($_SESSION["pesan_berhasil"])) {
                echo $_SESSION["pesan_berhasil"];
                unset($_SESSION["pesan_berhasil"]);
               }else{

               }
               
               
               ?>
                </div>

                <?php } ?>

                <?php
 if (isset($_SESSION["pesan_error"])) {?>

                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Gagal!</h5>
                  <?php
               
               if (isset($_SESSION["pesan_error"])) {
                echo $_SESSION["pesan_error"];
                unset($_SESSION["pesan_error"]);
               }else{

               }
               
               
               ?>
                </div>

                <?php } ?>

              <button type="button" class="btn btn-primary" onclick="window.location.href = 'transaksi_tambah.php';"><i class="fa fa-plus"></i> Tambah</button>

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Aksi</th>
                    <th>Akun</th>
                    <th>Id User</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                    <th>Posisi</th>
                    <th>Created At</th>
                    <th>Created By</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $get_transaksi = $connect->query("SELECT* FROM transaksi"); ?>

                    <?php while($data=mysqli_fetch_assoc($get_transaksi)) { ?>
                    <tr>
                    <td>
                    <button type="button" class="btn btn-success" onclick="window.location.href = 'transaksi_edit.php?id_transaksi=<?= $data['id_transaksi']; ?>';"><i class="fas fa-pencil-alt"></i></button>
                    <button type="button" class="btn btn-danger" onclick="window.location.href = 'transaksi_hapus.php?id_transaksi=<?= $data['id_transaksi']; ?>';"><i class="fas fa-trash"></i></button>
  
                  </td>
                      <td>
                      <?php 
                      $id_akun = $data["id_akun"];
                      $get_akun = $connect->query("SELECT* FROM akun WHERE id_akun='$id_akun'"); ?>

<?php while($datax=mysqli_fetch_assoc($get_akun)) { ?>
  <?= $datax["nama_akun"]; ?></td>
<?php } ?> 
                      <td><?= $data["id_user"]; ?></td>
                      <td><?= $data["tanggal"]; ?></td>
                      <td><?= $data["keterangan"]; ?></td>
                      <td><?= $data["jumlah"]; ?></td>
                      <td><?= $data["posisi"]; ?></td>
                      <td><?= $data["created_at"]; ?></td>
                      <td><?= $data["created_by"]; ?></td>
                    </tr>

                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include "footer.php"; ?>
  <?php include "body.php"; ?>
