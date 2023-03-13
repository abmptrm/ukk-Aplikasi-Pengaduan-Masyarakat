<?php
    
    include '../koneksi/koneksi.php';

    if (isset($_POST['simpan_tanggapan'])) {
        $id_pengaduan = $_POST['id_pengaduan'];
        $tgl_tanggapan = date('Y-m-d');
        $tanggapan = $_POST['isi-tanggapan'];
        $id_petugas = $_POST['id_petugas'];
        $status = $_POST['status'];
        
        $pengaduan = mysqli_query($koneksi, "SELECT * FROM tanggapan WHERE id_pengaduan='$id_pengaduan'");

        $row = mysqli_fetch_assoc($pengaduan);
        

        if ($row['id_pengaduan'] === $id_pengaduan) {
            mysqli_query($koneksi, "UPDATE pengaduan SET status='$status' WHERE id_pengaduan='$id_pengaduan'");
            mysqli_query($koneksi, "UPDATE tanggapan SET tanggapan='$tanggapan' WHERE id_pengaduan = '$id_pengaduan'");
            echo "<script> alert ('Tanggapan Berhasil Tersimpan! '); document.location.href = '../../petugas/data_pengaduan.php';</script>";
        } else {
            mysqli_query($koneksi, "UPDATE pengaduan SET status='$status' WHERE id_pengaduan='$id_pengaduan'");
            mysqli_query($koneksi, "INSERT INTO tanggapan VALUES(NULL, '$id_pengaduan', '$tgl_tanggapan', '$tanggapan', '$id_petugas')");
            echo "<script> alert ('Tanggapan Berhasil Tersimpan! '); document.location.href = '../../petugas/data_pengaduan.php';</script>";
        }
        

    } 
?>
