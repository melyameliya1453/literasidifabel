<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="./">
            <img src="<?php echo home_base_url(); ?>assets/homepage/img/logo/logo.png">
        </a>
    </div>

    <div class="header-right">
        <button onclick="window.location='<?php echo home_base_url(); ?>';" class="btn btn-default" title="Kembali ke Halaman Awal">
            <i class="fa fa-arrow-left fa-sm"></i> Halaman Awal
        </button>
        <button onclick="window.location='<?php echo home_base_url(); ?>login/logout.php';" class="btn btn-danger" title="Keluar Aplikasi">
            <i class="fa fa-sign-out fa-sm"></i> Logout
        </button>
    </div>
</nav>