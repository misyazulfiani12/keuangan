<?php
require "config.php";

$id_akun=$_GET["id_akun"];
  $result = $connect->query("SELECT * FROM akun INNER JOIN transaksi USING (id_akun) WHERE id_akun='$id_akun'");
?>
<?php include "head.php"; ?>

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
                <script>
                    window.print()
                </script>