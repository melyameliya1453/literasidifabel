<?php
	include 'config-konek.php';
	session_start();
	$u = $_GET["id"];

	mysqli_query($db, "DELETE FROM anggota_kelas WHERE id_anggota ='$u'");
	header("location:../template/with-session.php/?p=anggota_kelas");
?>