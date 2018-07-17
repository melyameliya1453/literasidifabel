<?php 
    include '../base_url.php'; 
    include '../inc/config_dashboard.php'; 
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php include 'kerangka/head_dashboard.php'; ?>
    <body>
        <div id="wrapper">

            <?php 
                include 'kerangka/nav_dashboard.php';
                include 'kerangka/sidebar.php'; 
            ?>

            <div id="page-wrapper">
                <?php
                    $user = @$_GET["user"];
                    $p = @$_GET["p"];

                    if ($user) {
                        include '../inc/user.php';
                    }
                    else if (empty($p)) {
                        include '../inc/dashboard.php';
                    }
                    else if ($p == 'beranda') {
                        include '../inc/dashboard.php';
                    }
                    else if ($p == 'post') {
                        include '../inc/read.php';
                    }
                    else if ($p == 'daftar_pengguna') {
                        include '../inc/member.php';
                    }
                    else if ($p == 'edit') {
                        include '../inc/edit-user.php';
                    }
                    else if ($p == 'komentar') {
                        include "../inc/komentar-kamu.php";
                    }
                    else if ($p == 'posting') {
                        include '../inc/newpost.php';
                    }
                    else if ($p == 'galeri') {
                        include '../inc/galeri.php';
                    }
                    else if ($p == 'jempol') {
                        include '../inc/jempol.php';
                    }
                    else if ($p == 'diskusi') {
                        include '../inc/diskusi.php';
                    }
                    else if ($p == 'jenis_kelas') {
                        include '../inc/jenis_kelas.php';
                        // include '../inc/jenis_kelas.php';
                    }
                    else if ($p == 'anggota_kelas') {
                        include '../inc/anggota_kelas.php';
                    }
                    else{
                        echo "<script>window.location='./error';</script>";
                    }
                ?>
            </div>
        </div>

        <?php include 'kerangka/footer_dashboard.php'; ?> 
    </body>
</html>