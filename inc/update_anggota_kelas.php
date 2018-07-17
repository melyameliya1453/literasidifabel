<?php
	include 'config-konek.php';

	$id = $_GET["id"];
  	$nama_anggota = $_POST['nama_anggota'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$bulan_lahir = $_POST['bulan_lahir'];
	$tahun_lahir = $_POST['tahun_lahir'];
	$jk = $_POST['jk'];
	$alamat = $_POST['alamat'];
  	$nama_kelas = $_POST['nama_kelas'];

	mysqli_query($db, "UPDATE anggota_kelas SET nama_anggota = '$nama_anggota', tgl_lahir = '$tgl_lahir', bulan_lahir = '$bulan_lahir', tahun_lahir = '$tahun_lahir', jk = '$jk', alamat = '$alamat', nama_kelas = '$nama_kelas' WHERE id_anggota = '$id'");
	
	header("location:../template/with-session.php?p=anggota_kelas");
?>