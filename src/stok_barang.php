<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location:logout.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Stok Barang</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <style>
    table,
    th,
    td {
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="container">

    <?php
    include "koneksi.php";
    //tampilkan data 

    $sql = "SELECT barcode, nama_barang, satuan, hbeli, hjual, stok FROM barang";
    $result = $conn->query($sql);
    ?>
    <center>
      <h1>TOKO MAJU LANCAR</h1>
      <hr>
      <h2>Stok Barang Yang Sudah Masuk</h2>
    </center>
    <button type="button" class="btn btn-warning btn-lg" onclick="document.location.href='menu.php'">Menu Utama</button>
    <br><br>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>NO</th>
          <th>BARCODE</th>
          <th>NAMA BARANG</th>
          <th>SATUAN</th>
          <th>HARGA BELI</th>
          <th>HARGA JUAL</th>
          <th>STOK</th>
          <th>AKSI</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result->num_rows > 0) {
          // output data of each row
          $no = 0;
          while ($row = $result->fetch_assoc()) {
            $no++;
        ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $row["barcode"]; ?></td>
              <td><?php echo $row["nama_barang"]; ?></td>
              <td><?php echo $row["satuan"]; ?></td>
              <td>Rp<?php echo $row["hbeli"]; ?></td>
              <td>Rp<?php echo $row["hjual"]; ?></td>
              <td><?php echo $row["stok"]; ?></td>
              <td><a href="edit_data_barang.php?barcode=<?= $row["barcode"]; ?>" class="btn-xs btn-info" role="button"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                <a href="delete.php?tabel=barang&barcode=<?= $row["barcode"]; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $row["nama_barang"] ?> ?');" class="btn-xs btn-danger" role="button"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
              </td>
            </tr>
        <?php
          }
        } else {
          echo "0 results";
        }

        $conn->close();
        ?>
      </tbody>
    </table>
    <form action="input_data_barang.php" method="post">
      <input type="submit" class="btn btn-primary" value="Input Data Barang" name="Submit">
    </form>
  </div>
</body>

</html>