<?php 
    session_start();

    if($_SESSION['status']!="login"){
        header("location: login.php?info=belum_login");
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
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <div class="title">

                    <a href="index.php" class="navbar-brand">
                        <!-- <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
                        <span class="brand-text font-weight-normal text-primary">Aplikasi Pengaduan Masyarakat</span>
                    </a>
                </div>
                
                
                <ul class="navbar-nav text-center" style="font-size:17px">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="pengaduan.php" class="nav-link">Tulis Pengaduan</a>
                    </li>
                    
                </ul>
                
                <div class="nav-item">
                    <a class="nav-link bg-danger font-weight-bold rounded" href="logout.php">
                    <i class="fas fa-sign-out-alt pr-1"></i>
                        LOGOUT
                    </a>
                </div>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row d-flex justify-content-center align-items-center" style="padding-top:50px;">
                        
                        <!-- /.col-md-12 -->
                        <div class="col-lg-6">
                            <div class="content-1">
                                <h3 class="font-weight-normal">Halo, <?= ucfirst($_SESSION['nama'])?></h3>
                                <h1 class="display-4 font-weight-bold">Aplikasi Pengaduan<br>Masyarakat</h1>
                                <p>Aplikasi pengaduan masyarakat adalah sebuah aplikasi yang dirancang untuk <br> memudahkan masyarakat dalam melaporkan segala jenis keluhan atau <br> pengaduan terkait pelayanan publik, tindak kejahatan, maupun masalah <br> sosial kepada pihak berwenang. </p>
                                <a href="pengaduan.php" class="btn btn-primary rounded py-2 px-3 " style="font-size: 1.1rem;">Tulis Pengaduan</a>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <img src="assets/image/Connected world-amico.svg" alt="" width="450">
                        </div>
                        <!-- /.col-md-12 -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        

        <!-- Main Footer -->
        <footer class="main-footer">
           <!-- To the right -->
           <div class="float-right d-none d-sm-inline">
            Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2023 <span class="text-primary">Ario Bimo M</span>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
    
</body>

</html>