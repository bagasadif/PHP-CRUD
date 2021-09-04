<?php

session_start();
if (!isset($_SESSION['username'])) {
	header("Location:logout.php");
}

include "koneksi.php";
//Update data
$barcode = $_GET["barcode"];

$sql = "SELECT barcode, nama_barang, satuan, hbeli, hjual, stok FROM barang WHERE barcode='$barcode'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>

<head>
	<title>Edit Data Barang</title>
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
					<h2>Edit Data Barang</h2>
				</center>
				<br />
				<form action="edit.php" method="post">
					<input type="hidden" name="tabel" value="barang">
					<input type="hidden" name="ubah" value="<?= $row['barcode'] ?>">
					<div class="form-group">
						<label>Barcode :</label>
						<input type="text" maxlength="20" class="form-control" name="barcode" value="<?= $row['barcode']; ?>" readonly>
					</div>
					<div class="form-group">
						<label>Nama Barang :</label>
						<input type="text" maxlength="50" class="form-control" name="nama_barang" value="<?= $row['nama_barang']; ?>" required>
					</div>
					<div class="form-group">
						<label>Satuan :</label>
						<input type="text" maxlength="5" class="form-control" name="satuan" value="<?= $row['satuan']; ?>">
					</div>
					<div class="form-group">
						<label>Harga Beli :</label>
						<input type="number" min="0" class="form-control" name="hbeli" value="<?= $row['hbeli']; ?>">
					</div>
					<div class="form-group">
						<label>Harga Jual :</label>
						<input type="number" min="0" class="form-control" name="hjual" value="<?= $row['hjual']; ?>">
					</div>
					<div class="form-group">
						<label>Stok :</label>
						<input type="number" min="0" class="form-control" name="stok" value="<?= $row['stok']; ?>">
					</div>
					<input type="submit" class="btn btn-primary" value="Submit" name="submit">
				</form>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
</body>

</html>