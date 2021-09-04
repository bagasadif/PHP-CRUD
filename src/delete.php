<?php
include "koneksi.php";

//hapus data
$tabel = $_GET["tabel"];

if ($tabel == "barang") {
  $barcode = $_GET["barcode"];
  $sql1 = "delete from beli_detail where barcode='$barcode'";
  $conn->query($sql1);

  $sql2 = "delete from jual_detail where barcode='$barcode'";
  $conn->query($sql2);

  $sql3 = "delete from $tabel where barcode='$barcode'";

  if ($conn->query($sql3) === TRUE) {
    // redirect ke halaman tampil data
    echo "
      <script>
        alert('DATA BERHASIL DIHAPUS!');
        document.location.href = 'stok_barang.php';
      </script>
      ";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
} else if ($tabel == "beli") {
  $idbeli = $_GET["idbeli"];

  $sql1 = "delete from beli_detail where idbeli = $idbeli";
  $conn->query($sql1);

  $sql2 = "delete from $tabel where idbeli='$idbeli'";

  if ($conn->query($sql2) === TRUE) {
    // redirect ke halaman tampil data
    echo "
      <script>
        alert('DATA BERHASIL DIHAPUS!');
        document.location.href = 'transaksi_pembelian.php';
      </script>
      ";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
} else if ($tabel == "beli_detail") {
  $id_belidetail = $_GET["id_belidetail"];
  $id_beli = $_GET["id_beli"];
  $sql = "delete from $tabel where id_belidetail='$id_belidetail'";

  if ($conn->query($sql) === TRUE) {
    // redirect ke halaman tampil data
    echo "
      <script>
        alert('DATA BERHASIL DIHAPUS!');
        document.location.href = 'detail_transaksi_pembelian.php?idbeli=$id_beli';
      </script>
      ";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
} else if ($tabel == "jual") {
  $idjual = $_GET["idjual"];

  $sql1 = "delete from jual_detail where idjual = $idjual";
  $conn->query($sql1);

  $sql2 = "delete from $tabel where idjual='$idjual'";

  if ($conn->query($sql2) === TRUE) {
    // redirect ke halaman tampil data
    echo "
      <script>
        alert('DATA BERHASIL DIHAPUS!');
        document.location.href = 'transaksi_penjualan.php';
      </script>
      ";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
} else if ($tabel == "jual_detail") {
  $id_jualdetail = $_GET["id_jualdetail"];
  $id_jual = $_GET["id_jual"];
  $sql = "delete from $tabel where id_jualdetail='$id_jualdetail'";

  if ($conn->query($sql) === TRUE) {
    // redirect ke halaman tampil data
    echo "
      <script>
        alert('DATA BERHASIL DIHAPUS!');
        document.location.href = 'detail_transaksi_penjualan.php?idjual=$id_jual';
      </script>
      ";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
$conn->close();
