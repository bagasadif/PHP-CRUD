<?php
session_start();
if (!isset($_SESSION['username'])) {
	header("Location:logout.php");
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Menu Utama</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<center>
					<h1>TOKO MAJU LANCAR</h1>
					<hr>
					<h2>Menu Utama</h2>
				</center>
				<br />
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<button type="button" class="btn btn-primary btn-lg btn-block" onclick="document.location.href='stok_barang.php'">Stok Barang</button>
					<br><br>
					<button type="button" class="btn btn-success btn-lg btn-block" onclick="document.location.href='transaksi_pembelian.php'">Transaksi Pembelian</button>
					<br><br>
					<button type="button" class="btn btn-warning btn-lg btn-block" onclick="document.location.href='transaksi_penjualan.php'">Transaksi Penjualan</button>
					<br><br>
					<button type="button" class="btn btn-danger btn-lg btn-block" onclick="document.location.href='logout.php'">Logout</button>
				</div>
				<div class="col-md-3"></div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
</body>

</html>