<?php
    session_start();
    include 'inc/config-konek.php';
    include 'base_url.php';

    if (@$_SESSION["user"]) {
        header("location:../?p=beranda");
    }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register - Literasi Difabel</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />

    <link href="assets/css/basic.css" rel="stylesheet" />

    <style>
        .login{
            color:black;text-decoration:none;transition:color 0.3s;
        }
        .login:hover{
            color:#9d0400;text-decoration:none;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="row text-center" style="margin-top:50px;">
            <div class="col-md-12">
                <a href="../" class="login"><img src="assets/homepage/img/logo/logo.png" width="230"></a>
            </div>
        </div>

        <br><br>

        <div class="row ">
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1" style="box-shadow: 0 6px 10px 0px #F3F3F5;">
                <div class="panel-body">
                    <form role="form" method="post" action="inc/tambah_user.php" enctype="multipart/form-data">
                        <h3><strong>Register</strong></h3>
                           
                        <hr />

                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_user" placeholder="Masukan nama lengkap" required autofocus style="text-transform: capitalize;">
                        </div>

                        <div class="form-group">
                            <label for="">Jenis Kelamin</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="jk_user" value="L" checked required> Laki-Laki
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="jk_user" value="P" required> Perempuan
                            </label>
                        </div>
                         
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="user_user" placeholder="Masukan username" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" class="form-control" name="pass_user" placeholder="************" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="">Re-Type Password</label>
                                    <input type="password" class="form-control" name="" placeholder="************" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="">Tgl Lahir</label>
                                    <select required name="tanggal_lahir_user" class="form-control">
                                        <?php
                                            $tgl = 1;
                                            while ($tgl <= 31) {
                                        ?>
                                            <option><?php echo $tgl;?></option>
                                        <?php 
                                            $tgl++; 
                                            } 
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="">Bulan Lahir</label>
                                    <select required name="bulan_lahir_user" class="form-control">
                                        <option>Januari</option>
                                        <option>Februari</option>
                                        <option>Maret</option>
                                        <option>April</option>
                                        <option>Mei</option>
                                        <option>Juni</option>
                                        <option>Juli</option>
                                        <option>Agustus</option>
                                        <option>September</option>
                                        <option>Oktober</option>
                                        <option>November</option>
                                        <option>Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="">Tahun Lahir</label>
                                    <select required name="tahun_lahir_user" class="form-control">
                                        <?php
                                            $thn = 1963;
                                            date_default_timezone_set("Asia/Jakarta");
                                            $thnskrg = date("Y");

                                            while ($thn <= $thnskrg) {
                                        ?>
                                            <option><?php echo $thn;?></option>
                                        <?php
                                            $thn++;
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">No. Hp</label>
                            <input type="number" class="form-control" name="hp_user" placeholder="089645578698" required>
                        </div>

                        <div class="form-group">
                            <label for="">Bio / Deskripsi</label>
                            <input type="text" class="form-control" name="bio_user" placeholder="Masukan secara singkat deskripsi pribadi" required>
                        </div>

                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea class="form-control" required rows="3" name="alamat_user" placeholder="Alamat"></textarea>
                        </div>
                         
                        <input type="submit" name="submit" value="Daftar" class="btn btn-primary btn-md" style="width: 100%">
                        
                        <hr />
                        <center style="margin-bottom: 10px;">Sudah punya akun? <strong><a href="./login">Login disini</a></strong></center>
                    </form>
                </div>         
            </div>
        </div>

        <br>

        <div class="row">
            <center style="margin-bottom: 10px;"><a href="<?php echo home_base_url(); ?>"><i class="fa fa-arrow-left"></i> Kembali ke Halaman Awal</a></center>
        </div>
    </div>
</body>
</html>