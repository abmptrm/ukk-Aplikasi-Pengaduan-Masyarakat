<?php
    include '../koneksi/koneksi.php';

    $id_pengaduan = $_GET['id_pengaduan'];

    // hapus gambar
    $result = mysqli_query($koneksi, "SELECT foto FROM pengaduan WHERE id_pengaduan='$id_pengaduan'");
    $file = mysqli_fetch_assoc($result);

    $namaFile = implode(".", $file);
    $lokasi = '../../uploads/' . $namaFile;
    
    if (file_exists($lokasi)) {
        unlink('../../uploads/'.$namaFile);
    }
    
    // Hapus Data
    $cek_tanggapan = mysqli_query($koneksi, "SELECT * FROM tanggapan WHERE id_pengaduan='$id_pengaduan'");

    if ($cek_tanggapan) {
        mysqli_query($koneksi, "DELETE FROM tanggapan WHERE id_pengaduan='$id_pengaduan'");
        mysqli_query($koneksi, "DELETE FROM pengaduan WHERE id_pengaduan='$id_pengaduan'");
    } else {
        mysqli_query($koneksi, "DELETE FROM pengaduan WHERE id_pengaduan='$id_pengaduan'");
    }


    
    echo "<script>document.location.href = '../../pengaduan.php';</script>";

?>