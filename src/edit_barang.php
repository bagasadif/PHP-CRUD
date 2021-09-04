<?php
session_start();
if (!isset($_SESSION['username'])) {
	header("Location:logout.php");
}

include "koneksi.php";
$sql = "SELECT barcode FROM barang";
$result = $conn->query($sql);
if (isset($_GET['id_belidetail'])) {
	$nama_id = "id_belidetail";
	$id = $_GET['id_beli'];
	$id_detail = $_GET['id_belidetail'];
	$title = "Edit Barang Pembelian";
	$table = "beli_detail";
	$qty = "qty_beli";
}
if (isset($_GET['id_jualdetail'])) {
	$nama_id = "id_jualdetail";
	$id = $_GET['id_jual'];
	$id_detail = $_GET['id_jualdetail'];
	$title = "Edit Barang Penjualan";
	$table = "jual_detail";
	$qty = "qty_jual";
}

$sql2 = "SELECT barcode, $qty FROM $table WHERE $nama_id = '$id_detail'";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();

$barcode = $row2['barcode'];
$quantity = $row2["$qty"];
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
				<form action="edit.php" method="post">
					<input type="hidden" name="tabel" value="<?= $table ?>">
					<input type="hidden" name="id_detail" value="<?= $id_detail ?>">
					<input type="hidden" name="id" value="<?= $id ?>">
					<input type="hidden" name="nama_qty" value="<?= $qty ?>">
					<input type="hidden" name="nama_id" value="<?= $nama_id ?>">
					<div class="form-group">
						<label>Barcode :</label>
						<select name="barcode" id="barcode" required>
							<?php
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
							?>
									<option value="<?= $row['barcode'] ?>" <?php if ($barcode == $row['barcode']) : ?>selected<?php endif; ?>><?= $row['barcode'] ?></option>
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
						<input type="number" class="form-control" min="0" required name="qty" value="<?= $quantity ?>">
					</div>
					<input type="submit" class="btn btn-primary" value="Submit" name="submit">
				</form>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>

</body>

</html>