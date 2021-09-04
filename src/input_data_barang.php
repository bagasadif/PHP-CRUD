<?php
session_start();
if (!isset($_SESSION['username'])) {
	header("Location:logout.php");
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Input Data Barang</title>
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
					<h2>Input Data Barang</h2>
				</center>
				<br />
				<form action="input.php" method="post">
					<input type="hidden" name="tabel" value="barang">
					<div class="form-group">
						<label>Barcode :</label>
						<input type="text" maxlength="20" class="form-control" name="barcode" required>
					</div>
					<div class="form-group">
						<label>Nama Barang :</label>
						<input type="text" maxlength="50" class="form-control" name="nama_barang" required>
					</div>
					<div class="form-group">
						<label>Satuan :</label>
						<input type="text" maxlength="5" class="form-control" name="satuan">
					</div>
					<div class="form-group">
						<label>Harga Beli :</label>
						<input type="number" min="0" class="form-control" name="hbeli">
					</div>
					<div class="form-group">
						<label>Harga Jual :</label>
						<input type="number" min="0" class="form-control" name="hjual">
					</div>
					<div class="form-group">
						<label>Stok :</label>
						<input type="number" min="0" class="form-control" name="stok">
					</div>
					<input type="submit" class="btn btn-primary" value="Submit" name="submit">
				</form>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
</body>

</html>