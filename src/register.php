<?php
include "koneksi.php";

//input data
if (isset($_POST['submit'])) {
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);

  $sql = "INSERT INTO user (username, password)
   VALUES ('$username', '$password') ";
  if ($conn->query($sql) === TRUE) {
    // redirect ke halaman tampil data
    echo "
      <script>
        alert('AKUN BERHASIL DITAMBAHKAN!');
        document.location.href = 'login_page.php';
      </script>
      ";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
$conn->close();
