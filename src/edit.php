<?php
include "koneksi.php";

//input data
if (isset($_POST['submit'])) {
  $tabel = $_POST['tabel'];
  if ($tabel == "barang") {
    $ubah = $_POST['ubah'];
    $barcode = htmlspecialchars($_POST['barcode']);
    $nama_barang = htmlspecialchars($_POST['nama_barang']);
    $satuan = htmlspecialchars($_POST['satuan']);
    $hbeli = htmlspecialchars($_POST['hbeli']);
    $hjual = htmlspecialchars($_POST['hjual']);
    $stok = htmlspecialchars($_POST['stok']);

    $sql = "UPDATE `barang` SET `barcode`='$barcode',`nama_barang`='$nama_barang',`satuan`='$satuan',`hbeli`='$hbeli'
    ,`hjual`='$hjual', `stok`='$stok' WHERE `barcode`='$ubah'";
    if ($conn->query($sql) === TRUE) {
      // redirect ke halaman tampil data
      echo "
      <script>
        alert('DATA BERHASIL DIEDIT!');
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

    $sql = "UPDATE $tabel SET tanggal_jual='$tanggal_jual', keterangan_jual='$keterangan_jual' WHERE idjual='$idjual'";

    if ($conn->query($sql) === TRUE) {
      // redirect ke halaman tampil data
      echo "
      <script>
        alert('DATA BERHASIL DIEDIT!');
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

    $sql = "UPDATE $tabel SET tanggal_beli='$tanggal_beli', keterangan_beli='$keterangan_beli' WHERE idbeli='$idbeli'";

    if ($conn->query($sql) === TRUE) {
      // redirect ke halaman tampil data
      echo "
      <script>
        alert('DATA BERHASIL DIEDIT!');
        document.location.href = 'transaksi_pembelian.php';
      </script>
      ";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else {
    $id = $_POST['id'];
    $nama_qty = $_POST['nama_qty'];
    $nama_id = $_POST['nama_id'];
    $id_detail = htmlspecialchars($_POST['id_detail']);
    $barcode = htmlspecialchars($_POST['barcode']);
    $qty = htmlspecialchars($_POST['qty']);

    $sql = "UPDATE $tabel SET barcode='$barcode', $nama_qty = '$qty' WHERE $nama_id='$id_detail'";

    if ($tabel == 'beli_detail') {
      if ($conn->query($sql) === TRUE) {
        // redirect ke halaman tampil data
        echo "
      <script>
        alert('DATA BERHASIL DIEDIT!');
        document.location.href = 'detail_transaksi_pembelian.php?idbeli=$id';
      </script>
      ";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    } else {
      if ($conn->query($sql) === TRUE) {
        // redirect ke halaman tampil data
        echo "
      <script>
        alert('DATA BERHASIL DIEDIT!');
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
