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
$row1 = $result->fetch_assoc();

$sql2 = "SELECT id_belidetail, barcode, qty_beli FROM beli_detail WHERE idbeli='$idbeli'";
$result2 = $conn->query($sql2);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Detail Transaksi Pembelian</title>
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
    <center>
      <h1>TOKO MAJU LANCAR</h1>
      <hr>
      <h2>Detail Transaksi Pembelian</h2>
    </center>
    <button type="button" class="btn btn-warning btn-lg" onclick="document.location.href='transaksi_pembelian.php'">Transaksi Pembelian</button>
    <br><br>
    <div class=text-right>
      <p>Tanggal Beli : <?= $row1['tanggal_beli'] ?></p>
    </div>
    <h4>ID Beli : <?= $row1['idbeli'] ?></h4>
    <p>Keterangan Beli : <?= $row1['keterangan_beli'] ?></p>
    <br>
    <h5>Data Barang :</h5>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>NO</th>
          <th>BARCODE</th>
          <th>NAMA BARANG</th>
          <th>SATUAN </th>
          <th>HARGA</th>
          <th>QUANTITY</th>
          <th>TOTAL</th>
          <th>AKSI</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result2->num_rows > 0) {
          // output data of each row
          $no = 0;
          $total_harga = 0;
          while ($row2 = $result2->fetch_assoc()) {
            $no++;
        ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $row2["barcode"]; ?></td>
              <?php
              $barcode = $row2["barcode"];
              $sql3 = "SELECT nama_barang, satuan, hbeli FROM barang WHERE barcode='$barcode'";
              $result3 = $conn->query($sql3);
              $row3 = $result3->fetch_assoc();
              $total = $row2["qty_beli"] * $row3["hbeli"];
              $total_harga = $total_harga + $total;
              ?>
              <td><?php echo $row3["nama_barang"]; ?></td>
              <td><?php echo $row3["satuan"]; ?></td>
              <td><?php echo $row3["hbeli"]; ?></td>
              <td><?php echo $row2["qty_beli"]; ?></td>
              <td><?php echo $total; ?></td>
              <td>
                <a href="edit_barang.php?id_beli=<?= $idbeli ?>&id_belidetail=<?= $row2["id_belidetail"]; ?>" class="btn-xs btn-success" role="button"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                <a href="delete.php?tabel=beli_detail&id_beli=<?= $idbeli ?>&id_belidetail=<?= $row2["id_belidetail"]; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus barang dengan barcode = <?= $row2["barcode"] ?> ?');" class="btn-xs btn-danger" role="button"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
              </td>
            </tr>
          <?php
          }
          ?>
          <tr>
            <td colspan="6">TOTAL SEMUA BARANG</td>
            <td><?= $total_harga ?></td>
            <td>-----------------------</td>
          </tr>
        <?php
        } else {
          echo "0 results";
        }

        $conn->close();
        ?>
      </tbody>
    </table>
    <div>
      <button type="button" class="btn btn-primary" onclick="document.location.href='tambah_barang.php?idbeli=<?= $idbeli ?>'">Tambah Barang</button>
    </div>
  </div>
</body>

</html>