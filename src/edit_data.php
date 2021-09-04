<?php

session_start();
if (!isset($_SESSION['username'])) {
	header("Location:logout.php");
}

include "koneksi.php";

//Update data
$npm = $_GET["npm"];

$sql = "SELECT npm, nama, alamat, tgl_lhr, jk, email FROM identitas where npm='$npm'";
$result = $conn->query($sql);
$mhs = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>

<head>
	<title>EDIT DATA MAHASISWA</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<center>
					<h1>EDIT DATA MAHASISWA</h1>
				</center>
				<br />
				<form action="edit.php" method="post">
					<input type="hidden" name="ubah" value="<?= $npm ?>">
					<div class="form-group">
						<label>NPM :</label>
						<input type="text" class="form-control" name="npm" value="<?= $mhs['npm']; ?>" required>
					</div>
					<div class="form-group">
						<label>NAMA :</label>
						<input type="text" class="form-control" name="nama" value="<?= $mhs['nama']; ?>" required>
					</div>
					<div class="form-group">
						<label>Alamat :</label>
						<textarea class="form-control" rows="3" name="alamat"><?= $mhs['alamat']; ?></textarea>
					</div>
					<div class="form-group">
						<label>Tanggal Lahir :</label>
						<input type="date" max="2020-10-20" class="form-control" name="tgl_lhr" value="<?= $mhs['tgl_lhr']; ?>">
					</div>

					<?php
					if ($mhs['jk'] === 'L') {
						echo "
					<div class='form-group'>
						<label>Jenis Kelamin :</label><br />
						<label class='radio-inline'><input type='radio' name='jk' value='L' checked> Laki-Laki</label>
						<label class='radio-inline'><input type='radio' name='jk' value='P'> Perempuan</label>
					</div>
					";
					} else if ($mhs['jk'] === 'P') {
						echo "
						<div class='form-group'>
							<label>Jenis Kelamin :</label><br />
							<label class='radio-inline'><input type='radio' name='jk' value='L'> Laki-Laki</label>
							<label class='radio-inline'><input type='radio' name='jk' value='P' checked> Perempuan</label>
						</div>
						";
					} else {
						echo "
							<div class='form-group'>
								<label>Jenis Kelamin :</label><br />
								<label class='radio-inline'><input type='radio' name='jk' value='L'> Laki-Laki</label>
								<label class='radio-inline'><input type='radio' name='jk' value='P'> Perempuan</label>
							</div>
							";
					}
					?>


					<div class="form-group">
						<label>Email :</label><br />
						<input type="email" class="form-control" name="email" value="<?= $mhs['email']; ?>">
					</div>
					<input type="submit" class="btn btn-primary" value="Edit" name="submit">
				</form>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
</body>

</html>