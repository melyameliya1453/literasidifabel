<?php
    session_start();
    include '../inc/config-konek.php';
    include '../base_url.php';

    if (@$_SESSION["user"]) {
        header("location:../?p=beranda"); // ?p=beranda
    }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Literasi Difabel</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo home_base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="<?php echo home_base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" />

    <link href="<?php echo home_base_url(); ?>assets/css/basic.css" rel="stylesheet" />

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
        <div class="row text-center" style="margin-top:80px;">
            <div class="col-md-12">
                <a href="<?php echo home_base_url(); ?>" class="login"><img src="<?php echo home_base_url(); ?>assets/homepage/img/logo/logo.png" width="230"></a>
            </div>
        </div>

        <br><br>

        <div class="row ">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1" style="box-shadow: 0 6px 10px 0px #F3F3F5;">
                <div class="panel-body">
                    <form role="form" method="post" action="">
                        <?php
                            if (@$_POST["submit"]) {
                                $user = mysqli_real_escape_string($db, $_POST["username"]);
                                $pass = mysqli_real_escape_string($db, $_POST["password"]);
                                $e = false;
                                if (empty($user) && empty($pass)) {
                                    echo "<div class='alert alert-danger'>
                                            Username Dan Password Tidak Boleh Kosong
                                        </div>";
                                    $e = true;
                                }
                                elseif (empty($user)) {
                                    echo "<div class='alert alert-danger'>Username Tidak Boleh Kosong</div>";
                                    $e = true;
                                }
                                elseif (empty($pass)) {
                                    echo "<div class='alert alert-danger'>Password Tidak Boleh Kosong</div>";
                                    $e = true;
                                }
                                if ($e == false) {
                                    $querylogin = mysqli_query($db, "SELECT*FROM user WHERE user_user='$user' AND pass_user='$pass'");
                                    $datalogin = mysqli_fetch_array($querylogin);
                                    $beda = $datalogin["user_user"];
                                    $ceklogin = mysqli_num_rows($querylogin);
                                    
                                    if (empty($ceklogin)) {
                                        echo "<div class='alert alert-danger'>Username Atau Password Anda Salah</div>";
                                    }
                                    else{
                                        $_SESSION["user"] = $beda;
                                        date_default_timezone_set("Asia/Jakarta");
                                        $tanggal_login = date("G:i d/m/Y");
                                        mysqli_query($db, "UPDATE user SET tanggal_login_user='$tanggal_login' WHERE user_user='$user'");
                                        mysqli_query($db, "UPDATE user SET status_user='Online' WHERE user_user='$user'");

                                        $ngepos = @$_GET["post"]."&id=";
                                        $redipos = @$_GET["id"]."&post_by=";
                                        $rekpos = @$_GET["post_by"];
                                        $redpos = $ngepos.$redipos.$rekpos;

                                        if (isset($ngepos) && isset($redipos) && isset($rekpos)) {
                                            header("location:$redpos#komentar");
                                        }
                                        else{
                                            header("location:../template/with-session.php");
                                        }
                                    }
                                }
                            }
                        ?>

                        <h5><strong>Masukan Data dengan Benar</strong></h5>
                           
                        <br />
                         
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-at" style="font-weight: 700 !important;"></i></span>
                            <input type="text" class="form-control" name="username" placeholder="Username" autofocus/>
                        </div>
                        
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                            <input type="password" class="form-control" name="password" placeholder="Password" />
                        </div>
                         
                        <input type="submit" name="submit" value="Login" class="btn btn-primary btn-md" style="width: 100%">
                        
                        <hr />
                        <center style="margin-bottom: 10px;">Bukan member? <strong><a href="<?php echo home_base_url(); ?>register.php">Daftar disini</a></strong></center>
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