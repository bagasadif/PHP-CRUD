<?php
session_start();
if (!isset($_SESSION['username'])) {
	header("Location:logout.php");
}

include "koneksi.php";
//Update data
$idbeli = $_GET["idbeli"];

$sql = "SELECT idbeli, tanggal_beli, keterangan_beli FROM beli WHERE idbeli='$idbeli'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sql_date = $row['tanggal_beli']; //sql timestamp
$tanggal_beli = date('Y-m-d\TH:i', strtotime($sql_date));
?>
<!DOCTYPE html>
<html>

<head>
	<title>Edit Transaksi Pembelian</title>
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
					<h2>Edit Transaksi Pembelian</h2>
				</center>
				<br />
				<form action="edit.php" method="post">
					<input type="hidden" name="tabel" value="beli">
					<input type="hidden" name="idbeli" value="<?= $idbeli ?>">
					<div class="form-group">
						<label>Tanggal Beli :</label>
						<input type="datetime-local" max="50" class="form-control" name="tanggal_beli" required value="<?= $tanggal_beli ?>">
					</div>
					<div class="form-group">
						<label>Keterangan Beli :</label>
						<br>
						<textarea name="keterangan_beli" max="255" class="form-control" rows="6"><?= $row['keterangan_beli'] ?></textarea>
					</div>
					<input type="submit" class="btn btn-primary" value="Submit" name="submit">
				</form>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>

</body>

</html>