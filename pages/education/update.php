<?php
require_once '../../config/db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama_institusi = mysqli_real_escape_string($conn, $_POST['nama_institusi']);
    $gelar = mysqli_real_escape_string($conn, $_POST['gelar']);
    $jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);
    $tahun_masuk = $_POST['tahun_masuk'];
    $tahun_lulus = $_POST['tahun_lulus'];
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    
    $query = "UPDATE education SET 
              nama_institusi = '$nama_institusi',
              gelar = '$gelar',
              jurusan = '$jurusan',
              tahun_masuk = '$tahun_masuk',
              tahun_lulus = '$tahun_lulus',
              deskripsi = '$deskripsi'
              WHERE id = $id";
    
    if(mysqli_query($conn, $query)) {
        header("Location: index.php?success=edit");
    } else {
        header("Location: edit.php?id=$id&error=1");
    }
    exit();
}
?>