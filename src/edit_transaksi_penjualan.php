<?php
session_start();
if (!isset($_SESSION['username'])) {
	header("Location:logout.php");
}

include "koneksi.php";
//Update data
$idjual = $_GET["idjual"];

$sql = "SELECT idjual, tanggal_jual, keterangan_jual FROM jual WHERE idjual='$idjual'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sql_date = $row['tanggal_jual']; //sql timestamp
$tanggal_jual = date('Y-m-d\TH:i', strtotime($sql_date));
?>
<!DOCTYPE html>
<html>

<head>
	<title>Edit Transaksi Penjualan</title>
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
					<h2>Edit Transaksi Penjualan</h2>
				</center>
				<br />
				<form action="edit.php" method="post">
					<input type="hidden" name="tabel" value="jual">
					<input type="hidden" name="idjual" value="<?= $idjual ?>">
					<div class="form-group">
						<label>Tanggal Jual :</label>
						<input type="datetime-local" max="50" class="form-control" name="tanggal_jual" required value="<?= $tanggal_jual ?>">
					</div>
					<div class="form-group">
						<label>Keterangan Jual :</label>
						<br>
						<textarea name="keterangan_jual" max="255" class="form-control" rows="6"><?= $row['keterangan_jual'] ?></textarea>
					</div>
					<input type="submit" class="btn btn-primary" value="Submit" name="submit">
				</form>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>

</body>

</html>