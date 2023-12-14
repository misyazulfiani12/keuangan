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
            <h1>DataTableTransaksi</h1>
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
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Transaksi</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="transaksi_proses.php" method="post">
                <div class="card-body">
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
                
              
                <div class="form-group">
                    <label for="exampleInputEmail1">Akun</label>
                    <select class="form-control" name="id_akun" required>
                    <option selected disabled>-- PILIH AKUN --</option>
                    <?php $get_akun = $connect->query("SELECT* FROM akun"); ?>

<?php while($data=mysqli_fetch_assoc($get_akun)) { ?>
      <option value="<?= $data["id_akun"]; ?>"><?= $data["kode_akun"]; ?> - <?= $data["nama_akun"]; ?></option>
      <?php } ?>
                        </select>
                  </div>
                
              
                  <div class="form-group">
                    <label for="exampleInputEmail1">Id User</label>
                    <input type="text" name="id_user" class="form-control" id="id_user" placeholder=" masukkan  id user" required>
                  </div>

                  <div class="form-group">
                    <label for="tanggal-input">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="<?= date("Y-m-d") ?>" id="tanggal-input" >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder=" masukkan  keterangan" required>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah</label>
                    <input type="text" name="jumlah" class="form-control" id="jumlah" placeholder=" masukkan  jumlah" required>
                  </div>
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Posisi</label>
                    <select class="form-control" name="posisi" required>
                    <option selected disabled>-- PILIH POSISI --</option>
                          <option value="Debet">Debet</option>
                          <option value="Kredit">Kredit</option>
                        </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Created At</label>
                    <input type="text" name="created_at" class="form-control" id="created_at" placeholder=" masukkan  created at" required>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Created By</label>
                    <input type="text" name="created_by" class="form-control" id="created_by" placeholder=" masukkan  createdby" required>
                  </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="create" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
             
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
         
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
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
