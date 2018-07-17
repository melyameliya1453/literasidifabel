<?php
    $useruser = $_GET["profil"];
    $userquery = mysqli_query($db, "SELECT * FROM user WHERE user_user = '$useruser'");
    $datauseruser = mysqli_fetch_array($userquery);

?>

<title><?php echo $datauseruser["nama_user"];?> | Pengaturan Akun - Literasi Difabel</title>

<?php if (@$_SESSION["user"] == $useruser) { ?>
    <?php
        if (@$_POST["submitprofil"]) {
            $namaubahprofil = mysqli_real_escape_string($db, $_POST["nama"]);
            $tanggalubahprofil = (int)mysqli_real_escape_string($db, $_POST["tanggal"]);
            $bulanubahprofil = mysqli_real_escape_string($db, $_POST["bulan"]);
            $tahunubahprofil = (int)mysqli_real_escape_string($db, $_POST["tahun"]);
            $jkubahprofil = mysqli_real_escape_string($db, $_POST["jk"]);
            $hpubahprofil = mysqli_real_escape_string($db, $_POST["hp"]);
            $alamatubahprofil = mysqli_real_escape_string($db, $_POST["alamat"]);
            $deskripsiubahprofil = mysqli_real_escape_string($db, $_POST["deskripsi"]);


            $update = mysqli_query($db, "UPDATE user SET nama_user='$namaubahprofil', tanggal_lahir_user='$tanggalubahprofil', bulan_lahir_user='$bulanubahprofil', tahun_lahir_user='$tahunubahprofil', jk_user='$jkubahprofil', hp_user='$hpubahprofil', alamat_user='$alamatubahprofil', bio_user='$deskripsiubahprofil' WHERE user_user='$data2[user_user]'");
            
            echo "<script>window.location='../template/with-session.php?p=edit&profil=';</script>";
        }
        
        elseif (@$_POST["submitgambar"]) {
            date_default_timezone_set("Asia/Jakarta");
            $dt = date("Ymd_Gis");
            $usergambar = @$_SESSION["user"];
            $gambar = $_FILES["gambar"]["tmp_name"];
            $tipegambar = $_FILES["gambar"]["size"];
            $alamat_gambar = $_FILES["gambar"]["name"];
            $folder = "../assets/img/user/";


            $pindah = @move_uploaded_file($gambar, $folder.$dt.$alamat_gambar);

            if ($pindah) {
                mysqli_query($db, "UPDATE user SET pp_user='$dt$alamat_gambar' WHERE user_user='$useruser'");
                mysqli_query($db, "UPDATE komentar SET pp_penulis='$dt$alamat_gambar' WHERE penulis_komentar='$useruser'");
                echo "<script>window.location='../template/with-session.php?p=edit&profil=#ubah-foto';</script>";
            }
            else{
                echo "<div class='alert alert-danger'>Gagal Upload Gambar. Coba Lagi!</div>";

            }
        }
        
        elseif (@$_POST["submitpengaturan"]) {
            $passlam = mysqli_real_escape_string($db, $_POST["passwordlama"]);
            $passbar = mysqli_real_escape_string($db, $_POST["passwordbaru"]);

            if ($passlam == $data2["pass_user"]) {
                mysqli_query($db, "UPDATE user SET pass_user='$passbar' WHERE user_user='$_SESSION[user]'");
                echo "<div class='alert alert-info'>Berhasil Ubah Password!</div>";
            }
            else{
                echo "<div class='alert alert-danger'>Password Lama Salah!</div>";
            }
        }

        elseif (@$_POST["resetgambar"]) {
            mysqli_query($db, "UPDATE user SET pp_user='user.png' WHERE user_user='$data2[user_user]'");
            mysqli_query($db, "UPDATE komentar SET pp_penulis='user.png' WHERE penulis_komentar='$data2[user_user]'");
            echo "<script>window.location='../template/with-session.php?p=edit&profil=';</script>";
        }
    ?>

    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line"><i class="fa fa-pencil"></i> Pengaturan Akun</h1>
                <h1 class="page-subhead-line">Pengaturan profil: update foto, ganti nama, deskripsi dan password</h1>
            </div>
        </div>

        <div>
            <h4 id="ubah-foto"><strong>Ubah Foto Profil</strong></h4>
            <br>
            <label for="file">Pilih Gambar</label>
            
            <?php if ($data2["pp_user"] == '') { ?>
                <img src="<?php echo home_base_url(); ?>assets/img/user/user.png" style="float:left; width:250px;height:250px;margin-right:20px;" class="img-thumbnail">
            <?php } else { ?>
                <img src="<?php echo home_base_url(); ?>assets/img/user/<?php echo $datauseruser["pp_user"];?>" style="float:left; width:250px;height:250px;margin-right:20px;" class="img-thumbnail">
            <?php } ?>

            <form method="post" action="" enctype="multipart/form-data">
                <input type="file" name="gambar">
                <br>
                <input value="Simpan Perubahan" type="submit" name="submitgambar" class="btn btn-success"> 
                <input value="Reset Foto Ke Default" type="submit" name="resetgambar" class="btn btn-default">
            </form>
        </div>

        <div id="user-and-pass" style="margin-top: 180px;">
            <hr style="border: 1px dotted #ddd;">
            <h4><strong>Ubah Akun</strong></h4>
            <br>
            <form method="post" action="">
                <b>Username :</b> <li title="Username Tidak Dapat Diubah" onclick="alert('Username Tidak Dapat Diubah')" class="fa fa-question-circle"></li>
                <br>
                <div class="form-group">
                    <input disabled required type="text" name="username" value="<?php echo $data2["user_user"];?>" class="form-control">
                </div>

                <b>Password</b><br>
                <small>Tidak wajib mengganti password</small>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="password" placeholder="Masukan password lama" name="passwordlama" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <input type="password" placeholder="Masukan password baru" name="passwordbaru" class="form-control" required>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="form-group">
                    <input type="submit" value="Simpan Perubahan" name="submitpengaturan" class="btn btn-success">
                    <input type="reset" class="btn btn-default">
                </div>
            </form>
        </div>

        <br>

        <div id="ubah-data-profil">
            <hr style="border: 1px dotted #ddd;">
            <h4><strong>Ubah Data Pribadi</strong></h4>
            <br>
            <form method="post" action="">
                <b>Nama: </b>
                <div class="form-group">
                    <input required maxlength="20" type="text" name="nama" value="<?php echo $data2["nama_user"];?>" class="form-control">
                </div>

                <b>Tanggal Lahir: </b>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <select required name="tanggal" class="form-control">
                                <?php
                                    $tgl = 1;
                                    while ($tgl <= 31) {
                                ?>
                                    <option <?php if($data2["tanggal_lahir_user"] == $tgl){ echo "selected";}?>><?php echo $tgl;?></option>
                                <?php 
                                    $tgl++; 
                                    } 
                                ?>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <select required name="bulan" class="form-control">
                                <option <?php if($data2["bulan_lahir_user"] == 'Januari'){ echo "selected";};?>>Januari</option>
                                <option <?php if($data2["bulan_lahir_user"] == 'Februari'){ echo "selected";};?>>Februari</option>
                                <option <?php if($data2["bulan_lahir_user"] == 'Maret'){ echo "selected";};?>>Maret</option>
                                <option <?php if($data2["bulan_lahir_user"] == 'April'){ echo "selected";};?>>April</option>
                                <option <?php if($data2["bulan_lahir_user"] == 'Mei'){ echo "selected";};?>>Mei</option>
                                <option <?php if($data2["bulan_lahir_user"] == 'Juni'){ echo "selected";};?>>Juni</option>
                                <option <?php if($data2["bulan_lahir_user"] == 'Juli'){ echo "selected";};?>>Juli</option>
                                <option <?php if($data2["bulan_lahir_user"] == 'Agustus'){ echo "selected";};?>>Agustus</option>
                                <option <?php if($data2["bulan_lahir_user"] == 'September'){ echo "selected";};?>>September</option>
                                <option <?php if($data2["bulan_lahir_user"] == 'Oktober'){ echo "selected";};?>>Oktober</option>
                                <option <?php if($data2["bulan_lahir_user"] == 'November'){ echo "selected";};?>>November</option>
                                <option <?php if($data2["bulan_lahir_user"] == 'Desember'){ echo "selected";};?>>Desember</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <select required name="tahun" class="form-control">
                                <?php
                                    $thn = 1963;
                                    date_default_timezone_set("Asia/Jakarta");
                                    $thnskrg = date("Y");

                                    while ($thn <= $thnskrg) {
                                ?>
                                    <option <?php if($data2["tahun_lahir_user"] == $thn){ echo "selected";}?>><?php echo $thn;?></option>
                                <?php
                                    $thn++;
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <b>Jenis Kelamin: </b>
                <div class="form-group">
                    <input required type="radio" name="jk" <?php if($data2["jk_user"] == 'Pria'){ echo "checked";};?> value="Pria"> Pria 
                    <input <?php if($data2["jk_user"] == 'Wanita'){ echo "checked";};?> required type="radio" name="jk" value="Wanita"> Wanita
                </div>

                <b>No. Hp: </b>
                <div class="form-group">
                    <input type="number" name="hp" value="<?php echo $data2["hp_user"];?>" class="form-control">
                </div>

                <b>Alamat :</b>
                <div class="form-group">
                    <textarea name="alamat" rows="3" class="form-control">
                        <?php echo $data2["alamat_user"];?>
                    </textarea>
                </div>

                <b>Bio: </b>
                <div class="form-group">
                    <textarea name="deskripsi" placeholder="Tunjukan detail singkat tentang dirimu" rows="3" class="form-control">
                        <?php echo $data2["bio_user"];?>
                    </textarea>
                </div>
                
                <hr>

                <div class="form-group">
                    <input type="submit" name="submitprofil" value="Simpan Perubahan" class="btn btn-success">
                    <input type="reset" value="Reset" class="btn btn-default">
                </div>
            </form>
        </div>
    </div>

    <?php } else {
        echo "<script>window.location='../template/with-session.php?p=edit&profil=$data2[user_user]';</script>";
    }
?>