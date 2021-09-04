<?php
include "koneksi.php";

//input data
if (isset($_POST['submit'])) {
  $tabel = $_POST['tabel'];

  if ($tabel == "barang") {
    $barcode = htmlspecialchars($_POST['barcode']);
    $nama_barang = htmlspecialchars($_POST['nama_barang']);
    $satuan = htmlspecialchars($_POST['satuan']);
    $hbeli = htmlspecialchars($_POST['hbeli']);
    $hjual = htmlspecialchars($_POST['hjual']);
    $stok = htmlspecialchars($_POST['stok']);

    $sql = "INSERT INTO $tabel (barcode, nama_barang, satuan, hbeli, hjual, stok) 
    VALUES ('$barcode', '$nama_barang', '$satuan', '$hbeli', '$hjual', '$stok')";

    if ($conn->query($sql) === TRUE) {
      // redirect ke halaman tampil data
      echo "
      <script>
        alert('DATA BERHASIL DITAMBAHKAN!');
        document.location.href = 'stok_barang.php';
      </script>
      ";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else if ($tabel == "jual") {
    $idjual = htmlspecialchars($_POST['idjual']);
    $tanggal_jual = htmlspecialchars($_POST['tanggal_jual']);
    $keterangan_jual = htmlspecialchars($_POST['keterangan_jual']);

    $sql = "INSERT INTO $tabel (idjual, tanggal_jual, keterangan_jual) 
    VALUES ('$idjual', '$tanggal_jual', '$keterangan_jual')";

    if ($conn->query($sql) === TRUE) {
      // redirect ke halaman tampil data
      echo "
      <script>
        alert('DATA BERHASIL DITAMBAHKAN!');
        document.location.href = 'transaksi_penjualan.php';
      </script>
      ";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else if ($tabel == "beli") {
    $idbeli = htmlspecialchars($_POST['idbeli']);
    $tanggal_beli = htmlspecialchars($_POST['tanggal_beli']);
    $keterangan_beli = htmlspecialchars($_POST['keterangan_beli']);

    $sql = "INSERT INTO $tabel (idbeli, tanggal_beli, keterangan_beli) 
    VALUES ('$idbeli', '$tanggal_beli', '$keterangan_beli')";

    if ($conn->query($sql) === TRUE) {
      // redirect ke halaman tampil data
      echo "
      <script>
        alert('DATA BERHASIL DITAMBAHKAN!');
        document.location.href = 'transaksi_pembelian.php';
      </script>
      ";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else {
    $id = htmlspecialchars($_POST['id']);
    $barcode = htmlspecialchars($_POST['barcode']);
    $qty_beli = htmlspecialchars($_POST['qty']);

    if ($tabel == "beli_detail") {
      $sql = "INSERT INTO $tabel (idbeli, barcode, qty_beli) 
    VALUES ('$id', '$barcode', '$qty_beli')";
      if ($conn->query($sql) === TRUE) {
        // redirect ke halaman tampil data
        echo "
      <script>
        alert('DATA BERHASIL DITAMBAHKAN!');
        document.location.href = 'detail_transaksi_pembelian.php?idbeli=$id';
      </script>
      ";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    } else {
      $sql = "INSERT INTO $tabel (idjual, barcode, qty_jual) 
    VALUES ('$id', '$barcode', '$qty_beli')";
      if ($conn->query($sql) === TRUE) {
        // redirect ke halaman tampil data
        echo "
      <script>
        alert('DATA BERHASIL DITAMBAHKAN!');
        document.location.href = 'detail_transaksi_penjualan.php?idjual=$id';
      </script>
      ";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  }
}
$conn->close();
