<?php
include "header.php";
include "navbar.php";
?>
<div class="container" style="width:80%; margin-left: 225px; margin-top: 30px;">
<div class="card mt-2">
	<div class="card-body"">
		<div class="row">
			<div class="col-sm-4">
				<div class="card bg-secondary text-white">
					<div class="card-body">
					<h4><b><i class="fas fa-box"> Data Barang</i></b></h4>
						<?php
						include '../koneksi.php';
						$data_produk = mysqli_query($koneksi,"SELECT * FROM produk");
						$jumlah_produk = mysqli_num_rows($data_produk);
						?>
						<h3><?php echo $jumlah_produk; ?></h3>
						<a href="data_barang.php" class="btn btn-outline-warning btn-sm">Detail</a>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="card bg-dark text-white"">
					<div class="card-body">
						<h4><b><i class="fas fa-cart-shopping"> Data Pembelian</i></b></h4>
						<?php
						include '../koneksi.php';
						$data_penjualan = mysqli_query($koneksi,"SELECT * FROM penjualan");
						$jumlah_penjualan = mysqli_num_rows($data_penjualan);
						?>
						<h3><?php echo $jumlah_penjualan; ?></h3>
						<a href="pembelian.php" class="btn btn-outline-primary btn-sm">Detail</a>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="card bg-success text-white">
					<div class="card-body">
						<h4><b><i class="fas fa-user"> Data Pengguna</i></b></h4>
						<?php
						include '../koneksi.php';
						$data_petugas = mysqli_query($koneksi,"SELECT * FROM petugas");
						$jumlah_petugas = mysqli_num_rows($data_petugas);
						?>
						<h3><?php echo $jumlah_petugas; ?></h3>
						<a href="data_pengguna.php" class="btn btn-outline-light btn-sm">Detail</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="card mt-2">
	<div class="card-body">
		<i><h6><p>Selamat datang dihalaman administrator, silahkan anda bisa mengakses beberapa fitur</p></h6></i>
	</div>
</div>
</div>

<div style="margin-top:140px;">

<?php
include "footer.php";
?>
</div>