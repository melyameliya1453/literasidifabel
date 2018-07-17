<?php
    $idpost = @$_GET["id"];
    $querypost = mysqli_query($db, "SELECT * FROM post WHERE id_post='$idpost' AND penulis_post='$_GET[post_by]'");
    $datapost = mysqli_fetch_array($querypost);
    $cekapakahpostinganiniadaatautidak = mysqli_num_rows($querypost);
    
    if (empty($cekapakahpostinganiniadaatautidak)) {
        echo "<div class='alert alert-danger'><h4>Postingan Ini Tidak Ada.</h4>Mungkin Sudah Di Hapus Atau Di Perbarui. <a href='./?p=beranda'>Kembali Ke Halaman Utama</a></div>";
    } else {
?>
        <title><?php echo $datapost["judul_post"];?> | Literatur Difabel</title>

        <style>
            .abc{
                color: grey;
                text-decoration: none;
                transition: color 0.2s;
            }
            .abc:hover{
                color:darkgrey;
                text-decoration: none;
            }
        </style>

        <section class="testimonials bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-lg-3" id="post<?php echo $datasqlpost["id_post"];?>">
                        <div class="page-inner" style="min-height: auto !important; border-top: 5px solid #999; padding: 15px 25px 10px 25px;">
                            <p class="auth__text" style="border-bottom: 1px solid #eee; padding-bottom: 10px;">
                                <i class="fa fa-user icon-blue"></i> Penulis: <strong><a style="color: #2eb2ff; text-decoration: none;" href="./?p=user&user=<?php echo $datapost["penulis_post"];?>">
                                    <?php echo $datapost["penulis_post"];?>
                                </a></strong>
                            </p>
                            <p class="auth__text" style="border-bottom: 1px solid #eee; padding-bottom: 10px;">
                                <i class="fa fa-calendar icon-blue"></i> Tgl Post: <strong><?php echo $datapost["tanggal_post"];?></strong>
                            </p>
                            <p class="auth__text">
                                <i class="fa fa-thumbs-up icon-blue"></i> Like: <?php echo $datapost["suka_post"];?>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-9 col-lg-9">
                        <div class="page-inner" style="min-height: auto !important;">
                            <div class="alert alert-default alert-title-area">
                                <h3 class="alert-title">
                                    <?php echo $datapost["judul_post"];?>
                                </h3>

                                <i class="fa fa-user icon-blue"></i> : 
                                <a href="./?p=user&user=<?php echo $datapost["penulis_post"];?>" class="bold-alert">
                                    <?php echo $datapost["penulis_post"];?>
                                </a> | 
                                <i class="fa fa-calendar icon-blue"></i> : <span class="bold-alert"><?php echo $datapost["tanggal_post"];?></span> | 
                                <i class="fa fa-thumbs-up icon-blue"></i> : <?php echo $datapost["suka_post"];?>
                                
                                <span style="float:right;">
                                    <?php
                                        $datasukapost = @mysqli_fetch_array(mysqli_query($db, "SELECT*FROM suka_post WHERE id_post='$idpost' AND user_suka='$_SESSION[user]'"));
                                        if (empty($_SESSION["user"])) {}
                                        elseif ($datasukapost["post_suka"] == 1) {
                                    ?>
                                    
                                        <a class="btn btn-danger btn-xs" href="#" onclick="window.location='./inc/unlike.php?id=<?php echo $idpost;?>&u=<?php echo $datapost["penulis_post"];?>';">
                                            <i class="fa fa-heart"></i> Unlike
                                        </a>

                                    <?php } else { ?>
                                    
                                        <a class="btn btn-primary btn-xs" href="#" onclick="window.location='./inc/like.php?id=<?php echo $idpost;?>&u=<?php echo $datapost["penulis_post"];?>';">
                                            <i class="fa fa-heart"></i> Like
                                        </a>

                                    <?php } ?>
                                </span> 
                            </div>
                            
                            <div>
                                <?php if (@$datapost["gambar_post"]) { ?>
                                <a href="./assets/img/post/<?php echo $datapost["gambar_post"];?>">
                                    <img src="assets/img/post/<?php echo $datapost["gambar_post"];?>" class="img-responsive" style="margin-bottom: 15px; border-radius: 4px; max-width: 765px;">
                                </a>
                            </div>

                            <div>
                                <p class="desc-post"><?php echo $datapost["isi_post"];?></p>
                            </div>

                            <?php } else { ?>

                                <div style="margin-bottom:100px;">
                                    <p class="desc-post"><?php echo $datapost["isi_post"];?></p>
                                </div>

                            <?php } if (@$_SESSION["user"]) { ?>
                                <hr>
                                <h4 style="margin-bottom: 5px;"><strong>Beri komentar disini</strong></h4>
                                <small>Tekan <i><strong>Enter</strong></i> untuk mengirim komentar</small>

                                <form method="post" action="./inc/ngomen.php?p=<?php echo $datapost["id_post"];?>&a=<?php echo $datapost["penulis_post"];?>" id="komentar" style="margin-top: 15px;">
                                    <div class="form-group">
                                        <input type="text" placeholder="Tulis komentar" name="komentari" class="form-control">
                                    </div>
                                </form>

                            <?php } else { ?>
                                <a href="./login?post=<?php echo $url;?>?p=post&id=<?php echo$datapost["id_post"];?>&post_by=<?php echo $datapost["penulis_post"];?>">
                                    <i class="fa fa-sign-in"></i> Login untuk menambah suka dan komentar
                                </a>
                            <?php } ?>
                    
                            <div class="alert alert-success" style="margin-top:35px;">
                                Total komentar : 
                                <b>
                                    <?php
                                        $batas  = 15;

                                        if (isset($_GET["hal"])) {
                                            $hal = $_GET["hal"];
                                            $posisi = ($hal-1)*$batas;
                                        }
                                        else{
                                            $hal = 1;
                                            $posisi = 0;
                                        }

                                        $querykomentar = mysqli_query($db, "SELECT*FROM komentar WHERE id_post='$idpost' ORDER BY id_komentar ASC LIMIT $posisi, $batas");
                                        $querykomentar2 = mysqli_query($db, "SELECT*FROM komentar WHERE id_post='$idpost'");
                                        $totalkomentar = mysqli_num_rows($querykomentar2);
                                        echo $totalkomentar;
                                    ?>
                                </b>
                            </div>

                            <!-- <?php
                                if ($totalkomentar > 0) {
                                    echo "Urutan Komentar : ";
                                }
                                
                                $totalkomentar2 = mysqli_num_rows($querykomentar2);
                                $bagi = ceil($totalkomentar2/$batas);
                                
                                for ($i=1; $i <= $bagi ; $i++) { 
                                    if ($hal==$i) {
                                        echo "<span style='background:#ddd;border-radius:50%;padding:5px 10px;color:#fff;margin-left:5px;'>$i</span> ";
                                    } else {
                                        echo "<a href='./?p=post&id=$idpost&post_by=$datapost[penulis_post]&hal=$i#komentar'><span class='badge'>$i</span></a> ";
                                    }
                                }
                            ?> -->
                    
                            <div>
                                <?php
                                    if ($totalkomentar >= 0) {
                                        while ($datakomentar = mysqli_fetch_array($querykomentar)) { ?>
                                            <small id="komentar_<?php echo $datakomentar["id_komentar"];?>" class="tgl_komentar">
                                                <?php echo $datakomentar["tanggal_komentar"];?>
                                            </small>

                                            <br>
                                            
                                            <b>
                                                <a href="./?p=user&user=<?php echo $datakomentar["penulis_komentar"];?>">
                                                    <?php if ($datakomentar["pp_penulis"] == '') { ?>
                                                        <img src="./assets/img/user/<?php echo $datakomentar["pp_penulis"];?>" style="width:25px;height:25px;border-radius:100%;">
                                                    <?php } else { ?>
                                                        <img src="./assets/img/user/<?php echo $datakomentar["pp_penulis"];?>" style="width:25px;height:25px;border-radius:100%;">
                                                    <?php 
                                                        }
                                                        $dataygngomen = mysqli_fetch_array(mysqli_query($db, "SELECT*FROM user WHERE user_user = '$datakomentar[penulis_komentar]'"));
                                                    ?>
                                                    
                                                    <?php echo $dataygngomen["nama_user"];?>
                                                </a> :
                                            </b> 

                                            <?php echo $datakomentar["isi_komentar"];?>

                                            <?php if (@$_SESSION["user"] == @$datapost["penulis_post"]) { ?>
                                                <a href="./inc/hapus-komentar?id=<?php echo $datakomentar["id_komentar"];?>" style="float:right;" class="abc" title="Hapus Komentar" onclick="return confirm('Hapus Komentar Ini Dari Postingan Kamu?')">
                                                    X
                                                </a>

                                            <?php } elseif(@$datakomentar["penulis_komentar"] == @$data2["user_user"]){ ?>
                                                <a href="./inc/hapus-komentar?id=<?php echo $datakomentar["id_komentar"];?>" style="float:right;" class="abc" title="Hapus Komentar" onclick="return confirm('Hapus Komentar Kamu?')">
                                                    X
                                                </a>

                                            <?php } ?>       
                                    
                                            <hr>

                                        <?php
                                        }
                                    }
                                    else{
                                        echo "<div class='alert alert-danger'>Tidak Ada Komentar</div>";
                                    }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php } ?>