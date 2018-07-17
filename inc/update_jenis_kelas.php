<?php
	include 'config-konek.php';
	session_start();
	$u = $_GET["id"];
    $nama_jenis_kelas = mysqli_real_escape_string($db, $_POST["nama_jenis_kelas"]);
    $keterangan = mysqli_real_escape_string($db, $_POST["keterangan"]);
    // $tanggalubahprofil = (int)mysqli_real_escape_string($db, $_POST["tanggal"]);
    // $bulanubahprofil = mysqli_real_escape_string($db, $_POST["bulan"]);
    // $tahunubahprofil = (int)mysqli_real_escape_string($db, $_POST["tahun"]);
    // $jkubahprofil = mysqli_real_escape_string($db, $_POST["jk"]);
    // $hpubahprofil = mysqli_real_escape_string($db, $_POST["hp"]);
    // $alamatubahprofil = mysqli_real_escape_string($db, $_POST["alamat"]);
    // $deskripsiubahprofil = mysqli_real_escape_string($db, $_POST["deskripsi"]);

    $update = mysqli_query($db, "UPDATE jenis_kelas SET nama_jenis_kelas = '$nama_jenis_kelas', keterangan = '$keterangan' WHERE id_jenis_kelas = '$row[id_jenis_kelas]'");    
    
    header("location:../template/with-session.php?p=jenis_kelas");
?>