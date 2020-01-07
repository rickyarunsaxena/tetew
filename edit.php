<?php 
include("header.php"); // memanggil file header.php
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Data Pasien R.A.S &raquo; Edit Data</h2>
			<hr />
			
			<?php
			$nomor_kartu = $_GET['nomor_kartu']; // assigment nomor_kartu dengan nilai nomor_kartu yang akan diedit
			$sql = mysqli_query($koneksi, "SELECT * FROM pasien WHERE nomor_kartu='$nomor_kartu'"); // query untuk memilih entri data dengan nilai nomor_kartu terpilih
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){ // jika tombol 'Simpan' dengan properti name="save" pada baris 162 ditekan
				$nomor_kartu	 = $_POST['nomor_kartu'];
				$nik		     = $_POST['nik'];
				$nama		     = $_POST['nama'];
				$jenis_kelamin   = $_POST['jenis_kelamin'];
				$tempat_lahir	 = $_POST['tempat_lahir'];
				$tanggal_lahir	 = $_POST['tanggal_lahir'];
				$alamat 		 = $_POST['alamat'];
				$no_telepon		 = $_POST['no_telepon'];		
				$asuransi	     = $_POST['asuransi'];
				$rawat	     	 = $_POST['rawat'];
				
				$update = mysqli_query($koneksi, "UPDATE pasien SET nik='$nik', nama='$nama', jenis_kelamin='$jenis_kelamin', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', no_telepon='$no_telepon', asuransi='$asuransi', rawat='$rawat' WHERE nomor_kartu='$nomor_kartu'") or die(mysqli_error()); // query untuk mengupdate nilai entri dalam database
				if($update){ // jika query update berhasil dieksekusi
					header("Location: edit.php?nomor_kartu=".$nomor_kartu."&pesan=sukses"); // tambahkan pesan=sukses pada url
				}else{ // jika query update gagal dieksekusi
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data pasien gagal disimpan, silahkan coba lagi.</div>'; // maka tampilkan 'Data gagal disimpan, silahkan coba lagi.'
				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){ // jika terdapat pesan=sukses sebagai bagian dari berhasilnya query update dieksekusi
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data pasien berhasil disimpan. <a href="data.php"><- Kembali</a></div>'; // maka tampilkan 'Data berhasil disimpan.'
			}
			?>
			<!-- bagian ini merupakan bagian form untuk mengupdate data yang akan dimasukkan ke database -->
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Nomor Kartu</label>
					<div class="col-sm-2">
						<input type="text" name="nomor_kartu" value="<?php echo $row ['nomor_kartu']; ?>" class="form-control" placeholder="nomor_kartu" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">NIK</label>
					<div class="col-sm-4">
						<input type="text" name="nik" value="<?php echo $row ['nik']; ?>" class="form-control" placeholder="Nomor Induk Keluarga" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama</label>
					<div class="col-sm-4">
						<input type="text" name="nama" value="<?php echo $row ['nama']; ?>" class="form-control" placeholder="Nama" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jenis Kelamin</label>
					<div class="col-sm-2">
						<select name="jenis_kelamin" class="form-control" required>
							<option value=""> - Jenis Kelamin - </option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tempat Lahir</label>
					<div class="col-sm-4">
						<input type="text" name="tempat_lahir" value="<?php echo $row ['tempat_lahir']; ?>" class="form-control" placeholder="Tempat Lahir" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal Lahir</label>
					<div class="col-sm-4">
						<input type="text" name="tanggal_lahir" value="<?php echo $row ['tanggal_lahir']; ?>" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Alamat</label>
					<div class="col-sm-3">
						<textarea name="alamat" class="form-control" placeholder="Alamat Lengkap"><?php echo $row ['alamat']; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">No Telepon</label>
					<div class="col-sm-3">
						<input type="text" name="no_telepon" value="<?php echo $row ['no_telepon']; ?>" class="form-control" placeholder="No Telepon" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jalur Asuransi</label>
					<div class="col-sm-2">
						<select name="asuransi" class="form-control" required>
							<option value=""> - Pilih Asuransi - </option>
							<option value="BPJS">BPJS</option>
							<option value="Prudential">Prudential</option>
							<option value="Allianz">Allianz</option>
							<option value="Sinarmas">Sinarmas</option>
							<option value="AXA">AXA Mandiri</option>
							<option value="Manulife">Manulife</option>
							<option value="Hostpitalife">Hostpitalife</option>
						</select>
					</div>
                    <div class="col-sm-3">
                    <b>Asuransi Sekarang :</b> <span class="label label-success"><?php echo $row['asuransi']; ?></span>
				    </div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jenis Rawat</label>
					<div class="col-sm-2">
						<select name="rawat" class="form-control" required>
							<option value=""> - Pilih Rawat - </option>
							<option value="Inap">Rawat Inap</option>
							<option value="Jalan">Rawat Jalan</option>
						</select>
					</div>
                    <div class="col-sm-3">
                    <b>Jenis Rawat Sekarang :</b> <span class="label label-success"><?php echo $row['rawat']; ?></span>
				    </div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Username</label>
					<div class="col-sm-2">
						<input type="text" name="username" value="<?php //echo $row['username']; ?>" class="form-control" placeholder="Username">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Password</label>
					<div class="col-sm-2">
						<input type="password" name="pass1" value="<?php //echo $row['password']; ?>" class="form-control" placeholder="Password">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data pasien">
						<a href="data.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form>
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>