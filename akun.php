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
            <h1>Akun</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Akun</li>
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
                <h3 class="card-title">Akun</h3>
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

              <button type="button" class="btn btn-primary" onclick="window.location.href = 'akun_tambah.php';"><i class="fa fa-plus"></i> Tambah</button>

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Aksi</th>
                    <th>Kode Akun</th>
                    <th>Nama Akun</th>
                    <th>normal</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $get_akun = $connect->query("SELECT* FROM akun"); ?>

                    <?php while($data=mysqli_fetch_assoc($get_akun)) { ?>
                    <tr>
                    <td>
                    <button type="button" class="btn btn-success" onclick="window.location.href = 'akun_edit.php?id_akun=<?= $data['id_akun']; ?>';"><i class="fas fa-pencil-alt"></i></button>
                    <button type="button" class="btn btn-danger" onclick="window.location.href = 'akun_hapus.php?id_akun=<?= $data['id_akun']; ?>';"><i class="fas fa-trash"></i></button>
  
                  </td>
                      <td><?= $data["kode_akun"]; ?></td>
                      <td><?= $data["nama_akun"]; ?></td>
                      <td><?= $data["normal"]; ?></td>
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
