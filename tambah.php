<?php 
include("header.php"); // memanggil file header.php
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Data Pasien R.A.S &raquo; Tambah Data</h2>
			<hr />
			
			<?php
			if(isset($_POST['add'])){ // jika tombol 'Simpan' dengan properti name="add" pada baris 164 ditekan
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
				$username		 = $_POST['username'];
				$pass1	         = $_POST['pass1'];
				$pass2           = $_POST['pass2'];
				
				$cek = mysqli_query($koneksi, "SELECT * FROM pasien WHERE nomor_kartu='$nomor_kartu'"); // query untuk memilih entri dengan nik terpilih
				if(mysqli_num_rows($cek) == 0){ // mengecek apakah nik yang akan ditambahkan tidak ada dalam database
					if($pass1 == $pass2){ // mengecek apakah nilai pada pass1 dan pass2 bernilai sama
						$pass = md5($pass1); // assigment variabel pass dengan nilai pass1 yang sudah dienkripsi dengan md5
						$insert = mysqli_query($koneksi, "INSERT INTO pasien(nomor_kartu, nik, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, no_telepon, asuransi, rawat, username, password) VALUES('$nomor_kartu','$nik','$nama', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$no_telepon', '$asuransi', '$rawat', '$username', '$pass')") or die(mysqli_error()); // query untuk menambahkan data ke dalam database
						if($insert){ // jika query insert berhasil dieksekusi
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Pasien Berhasil Di Simpan. <a href="data.php"><- Kembali</a></div>'; // maka tampilkPasien Berhasil Di Simpan.'
						}else{ // jika query insert gagal dieksekusi
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Pasien Gagal Di simpan! <a href="data.php"><- Kembali</a></div>'; // maka tampilkan 'Ups, Data Pasien Gagal Di simpan!'
						}
					} else{ // mengecek jika password yang diinput tidak sama
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password Tidak sama!</div>'; // maka tampilkan 'Password Tidak sama!'
					}
				}else{ // mengecek jika nomor_kartu yang akan ditambahkan sudah ada dalam database
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Nomor Kartu Sudah Ada..! <a href="data.php"><- Kembali</a></div>'; // maka tampilkan  nomor_kartu Sudah Ada..!'
				}
			}
			?>
			<!-- bagian ini merupakan bagian form untuk menginput data yang akan dimasukkan ke database -->
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Nomor Kartu</label>
					<div class="col-sm-2">
						<input type="text" name="nomor_kartu" class="form-control" placeholder="Nomor Kartu" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">NIK</label>
					<div class="col-sm-2">
						<input type="text" name="nik" class="form-control" placeholder="Nomor Induk Keluarga" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Nama Lengkap</label>
					<div class="col-sm-4">
						<input type="text" name="nama" class="form-control" placeholder="Nama" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jenis Kelamin</label>
					<div class="col-sm-2">
						<select name="jenis_kelamin" class="form-control" required>
							<option value=""> ----- </option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tempat Lahir</label>
					<div class="col-sm-4">
						<input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal Lahir</label>
					<div class="col-sm-3">
						<input type="text" name="tanggal_lahir" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Alamat Lengkap</label>
					<div class="col-sm-3">
						<textarea name="alamat" class="form-control" placeholder="Alamat Lengkap"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">No Telepon</label>
					<div class="col-sm-3">
						<input type="text" name="no_telepon" class="form-control" placeholder="No Telepon" required>
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
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Username</label>
					<div class="col-sm-2">
						<input type="text" name="username" class="form-control" placeholder="Username">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Password</label>
					<div class="col-sm-2">
						<input type="password" name="pass1" class="form-control" placeholder="Password">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Ulangi Password</label>
					<div class="col-sm-2">
						<input type="password" name="pass2" class="form-control" placeholder="Ulangi Password">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data Pasien">
						<a href="index.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form> <!-- /form -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>