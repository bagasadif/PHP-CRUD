<!DOCTYPE html>
<html>

<head>
	<title>Halaman Login</title>
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
					<h2>Halaman Login</h2>
				</center>
				<br />
				<form action="login.php" method="post">
					<div class="form-group">
						<label>Username :</label>
						<input type="text" class="form-control" name="username" max="15" required>
					</div>
					<div class="form-group">
						<label>Password :</label>
						<input type="password" class="form-control" name="password" max="15" required>
					</div>
					<input type="submit" class="btn btn-primary" value="Submit" name="submit">
					<div class="text-right">
						<a href="register_page.php">Belum punya akun</a>
					</div>
				</form>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
</body>

</html>