<?php
	include 'config-konek.php';
	session_start();
	$u = $_GET["user"];
	
	mysqli_query($db, "DELETE FROM user WHERE user_user='$u'");
	// mysqli_query($db, "DELETE FROM lihat WHERE user_lihat='$u'");
	header("location:../template/with-session.php/?p=daftar_pengguna");
?>