<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location:logout.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Transaksi Pembelian</title>
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

    $sql = "SELECT idbeli, tanggal_beli, keterangan_beli FROM beli";
    $result = $conn->query($sql);
    ?>
    <center>
      <h1>TOKO MAJU LANCAR</h1>
      <hr>
      <h2>Transaksi Pembelian</h2>
    </center>
    <br>
    <button type="button" class="btn btn-warning btn-lg" onclick="document.location.href='menu.php'">Menu Utama</button>
    <br><br>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>NO</th>
          <th>ID BELI</th>
          <th>TANGGAL BELI</th>
          <th>KETERANGAN BELI</th>
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
              <td><?php echo $row["idbeli"]; ?></td>
              <td><?php echo $row["tanggal_beli"]; ?></td>
              <td><?php echo $row["keterangan_beli"]; ?></td>
              <td>
                <a href="detail_transaksi_pembelian.php?idbeli=<?= $row["idbeli"]; ?>" class="btn-xs btn-info" role="button"><span class="glyphicon glyphicon-zoom-in"></span> Detail</a>
                <a href="edit_transaksi_pembelian.php?idbeli=<?= $row["idbeli"]; ?>" class="btn-xs btn-success" role="button"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                <a href="delete.php?tabel=beli&idbeli=<?= $row["idbeli"]; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus transaksi dengan id = <?= $row["idbeli"] ?> ?');" class="btn-xs btn-danger" role="button"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
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
    <form action="input_transaksi_pembelian.php" method="post">
      <input type="submit" class="btn btn-primary" value="Input Transaksi Pembelian" name="Submit">
    </form>
  </div>
</body>

</html>