<?php
	include 'config-konek.php';
	session_start();
	$u = $_GET["id"];

	mysqli_query($db, "DELETE FROM jenis_kelas WHERE id_jenis_kelas ='$u'");
	header("location:../template/with-session.php/?p=jenis_kelas");
?>