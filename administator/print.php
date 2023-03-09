<?php 
  session_start();

    // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:../login.php?info=login");
  }

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi Pengaduaan Masyarakat</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
  <div class="wrapper">

    <h4 class="text-center py-5 pt-xl-5">Laporan Aplikasi Pengaduan Masyarakat</h4>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 10px">#</th>
          <th style="width: 100px">Foto</th>
          <th>Isi Laporan</th>                        
          <th>Isi Tanggapan</th>
          <th>Tanggal Pengaduan</th>
          <th>Tanggal Tanggapan</th>
          <th>Status</th>
          <th>Nama Petugas</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        include "../php/koneksi/koneksi.php";
        $catatan    =mysqli_query($koneksi, "SELECT * FROM tanggapan INNER JOIN pengaduan ON tanggapan.id_pengaduan = pengaduan.id_pengaduan INNER JOIN petugas ON tanggapan.id_petugas = petugas.id_petugas ");
        while($d = mysqli_fetch_array($catatan)){
          ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td class="text-center">
              <img src="../uploads/<?=$d['foto']?>" width="150">
            </td>
            <td><?=$d['isi_laporan']?></td>
            <td><?=$d['tanggapan']?></td>
            <td class="text-center"><?=$d['tgl_pengaduan']?></td>
            <td class="text-center"><?=$d['tgl_tanggapan']?></td>
            <td class="text-center ">
              <?php if ($d['status'] == '0') { ?>
                  <span class="font-weight-bold text-warning">Menunggu</span>
              <?php } else if ($d['status'] == 'proses') { ?>
                  <span class="font-weight-bold text-primary">Proses</span>
              <?php } else if ($d['status'] == 'tolak') { ?>
                  <span class="font-weight-bold text-danger">Tolak</span>
              <?php } else { ?>
                  <span class="font-weight-bold text-success">Selesai</span>
              <?php } ?>
            </td>
            <td class="text-center"><?=$d['nama_petugas']?><br>(<?= $d['level']?>)</td>
          </tr>
          
          <?php 
        }
        ?>
      </tbody>
      <tfoot>
        <h4>
          <?= date('Y/m/d')?>
        </h4>
          
      </tfoot>
    </table>     


    

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="../assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../assets/dist/js/adminlte.min.js"></script>
  <script>
    
    window.addEventListener("load", function() {
      window.print();

    });
 </script>
</body>
</html>