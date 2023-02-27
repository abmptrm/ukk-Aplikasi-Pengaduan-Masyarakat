<?php
    
    include "../koneksi/koneksi.php";

    session_start();

    if (isset($_POST['simpan-pengaduan'])){

        $isi_laporan = $_POST['isi-laporan'];
        $nik = $_POST['nik'];
        $tgl_pengaduan = date('Y-m-d');

        $rand = rand();
        $extension = array('png', 'jpg', 'jpeg');
        $filename = $_FILES['foto']['name'];
        $size = $_FILES['foto']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if (!in_array($ext, $extension)){
            echo "<script> alert ('Ekstensi File Harus Berupa JPG, JPEG, Dan PNG! '); document.location.href = '../../pengaduan.php?pesan=extension';</script>";

        } else {
            if ($size < 1044070){
                $img = $rand.'_'.$filename;
                $move = '../../uploads/'.$img;
                move_uploaded_file($_FILES['foto']['tmp_name'], $move);
                mysqli_query($koneksi, "INSERT INTO pengaduan VALUES('', '$tgl_pengaduan', '$nik', '$isi_laporan', '$img', '0')");
                echo "<script> alert ('Data Berhasil Tersimpan! '); document.location.href = '../../pengaduan.php';</script>";

            }else {
                echo "<script> alert ('File Maksimal 2mb! '); document.location.href = '../../pengaduan.php?pesan=gagal';</script>";
            }

        }

    }

?>