<?php
    session_start();

    include "../php/koneksi/koneksi.php";

    // cek apakah yang mengakses halaman ini sudah login
    if($_SESSION['level']==""){
        header("location:../login-p.php?info=login");
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Pengaduan Masyarakat</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <div class="title">

                    <a href="index.php" class="navbar-brand">
                        <!-- <img src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
                        <span class="brand-text font-weight-normal text-primary">Aplikasi Pengaduan Masyarakat</span>
                    </a>
                </div>


                <ul class="navbar-nav text-center" style="font-size:17px">
                    <li class="nav-item">
                        <a href="beranda.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="data_pengaduan.php" class="nav-link">Data Pengaduan</a>
                    </li>
                    <li class="nav-item">
                        <a href="data_tanggapan.php" class="nav-link">Data Tanggapan</a>
                    </li>

                    <li class="nav-item">
                        <a href="laporan.php " class="nav-link active">Generata Laporan</a>
                    </li>

                </ul>

                <div class="nav-item">
                    <a class="nav-link bg-danger font-weight-bold rounded" href="../logout.php">
                    <i class="fas fa-sign-out-alt pr-1"></i>
                        LOGOUT
                    </a>
                </div>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Aplikasi Pengaduan Masyarakat</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">

                        <!-- /.col-md-12 -->
                        <div class="col-lg-12">

                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h5 class=" m-0" style="font-size:30px">Data Tanggapan</h5>
                                    </div>
                                    <div class="card-tools">
                                        <a class="nav-link bg-primary font-weight-bold rounded" href="print.php">
                                            <i class="fas fa-print"></i>
                                            PRINT LAPORAN
                                        </a>

                                       


                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th style="width: 120px">Foto</th>
                                                <th>Isi Pengaduan</th>
                                                <th>Isi Tanggapan</th>
                                                <th style="width: 100px">Tanggal Pengaduan</th>
                                                <th style="width: 100px">Tanggal Tanggapan</th>
                                                <th>Status</th>
                                                <th style="width: 100px">Nama Petugas</th>
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
                                                    <span class="badge bg-warning">Menunggu</span>
                                                <?php } else if ($d['status'] == 'proses') { ?>
                                                    <span class="badge bg-primary">Proses</span>
                                                <?php } else if ($d['status'] == 'tolak') { ?>
                                                    <span class="badge bg-danger">Tolak</span>
                                                <?php } else { ?>
                                                    <span class="badge bg-success">Selesai</span>
                                                <?php } ?>
                                                </td>
                                                <td class="text-center"><?=$d['nama_petugas']?><br>(<?= $d['level']?>)</td>
                                            </tr>
                                            
                                            <?php 
                                            }
                                            ?>


                                            

                                            
                                        </tbody>
                                    </table>

                                </div>
                                <div class="card-footer">
                                    
                                </div>
                            </div>
                            <!-- card------ -->

      
                            <!-- MODAL VIEW IMAGE -->
                            
                            <?php
                                include '../php/koneksi/koneksi.php';

                                $query = "SELECT * FROM pengaduan";

                                $result = mysqli_query($koneksi, $query);

                                // Lakukan perulangan untuk membaca setiap baris hasil query
                                while ($row = mysqli_fetch_assoc($result)) {   
                            ?>

                            <div class="modal fade" id="modalviewimage<?= $row['id_pengaduan'] ?>" aria-hidden="true">
                                
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Foto Pengaduan</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <img src="../uploads/<?= $row['foto'] ?>" style="border:#007BFF solid 3px; border-radius:15px; width:100%;">
                                            </div><hr>
                                            <div class="card-body">
                                            <div class="text-left">
                                                <ul>
                                                    <li><b>Tanggal Pengaduan :</b> <?= $row['tgl_pengaduan']?></li>
                                                    <li><b>Isi Pengaduan : </b> <?= $row['isi_laporan']?></li>
                                                    <li><b>Status Pengaduan : </b> 
                                                        <?php if ($row['status'] == '0') { ?>
                                                        <span class="badge bg-warning">Menunggu</span>
                                                        <?php } else if ($row['status'] == 'proses') { ?>
                                                            <span class="badge bg-primary">Di Proses</span>
                                                        <?php } else if ($row['status'] == 'tolak') { ?>
                                                            <span class="badge bg-danger">Di Tolak</span>
                                                        <?php } else { ?>
                                                            <span class="badge bg-success">Selesai</span>
                                                        <?php } ?>
                                                    </li>
                                                    


                                                </ul>
                                                
                                            </div>
                                        </div>                                
                                    </div>
                                        <div class="modal-footer justify-content-between"> 
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <?php } ?>

                           
                        

                            

                        </div>
                        <!-- /.col-md-12 -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/adminlte.min.js"></script>

    <!-- Show Filename In Input File Image -->
    <script src="js/showFilename.js"></script>



    <!-- AdminLTE for demo purposes -->
    <!-- <script src="../assets/dist/js/demo.js"></script> -->

    
</body>

</html>