<?php
	include 'config-konek.php';
	session_start();
	$nama_jenis_kelas = $_POST['nama_jenis_kelas'];
  	$keterangan = $_POST['keterangan'];

	mysqli_query($db, "INSERT INTO jenis_kelas VALUES ('', '$nama_jenis_kelas', '$keterangan')");
	header("location:../template/with-session.php/?p=jenis_kelas");
?>