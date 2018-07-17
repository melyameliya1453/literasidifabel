<div id="page-inner" style="min-height: auto !important;">
	<div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line"><i class="fa fa-suitcase"></i> Daftar Kelas Difabel</h1>
            <h1 class="page-subhead-line">Tabel dibawah merupakan daftar kelas yang terdaftar</h1>
        </div>
    </div>

    <a class="btn btn-success btn-sm" data-toggle="modal" href='#modal-id'><i class="fa fa-plus"></i> Tambah Kelas</a>

    <br><br>

	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<th>No</th>
				<th>Nama Kelas</th>
				<th>Keterangan</th>
				<th>Aksi</th>
			</thead>
			<tbody>
				<?php
					$no10 = 1;
					while ($data1 = mysqli_fetch_array($query_jenis_kelas)) { ?>
						<tr>
							<td><?php echo $no10;?></td>
							<td><?php echo $data1["nama_jenis_kelas"];?></td>
							<td><?php echo $data1["keterangan"];?></td>
							<td>
								<a class="btn btn-info btn-sm" href="<?php echo home_base_url(); ?>inc/edit_jenis_kelas.php?id=<?php echo $data1["id_jenis_kelas"];?>"><i class="fa fa-pencil"></i> Edit</a>
								<a class="btn btn-danger btn-sm" onclick="return confirm('Hapus Kelas Ini?')" href="<?php echo home_base_url(); ?>inc/hapus_jenis_kelas.php?id=<?php echo $data1["id_jenis_kelas"];?>"><i class="fa fa-trash"></i> Hapus</a>
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

<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Kelas</h4>
			</div>
			<form action="<?php echo home_base_url(); ?>inc/tambah_jenis_kelas.php" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="">Nama Kelas</label>
						<input type="text" class="form-control" id="" name="nama_jenis_kelas" placeholder="Masukan nama kelas">
					</div>
					<div class="form-group">
						<label for="">Keterangan</label>
						<input type="text" class="form-control" id="" name="keterangan" placeholder="Masukan keterangan">
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