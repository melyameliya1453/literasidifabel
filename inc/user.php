<?php
    include "config-konek.php";
    // session_start();
    
    $querypost = mysqli_query($db, "SELECT * FROM post ORDER BY id_post DESC");
    $query1 = mysqli_query($db, "SELECT * FROM user ORDER BY tanggal_login_user DESC");
    $query_jenis_kelas = mysqli_query($db, "SELECT * FROM jenis_kelas ORDER BY id_jenis_kelas ASC");
    $query_anggota_kelas = mysqli_query($db, "SELECT * FROM anggota_kelas ORDER BY id_anggota ASC");
    
    mysqli_query($db, "UPDATE user SET status_user='Online' WHERE user_user='$_SESSION[user]'");
    $query2 = mysqli_query($db, "SELECT*FROM user WHERE user_user='$_SESSION[user]'");
    $data2 = mysqli_fetch_array($query2);
?>

<?php
    $useruser = $_GET["user"];
    $userquery = mysqli_query($db, "SELECT*FROM user WHERE user_user='$useruser'");
    $datauseruser = mysqli_fetch_array($userquery);
?>

<?php
    $cekpengguna = mysqli_num_rows($userquery);
    if (empty($cekpengguna)) {
        echo "<div class='alert alert-danger'>Pengguna Dengan Username <b>@$useruser</b> Tidak Ada. Mungikin Sudah Dihapus Atau Kesalahan Pada URL <a href='../template/with-session.php?p=daftar_pengguna'>Lihat Semua Pengguna</a></div>";
    }

    elseif (@$_SESSION["user"] == $useruser) { ?>
        <div id="page-inner">
            <?php if ($datauseruser["pp_user"] == '') { ?>
                <a target="blank" href="<?php echo home_base_url(); ?>assets/img/user/user.png">
                    <img style="float:left; margin-right:20px;width:250px;height:250px;" src="<?php echo home_base_url(); ?>assets/img/user/user.png" class="img-thumbnail img-responsive">
                </a>
            <?php } else { ?>
                <a target="blank" href="<?php echo home_base_url(); ?>assets/img/user/<?php echo $datauseruser["pp_user"];?>">
                    <img style="float:left; margin-right:20px;width:250px;height:250px;" src="<?php echo home_base_url(); ?>assets/img/user/<?php echo $datauseruser["pp_user"];?>" class="img-thumbnail img-responsive">
                </a>
            <?php } ?>

            <div style="position:absolute;">
                <a href="<?php echo home_base_url(); ?>template/with-session.php?p=edit&profil=<?php echo $data2["user_user"];?>#ubah-foto" class="btn btn-info"><li class="fa fa-camera"></li> Ubah Atau Reset Foto Profil</a><br>
            </div>
            
            <br>

            <h3>
                <strong><?php echo $datauseruser["nama_user"];?></strong>
            </h3>

            <hr>
            
            <b>Username: </b> <?php echo $datauseruser["user_user"];?><br>
            <b>Tanggal Lahir :</b> <?php echo $datauseruser["tanggal_lahir_user"];?> <?php echo $datauseruser["bulan_lahir_user"];?> <?php echo $datauseruser["tahun_lahir_user"];?><br>
            <b>Jenis Kelamin :</b> <?php echo $datauseruser["jk_user"];?><br>
            <b>No. Hp :</b> <?php echo $datauseruser["hp_user"];?><br>
            <b>Alamat :</b> <?php echo $datauseruser["alamat_user"];?><br>

            <br><br><br>

            <div>
                <b>Bio Pribadi :</b>

                <br><br>

                <blockquote>
                    <?php echo $datauseruser["bio_user"]; if($datauseruser["bio_user"] == ''){echo "*Tidak Ditampilkan*";}?>
                </blockquote>
            </div>

            <br>

            <strong>Topik yang ditulis <?php echo $datauseruser["nama_user"];?> : </strong>

            <div class="pull-right">
                <a href="<?php echo home_base_url(); ?>template/with-session.php?p=posting&profil=<?php echo $data2["user_user"];?>" class="btn btn-success btn-sm">
                    <i class="fa fa-plus"></i> Buat Topik Baru
                </a>
            </div>

            <br><br>

            <div id="post">
                <?php
                    $postingandariuser = mysqli_query($db, "SELECT*FROM post WHERE penulis_post='$datauseruser[user_user]' ORDER BY id_post DESC LIMIT 7");
                ?>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Judul Topik</th>
                                <th>Tanggal Posting</th>
                                <th>Total Suka</th>
                                <th>Total Komentar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $batas = 10;
                            
                                if (isset($_GET["hal"])) {
                                    $hal = $_GET["hal"];
                                    $posisi = ($hal-1)*$batas;
                                }
                                else{
                                    $hal = 1;
                                    $posisi = 0;
                                }

                                $querypostuser = mysqli_query($db, "SELECT*FROM post WHERE penulis_post='$datauseruser[user_user]' ORDER BY id_post DESC LIMIT $posisi, $batas");
                                $hitungpost = @mysqli_num_rows($querypostuser);

                                if (empty($hitungpost)) {
                                    echo "<div class='alert alert-warning'>Tidak Ada Postingan</div>";
                                }
                                else{
                                    while ($datapostuser = mysqli_fetch_array($querypostuser)) { ?>
                                        <tr>
                                            <td><a href="<?php echo home_base_url(); ?>template/with-session.php?p=post&id=<?php echo $datapostuser["id_post"];?>&post_by=<?php echo $datapostuser["penulis_post"];?>"><?php echo $datapostuser["judul_post"];?></a></td>
                                            <td><?php echo $datapostuser["tanggal_post"];?></td>
                                            <td><?php echo $datapostuser["suka_post"];?></td>
                                            <td><?php $querykomentarkece = mysqli_query($db, "SELECT*FROM komentar WHERE id_post='$datapostuser[id_post]'"); $totalkomenkece = mysqli_num_rows($querykomentarkece); echo $totalkomenkece;?> Komentar</td>
                                            <td>
                                                <a href="<?php echo home_base_url(); ?>inc/hapus-post?id=<?php echo $datapostuser["id_post"];?>&u=<?php echo $datapostuser["penulis_post"];?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus Postingan Ini Dan Semua Komentar Di Dalamnya?')">
                                                    <i class="fa fa-trash"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    <?php } else { ?>

        <div id="page-inner">
            <?php if ($datauseruser["pp_user"] == '') { ?>
                <a target="blank" href="<?php echo home_base_url(); ?>assets/img/user/user.png">
                    <img style="float:left; margin-right:20px;width:250px;height:250px;" src="<?php echo home_base_url(); ?>assets/img/user/user.png" class="img-thumbnail img-responsive">
                </a>
            <?php } else { ?>
                <a target="blank" href="<?php echo home_base_url(); ?>assets/img/user/<?php echo $datauseruser["pp_user"];?>">
                    <img style="float:left; margin-right:20px;width:250px;height:250px;" src="<?php echo home_base_url(); ?>assets/img/user/<?php echo $datauseruser["pp_user"];?>" class="img-thumbnail img-responsive">
                </a>
            <?php } ?>

            <br>

            <h3>
                <strong><?php echo $datauseruser["nama_user"];?></strong>
            </h3>
            
            <hr>

            <b>Username: </b> <?php echo $datauseruser["user_user"];?><br>
            <b>Tanggal Lahir :</b> <?php echo $datauseruser["tanggal_lahir_user"];?> <?php echo $datauseruser["bulan_lahir_user"];?> <?php echo $datauseruser["tahun_lahir_user"];?><br>
            <b>Jenis Kelamin :</b> <?php echo $datauseruser["jk_user"];?><br>
            <b>No. Hp :</b> <?php echo $datauseruser["hp_user"];?><br>
            <b>Alamat :</b> <?php echo $datauseruser["alamat_user"];?><br>

            <br><br><br>

            <div id="bio">
                <b>Bio Pribadi :</b>

                <br><br>

                <blockquote>
                    <?php echo $datauseruser["bio_user"]; if($datauseruser["bio_user"] == ''){echo "*Tidak Ditampilkan*";}?>
                </blockquote>
            </div>

            <br>

            <div id="post" style="margin-top: 20px;">
                <strong>Topik yang ditulis <?php echo $datauseruser["nama_user"];?> : </strong>
                <div class="pull-right">
                    <a href="<?php echo home_base_url(); ?>template/with-session.php?p=posting&profil=<?php echo $data2["user_user"];?>" class="btn btn-success btn-sm">
                        <i class="fa fa-plus"></i> Buat Topik Baru
                    </a>
                </div>

                <br><br>

                <?php
                    $postingandariuser = mysqli_query($db, "SELECT*FROM post WHERE penulis_post='$datauseruser[user_user]' ORDER BY id_post DESC LIMIT 7");
                ?>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Judul Topik</th>
                                <th>Tanggal Posting</th>
                                <th>Total Suka</th>
                                <th>Total Komentar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $batas = 10;
                            
                                if (isset($_GET["hal"])) {
                                    $hal = $_GET["hal"];
                                    $posisi = ($hal-1)*$batas;
                                }
                                else{
                                    $hal = 1;
                                    $posisi = 0;
                                }

                                $querypostuser = mysqli_query($db, "SELECT*FROM post WHERE penulis_post='$datauseruser[user_user]' ORDER BY id_post DESC LIMIT $posisi, $batas");
                                $hitungpost = @mysqli_num_rows($querypostuser);

                                if (empty($hitungpost)) {
                                    echo "<div class='alert alert-warning'>Tidak Ada Postingan</div>";
                                }
                                else{
                                    while ($datapostuser = mysqli_fetch_array($querypostuser)) { ?>
                                        <tr>
                                            <td><a href="<?php echo home_base_url(); ?>template/with-session.php?p=post&id=<?php echo $datapostuser["id_post"];?>&post_by=<?php echo $datapostuser["penulis_post"];?>"><?php echo $datapostuser["judul_post"];?></a></td>
                                            <td><?php echo $datapostuser["tanggal_post"];?></td>
                                            <td><?php echo $datapostuser["suka_post"];?></td>
                                            <td><?php $querykomentarkece = mysqli_query($db, "SELECT*FROM komentar WHERE id_post='$datapostuser[id_post]'"); $totalkomenkece = mysqli_num_rows($querykomentarkece); echo $totalkomenkece;?> Komentar</td>
                                            <td><a href="<?php echo home_base_url(); ?>inc/hapus-post?id=<?php echo $datapostuser["id_post"];?>&u=<?php echo $datapostuser["penulis_post"];?>" class="btn btn-danger" onclick="return confirm('Hapus Postingan Ini Dan Semua Komentar Di Dalamnya?')">Hapus</a></td>
                                        </tr>
                                    <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php
    }
?>