<?php
require_once '../../config/db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $posisi = mysqli_real_escape_string($conn, $_POST['posisi']);
    $nama_perusahaan = mysqli_real_escape_string($conn, $_POST['nama_perusahaan']);
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_selesai = isset($_POST['masih_bekerja']) ? NULL : $_POST['tanggal_selesai'];
    $masih_bekerja = isset($_POST['masih_bekerja']) ? 1 : 0;
    $tanggung_jawab = mysqli_real_escape_string($conn, $_POST['tanggung_jawab']);
    
    if($tanggal_selesai) {
        $query = "UPDATE experience SET 
                  posisi = '$posisi',
                  nama_perusahaan = '$nama_perusahaan',
                  tanggal_mulai = '$tanggal_mulai',
                  tanggal_selesai = '$tanggal_selesai',
                  masih_bekerja = $masih_bekerja,
                  tanggung_jawab = '$tanggung_jawab'
                  WHERE id = $id";
    } else {
        $query = "UPDATE experience SET 
                  posisi = '$posisi',
                  nama_perusahaan = '$nama_perusahaan',
                  tanggal_mulai = '$tanggal_mulai',
                  tanggal_selesai = NULL,
                  masih_bekerja = $masih_bekerja,
                  tanggung_jawab = '$tanggung_jawab'
                  WHERE id = $id";
    }
    
    if(mysqli_query($conn, $query)) {
        header("Location: index.php?success=edit");
    } else {
        header("Location: edit.php?id=$id&error=1");
    }
    exit();
}
?>