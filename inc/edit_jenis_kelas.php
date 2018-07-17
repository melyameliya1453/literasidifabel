<?php
	include '../base_url.php'; 
    include "config-konek.php";
    session_start();    
    
    if (@$_SESSION["user"]) {
        $query2 = mysqli_query($db, "SELECT*FROM user WHERE user_user='$_SESSION[user]'");
        $data2 = mysqli_fetch_array($query2);

		$id         = $_GET['id'];
		$value  	= mysqli_query($db, "SELECT * FROM jenis_kelas WHERE id_jenis_kelas = '$id'");
		$row        = mysqli_fetch_array($value);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php include '../template/kerangka/head_dashboard.php'; ?>
    <body>
        <div id="wrapper">
            <?php 
                include '../template/kerangka/nav_dashboard.php';
                include '../template/kerangka/sidebar.php'; 
            ?>
            <div id="page-wrapper">
            	<div id="page-inner" style="min-height: auto !important;">
					<div class="row">
				        <div class="col-md-12">
				            <h1 class="page-head-line"><i class="fa fa-pencil"></i> Edit Kelas Difabel</h1>
				            <h1 class="page-subhead-line">Update nama dan keterangan kelas  </h1>
				        </div>
				    </div>

				    <form action="./update_jenis_kelas.php" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label for="">Nama Kelas</label>
							<input type="text" class="form-control" id="" name="nama_jenis_kelas" value="<?php echo $row['nama_jenis_kelas'];?>">
						</div>
						<div class="form-group">
							<label for="">Keterangan</label>
							<input type="text" class="form-control" id="" name="keterangan" value="<?php echo $row['keterangan'];?>">
						</div>
						<hr>
						<a href="../template/with-session.php/?p=jenis_kelas" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
						<button type="submit" name="updateprofil " class="btn btn-primary pull-right"><i class="fa fa-check"></i> Simpan Perubahan</button>
					</form>
				</div>
            </div>
        </div>

        <?php include '../template/kerangka/footer_dashboard.php'; ?>     
    </body>
</html>

<?php } ?>