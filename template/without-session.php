<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Literasi Difabel</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo home_base_url(); ?>assets/homepage/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="<?php echo home_base_url(); ?>assets/homepage/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo home_base_url(); ?>assets/homepage/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

        <link href="<?php echo home_base_url(); ?>assets/homepage/css/landing-page.css" rel="stylesheet">
        <link href="<?php echo home_base_url(); ?>assets/css/basic.css" rel="stylesheet">
    </head>
    <body>
        
        <?php include 'kerangka/nav.php' ?>

        <div>
            <?php
                $p = @$_GET["p"];
                if (empty($p)) {
                    include 'page/awal.php';
                }
                else if ($p == 'baca') {
                    include 'page/read.php';
                }
                else{
                    echo "<script>window.location='./error';</script>";
                }
            ?>
        </div>

        <?php include 'kerangka/footer.php'; ?>

    </body>
</html>