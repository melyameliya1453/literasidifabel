<?php
    include "../base_url.php";
    include "config-konek.php";
    session_start();    
    
    if (@$_SESSION["user"]) {
        $query2 = mysqli_query($db, "SELECT*FROM user WHERE user_user='$_SESSION[user]'");
        $data2 = mysqli_fetch_array($query2);

		$id         = $_GET['id'];
		$value  	= mysqli_query($db, "SELECT * FROM anggota_kelas WHERE id_anggota = '$id'");
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
				            <h1 class="page-head-line"><i class="fa fa-pencil"></i> Edit Anggota Difabel</h1>
				            <h1 class="page-subhead-line">Update nama dan kolom lainnya</h1>
				        </div>
				    </div>

				    <form action="./update_anggota_kelas.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-7 col-xs-12">
                                <div class="form-group">
                                    <label for="">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="" name="nama_anggota" value="<?php echo $row['nama_anggota'];?>">
                                </div>
                            </div>

                            <div class="col-md-5 col-xs-12">
                                <div class="form-group">
                                    <label for="">Nama Kelas</label>
                                    <select required name="nama_kelas" class="form-control">
                                        <option value="<?php if($row["nama_kelas"] == 'Dongeng'){ echo "selected";}?>">Dongeng</option>
                                        <option value="<?php if($row["nama_kelas"] == 'Laskar'){ echo "selected";}?>">Laskar</option>
                                        <option value="<?php if($row["nama_kelas"] == 'Hompimpa'){ echo "selected";}?>">Hompimpa</option>
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Jenis Kelamin</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="jk" <?php if($row["jk"] == 'Laki-Laki'){ echo "checked";};?> value="L" checked required> Laki-Laki
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="jk" <?php if($row["jk"] == 'Perempuan'){ echo "checked";};?> value="P" required> Perempuan
                            </label>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="">Tgl Lahir</label>
                                    <select required name="tgl_lahir" class="form-control">
                                        <?php
                                            $tgl = 1;
                                            while ($tgl <= 31) {
                                        ?>
                                            <option <?php if($row["tgl_lahir"] == $tgl){ echo "selected";}?>><?php echo $tgl;?></option>
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
                                    <select required name="bulan_lahir" class="form-control">
                                        <option <?php if($row["bulan_lahir"] == 'Januari'){ echo "selected";};?>>Januari</option>
                                        <option <?php if($row["bulan_lahir"] == 'Februari'){ echo "selected";};?>>Februari</option>
                                        <option <?php if($row["bulan_lahir"] == 'Maret'){ echo "selected";};?>>Maret</option>
                                        <option <?php if($row["bulan_lahir"] == 'April'){ echo "selected";};?>>April</option>
                                        <option <?php if($row["bulan_lahir"] == 'Mei'){ echo "selected";};?>>Mei</option>
                                        <option <?php if($row["bulan_lahir"] == 'Juni'){ echo "selected";};?>>Juni</option>
                                        <option <?php if($row["bulan_lahir"] == 'Juli'){ echo "selected";};?>>Juli</option>
                                        <option <?php if($row["bulan_lahir"] == 'Agustus'){ echo "selected";};?>>Agustus</option>
                                        <option <?php if($row["bulan_lahir"] == 'September'){ echo "selected";};?>>September</option>
                                        <option <?php if($row["bulan_lahir"] == 'Oktober'){ echo "selected";};?>>Oktober</option>
                                        <option <?php if($row["bulan_lahir"] == 'November'){ echo "selected";};?>>November</option>
                                        <option <?php if($row["bulan_lahir"] == 'Desember'){ echo "selected";};?>>Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="">Tahun Lahir</label>
                                    <select required name="tahun_lahir" class="form-control">
                                        <?php
                                            $thn = 1963;
                                            date_default_timezone_set("Asia/Jakarta");
                                            $thnskrg = date("Y");

                                            while ($thn <= $thnskrg) {
                                        ?>
                                            <option <?php if($row["tahun_lahir"] == $thn){ echo "selected";}?>><?php echo $thn;?></option>
                                        <?php
                                            $thn++;
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea class="form-control" name="alamat" rows="3">
                                <?php echo $row["alamat"];?>
                            </textarea>
                        </div>

						<hr>
						
                        <a href="<?php echo home_base_url(); ?>template/with-session.php?p=jenis_kelas" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
						<button type="submit" name="bts " class="btn btn-primary pull-right"><i class="fa fa-check"></i> Simpan Perubahan</button>
					</form>
				</div>
            </div>
        </div>

        <?php include '../template/kerangka/footer_dashboard.php';?>
    </body>
</html>

<?php } ?>