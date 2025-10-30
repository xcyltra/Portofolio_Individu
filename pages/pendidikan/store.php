<?php
require_once '../../config/db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_institusi = mysqli_real_escape_string($conn, $_POST['nama_institusi']);
    $gelar = mysqli_real_escape_string($conn, $_POST['gelar']);
    $jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);
    $tahun_masuk = $_POST['tahun_masuk'];
    $tahun_lulus = $_POST['tahun_lulus'];
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    
    $query = "INSERT INTO education (nama_institusi, gelar, jurusan, tahun_masuk, tahun_lulus, deskripsi) 
              VALUES ('$nama_institusi', '$gelar', '$jurusan', '$tahun_masuk', '$tahun_lulus', '$deskripsi')";
    
    if(mysqli_query($conn, $query)) {
        header("Location: index.php?success=add");
    } else {
        header("Location: create.php?error=1");
    }
    exit();
}
?>