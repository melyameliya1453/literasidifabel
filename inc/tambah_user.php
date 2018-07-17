<?php
	include 'config-konek.php';
	session_start();
	$nama_user = $_POST['nama_user'];
    $jk_user = $_POST['jk_user'];
    $user_user = $_POST['user_user'];
    $pass_user = $_POST['pass_user'];
    $tanggal_lahir_user = $_POST['tanggal_lahir_user'];
    $bulan_lahir_user = $_POST['bulan_lahir_user'];
    $tahun_lahir_user = $_POST['tahun_lahir_user'];
    $hp_user = $_POST['hp_user'];
    $bio_user = $_POST['bio_user'];
    $alamat_user = $_POST['alamat_user'];

    mysqli_query($db, "INSERT INTO user (user_user, pass_user, nama_user, jk_user, tanggal_lahir_user, bulan_lahir_user, tahun_lahir_user, bio_user, hp_user, alamat_user) VALUES ('$user_user', '$pass_user', '$nama_user', '$jk_user', '$tanggal_lahir_user', '$bulan_lahir_user', '$tahun_lahir_user', '$bio_user', '$hp_user', '$alamat_user')");
    
    echo "<script type='text/javascript'>";
    echo "alert('Berhasil mendaftar!')";
    echo "</script>";

    header("location:../login");
?>