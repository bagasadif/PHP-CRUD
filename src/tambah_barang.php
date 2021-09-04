<?php
session_start();
if (!isset($_SESSION['username'])) {
	header("Location:logout.php");
}

include "koneksi.php";
$sql = "SELECT barcode FROM barang";
$result = $conn->query($sql);
if (isset($_GET['idbeli'])) {
	$id = $_GET['idbeli'];
	$title = "Tambah Barang Pembelian";
	$table = "beli_detail";
}
if (isset($_GET['idjual'])) {
	$id = $_GET['idjual'];
	$title = "Tambah Barang Penjualan";
	$table = "jual_detail";
}
?>
<!DOCTYPE html>
<html>

<head>
	<title><?= $title ?></title>
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
					<h2><?= $title ?></h2>
					<h4>ID = <?= $id ?></h4>
				</center>
				<br />
				<form action="input.php" method="post">
					<input type="hidden" name="tabel" value="<?= $table ?>">
					<input type="hidden" name="id" value="<?= $id ?>">
					<div class="form-group">
						<label>Barcode :</label>
						<select name="barcode" id="barcode" required>
							<?php
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
							?>
									<option value="<?= $row['barcode'] ?>"><?= $row['barcode'] ?></option>
							<?php
								}
							}
							$conn->close();
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Quantity :</label>
						<br>
						<input type="number" class="form-control" min="0" required name="qty">
					</div>
					<input type="submit" class="btn btn-primary" value="Submit" name="submit">
				</form>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>

</body>

</html>