<?php
    $useruser = @$_GET["profil"];
    $userquery = mysqli_query($db, "SELECT * FROM user WHERE user_user='$useruser'");
    $datauseruser = mysqli_fetch_array($userquery);
?>

<title><?php echo $datauseruser["nama_user"];?> | Tambah Postingan - Literatur Difabel</title>

<?php
    $cekpengguna = mysqli_num_rows($userquery);
    if (@$_SESSION["user"] == $useruser) {
?>
    <div id="page-inner" style="min-height: auto !important;">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Tambah Topik</h1>
                <h1 class="page-subhead-line"><li class="fa fa-pencil"></li> Menambah topik forum</h1>    
            </div>
        </div>

        <form method="post" action="" enctype="multipart/form-data">
            <?php
                if (@$_POST["submit"]) {
                    date_default_timezone_set("Asia/Jakarta");
                    $dt = date("Ymd_Gis");
                    $gambar = @$_FILES["gambar"]["tmp_name"];
                    $alamat_gambar = @$_FILES["gambar"]["name"];
                    $folder = "../assets/img/post/";
                    $foldermin = "../assets/img/post-admin-herp-id/";

                    $pindah = move_uploaded_file($gambar, $folder.$dt.$alamat_gambar);

                    $judul = mysqli_real_escape_string($db, $_POST["judul"]);
                    $isi = mysqli_real_escape_string($db, $_POST["isi"]);

                    $date = date("G:i d/m/Y");

                    if ($pindah) {
                        mysqli_query($db, "INSERT INTO post VALUES('','$judul','$isi','$useruser','$date','$dt$alamat_gambar','0')");
                        echo "<div class='alert alert-info'>Postingan Telah Ditambahkan. <a href='../template/with-session.php?p=user&user=$data2[user_user]#post'>Lihat Semua Postingan Kamu</a></div>";
                    }
                    else{
                        mysqli_query($db, "INSERT INTO post VALUES('','$judul','$isi','$useruser','$date','','0')");
                        echo "<div class='alert alert-info'>Postingan Telah Ditambahkan. <a href='../template/with-session.php?p=user&user=$data2[user_user]#post'>Lihat Semua Postingan Kamu</a></div>";
                    }
                }
            ?>

            <div>
                <label>Gambar - tidak wajib</label>
                <input type="file" name="gambar">
            </div>

            <div style="margin-top:20px;">
                <input title="Masukan Judul Postingan" required type="text" name="judul" placeholder="Masukan judul topik" style="border:none;height:100px;width:100%;font-size:40px;">
                <hr>
                <div style="margin-top:20px;">
                    <textarea title="Masukan Isi Postingan" name="isi" rows="20" style="border:none;font-size:17px;width:100%;" placeholder="Isi topik"></textarea>
                </div>
                <hr>
                <div>
                    <input type="submit" name="submit" value="Kirim Topik" class="btn btn-success btn-lg" style="width:100%;">
                </div>
            </div>
        </form>
    </div>   
<?php } else { ?>
    <script>window.location='<?php echo home_base_url(); ?>template/with-session.php?p=posting&profil=<?php echo $data2["user_user"];?>';</script>
<?php } ?>