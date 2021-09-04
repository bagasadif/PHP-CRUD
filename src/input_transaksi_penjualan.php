<?php
session_start();
if (!isset($_SESSION['username'])) {
	header("Location:logout.php");
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Input Transaksi Penjualan</title>
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
					<h2>Input Transaksi Penjualan</h2>
				</center>
				<br />
				<form action="input.php" method="post">
					<input type="hidden" name="tabel" value="jual">
					<div class="form-group">
						<label>Tanggal Jual :</label>
						<input type="datetime-local" max="50" class="form-control" name="tanggal_jual" required>
					</div>
					<div class="form-group">
						<label>Keterangan Jual :</label>
						<br>
						<textarea name="keterangan_jual" max="255" class="form-control" rows="6"></textarea>
					</div>
					<input type="submit" class="btn btn-primary" value="Submit" name="submit">
				</form>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>

</body>

</html>