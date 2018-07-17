<?php
    include "inc/config-konek.php";
    session_start();
    
    include 'base_url.php';

    $querypost = mysqli_query($db, "SELECT * FROM post ORDER BY id_post DESC");
    $query1 = mysqli_query($db, "SELECT * FROM user ORDER BY tanggal_login_user DESC");
    $query_jenis_kelas = mysqli_query($db, "SELECT * FROM jenis_kelas ORDER BY id_jenis_kelas ASC");
    $query_anggota_kelas = mysqli_query($db, "SELECT * FROM anggota_kelas ORDER BY id_anggota ASC");

    mysqli_query($db, "UPDATE user SET status_user='Online' WHERE user_user='$_SESSION[user]'");
    // $query2 = mysqli_query($db, "SELECT*FROM user WHERE user_user='$_SESSION[user]'");
    // $data2 = mysqli_fetch_array($query2);
    
    include 'template/without-session.php'; 
?>