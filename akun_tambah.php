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
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Akun</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="akun_proses.php" method="post">
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
                    <label for="exampleInputEmail1">Kode Akun</label>
                    <input type="teks" name="kode_akun" class="form-control" id="kode_akun" placeholder="masukkan kode akun" required>
                  </div>
                
              
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Akun</label>
                    <input type="teks" name="nama_akun" class="form-control" id="nama_akun" placeholder=" masukkan nama akun" required>
                  </div>
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">normal</label>
                    <select class="form-control" name="normal" required>
                    <option selected disabled>-- PILIH normal --</option>
                          <option value="Debet">Debet</option>
                          <option value="Kredit">Kredit</option>
                        </select>
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
