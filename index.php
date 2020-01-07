<?php 
include("header.php"); // memanggil file header.php
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<!-- Start container -->
	<div class="container">
		<div class="content">
			<div class="jumbotron">
				<h1>Data Kartu Rumah Sakit R.A.S</h1>
				<p>Aplikasi input data Pasien Rumah Sakit || Ricky Arun Saxena - 1811102441118.</p>
				<a href="data.php" data-toggle="tooltip" title="Lihat Data Pasien" class="btn btn-info" role="button"><span class="glyphicon glyphicon-list"></span> Lihat Data Pasien</a>
				<a href="tambah.php" data-toggle="tooltip" title="Tambah Data Pasien" class="btn btn-success" role="button"><span class="glyphicon glyphicon-user"></span> Tambah Data</a>
			</div> <!-- /.jumbotron -->
		</div> <!-- /.content -->
	</div>
	<!-- End container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>