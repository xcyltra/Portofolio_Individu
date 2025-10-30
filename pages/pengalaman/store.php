<?php
require_once '../../config/db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $posisi = mysqli_real_escape_string($conn, $_POST['posisi']);
    $nama_perusahaan = mysqli_real_escape_string($conn, $_POST['nama_perusahaan']);
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_selesai = isset($_POST['masih_bekerja']) ? NULL : $_POST['tanggal_selesai'];
    $masih_bekerja = isset($_POST['masih_bekerja']) ? 1 : 0;
    $tanggung_jawab = mysqli_real_escape_string($conn, $_POST['tanggung_jawab']);
    
    if($tanggal_selesai) {
        $query = "INSERT INTO experience (posisi, nama_perusahaan, tanggal_mulai, tanggal_selesai, masih_bekerja, tanggung_jawab) 
                  VALUES ('$posisi', '$nama_perusahaan', '$tanggal_mulai', '$tanggal_selesai', $masih_bekerja, '$tanggung_jawab')";
    } else {
        $query = "INSERT INTO experience (posisi, nama_perusahaan, tanggal_mulai, masih_bekerja, tanggung_jawab) 
                  VALUES ('$posisi', '$nama_perusahaan', '$tanggal_mulai', $masih_bekerja, '$tanggung_jawab')";
    }
    
    if(mysqli_query($conn, $query)) {
        header("Location: index.php?success=add");
    } else {
        header("Location: create.php?error=1");
    }
    exit();
}
?>