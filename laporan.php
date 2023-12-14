<?php 

error_reporting(1);
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
            <h1>Laporan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> Laporan</li>
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
                <h3 class="card-title"> Laporan </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
<form action="" method="post">
              <div class="row">
          <div class="col-8">
              <div class="form-group">
                    <select class="form-control" name="id_akun" required>
                    <option selected disabled>-- PILIH AKUN --</option>
                    <?php $get_akun = $connect->query("SELECT* FROM akun"); ?>

<?php while($data=mysqli_fetch_assoc($get_akun)) { ?>
      <option value="<?= $data["id_akun"]; ?>"><?= $data["kode_akun"]; ?> - <?= $data["nama_akun"]; ?></option>
      <?php } ?>
                        </select>
                  </div>
                  
</div>
<div class="col-4">
                  <button type="submit" class="btn btn-primary">cari</button>
</div>
</div>
    
</form>
<?php
$id_akun = $_POST['id_akun'];

if ($id_akun) {
  $result = $connect->query("SELECT * FROM akun INNER JOIN transaksi USING (id_akun) WHERE id_akun='$id_akun'");
?>
<button type="button" class="btn btn-primary" onclick="window.open('print_laporan.php?id_akun=<?php echo $id_akun;?>)','_blank');"><i class="fa fa-print"></i>Print</button>
<table class="table table-hover text-nowrap">
                  <thead>
                    <tr>                 
                      <th>tanggal</th>
                      <th>keterangan</th>
                      <th>debit</th>
                      <th>kredit</th>
                      <th>saldo</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $no = 1;
                  $saldo=0; 
                  ?>
                  <?php while($datax=mysqli_fetch_assoc($result)) { ?>
                    <tr>                     
                      <td><?= $datax['tanggal']; ?></td>
                      <td><?= $datax['keterangan']; ?></td>
                      <td>
                        <?php 
                        if ($no==1){
                          echo '-';
                        }else{
                          if ($datax['posisi'] == 'Debet'){

                          echo $datax['jumlah'];
                        }else{
                          echo '-';
                        }
                      }
                        
                        
                        ?>
                      </td>
                      <td>
                      <?php 
                        
                        if ($no==1){
                          echo '-';
                        }else{
                          if ($datax['posisi'] == 'Kredit'){

                          echo $datax['jumlah'];
                        }else{
                          echo '-';
                        }
                      }
                        
                        ?>
                      </td>
                      <td>
                      <?php 
                        
                        if ($no==1){
                          if ($datax['posisi'] == $datax['normal']){
                            $saldo = $saldo + $datax['jumlah'];

                            echo $saldo;
                          } else {
                            $saldo = $saldo - $datax['jumlah'];

                            echo $saldo;
                          }

                          
                        }else{
                          if ($datax['posisi'] == $datax['normal']){
                            $saldo = $saldo + $datax['jumlah'];

                            echo $saldo;
                          } else {
                            $saldo = $saldo - $datax['jumlah'];

                            echo $saldo;
                          }
                      }
                        
                        ?>
                      </td>
                    </tr>
                    <?php $no++;} ?>
                  </tbody>
                </table>

<?php } else { ?>
<?php } ?>

              
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
