<title>Jenis Kelas - Literasi Difabel</title>

<div id="page-inner" style="min-height: auto !important">
	<div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line"><i class="fa fa-users"></i> Anggota Kelas</h1>
            <h1 class="page-subhead-line">Tabel dibawah merupakan anggota kelas yang terdaftar</h1>
        </div>
    </div>

    <a class="btn btn-success btn-sm" data-toggle="modal" href="#modal-tambah-anggota"><i class="fa fa-plus"></i> Tambah Anggota</a>

    <br><br>

	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<th>No</th>
				<th>Nama Lengkap</th>
				<th>Gender</th>
				<th>Umur</th>
				<th>Alamat</th>
				<th>Kelas</th>
				<th>Aksi</th>
			</thead>
			<tbody>
				<?php
					$no10 = 1;
					while ($data1 = mysqli_fetch_array($query_anggota_kelas)) { ?>
						<tr>
							<td><?php echo $no10;?></td>
							<td><?php echo $data1["nama_anggota"];?></td>
							<td><?php echo $data1["jk"];?></td>
							<td><?php echo date("Y") - $data1["tahun_lahir"];?></td>
							<td><?php echo $data1["alamat"];?></td>
							<td><?php echo $data1["nama_kelas"];?></td>
							<td>
								<a class="btn btn-info btn-sm" href="<?php echo home_base_url() ?>inc/edit_anggota_kelas.php?id=<?php echo $data1["id_anggota"];?>"><i class="fa fa-pencil"></i> Edit</a>
								<a class="btn btn-danger btn-sm" onclick="return confirm('Hapus Anggota Ini?')" href="<?php echo home_base_url() ?>inc/hapus_anggota_kelas.php?id=<?php echo $data1["id_anggota"];?>"><i class="fa fa-trash"></i> Hapus</a>
							</td>
						</tr>
					<?php
						$no10++;
					}
				?>
			</tbody>
		</table>
	</div>
</div>

<div class="modal fade" id="modal-tambah-anggota">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Anggota</h4>
			</div>
			<form action="<?php echo home_base_url() ?>inc/tambah_anggota_kelas.php" method="POST" enctype="multipart/form-data">
				<div class="container-fluid">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-7 col-xs-12">
								<div class="form-group">
									<label for="">Nama Lengkap</label>
									<input type="text" class="form-control" id="" name="nama_anggota" placeholder="Masukan nama anggota" autofocus required="">
								</div>
							</div>

							<div class="col-md-5 col-xs-12">
								<div class="form-group">
									<label for="">Nama Kelas</label>
									<select required name="nama_kelas" class="form-control">
		                                <option>Dongeng</option>
		                                <option>Laskar</option>
		                                <option>Hompimpa</option>
		                            </select>

								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="">Jenis Kelamin</label><br>
							<label class="radio-inline">
								<input type="radio" name="jk" id="inlineRadio1" value="L" checked required> Laki-Laki
							</label>
							<label class="radio-inline">
								<input type="radio" name="jk" id="inlineRadio1" value="P" required> Perempuan
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
									<select required name="bulan_lahir" class="form-control">
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
									<select required name="tahun_lahir" class="form-control">
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
							<label for="">Alamat</label>
							<textarea class="form-control" name="alamat" rows="3" required></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
					<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

