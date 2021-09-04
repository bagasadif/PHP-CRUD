<?php
include "koneksi.php";

//input data
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $result = mysqli_query($conn, "select * from user where username = '$username' and password = '$password'");

  if (mysqli_num_rows($result) > 0) {
    $row = $result->fetch_assoc();
    session_start();
    $_SESSION['username'] = $username;
    // redirect ke halaman menu utama
    echo "
        <script>
        alert('BERHASIL LOGIN!');
        document.location.href = 'menu.php';
        </script>
        ";
  } else {
    // jika tidak berhasil login
    echo "
          <script>
          alert('USERNAME/PASSWORD YANG DIMASUKKAN SALAH!');
          document.location.href = 'login_page.php';
          </script>
          ";
  }
}

$conn->close();
