<nav class="navbar navbar-light nav-main fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?php echo home_base_url(); ?>">
            <img src="<?php echo home_base_url(); ?>assets/homepage/img/logo/logo.png" style="width: 125px !important; margin-top: 0 !important;">
        </a>

        <?php if (@$_SESSION["user"]) { ?>
        	<?php 
        		$query2 = mysqli_query($db, "SELECT*FROM user WHERE user_user='$_SESSION[user]'");
    			$data2 = mysqli_fetch_array($query2);
        	?>
        	<div class="btn-group">
  				<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    				<i class="fa fa-user"></i> | <?php echo $data2["nama_user"];?>
  				</button>
  				<div class="dropdown-menu dropdown-menu-right">
				    <a class="dropdown-item" href="<?php echo home_base_url(); ?>template/with-session.php">
				    	<i class="fa fa-th-large"></i> | Lihat Dashboard
				    </a>
				    <a class="dropdown-item" href="<?php echo home_base_url(); ?>login/logout.php" style="color: #dc3545; font-weight: 700;">
				    	<i class="fa fa-power-off"></i> | Keluar Aplikasi
				    </a>
  				</div>
			</div>
	    <?php } else { ?>
	        <a class="btn btn-primary" href="<?php echo home_base_url(); ?>login">Login</a>
	    <?php } ?>
    </div>
</nav>