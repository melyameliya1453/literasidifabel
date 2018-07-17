<?php
	include 'config-konek.php';
	session_start();
	$nama_anggota = $_POST['nama_anggota'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$bulan_lahir = $_POST['bulan_lahir'];
	$tahun_lahir = $_POST['tahun_lahir'];
	$jk = $_POST['jk'];
	$alamat = $_POST['alamat'];
  	$nama_kelas = $_POST['nama_kelas'];

	mysqli_query($db, "INSERT INTO anggota_kelas VALUES ('', '$nama_anggota', '$tgl_lahir', '$bulan_lahir', '$tahun_lahir', '$jk', '$alamat', '$nama_kelas')");
	
	header("location:../template/with-session.php/?p=anggota_kelas");
?>