<?php
include "koneksi.php";

if(isset($_POST['submit'])){
    $TanggalPenjualan = $_POST['TanggalPenjualan'];
    $TotalHarga = $_POST['TotalHarga'];
    $PelangganID = $_POST['PelangganID'];

    $sql = "INSERT INTO penjualan (TanggalPenjualan, TotalHarga, PelangganID)
VALUES ('$TanggalPenjualan', '$TotalHarga', '$PelangganID')";

if ($koneksi->query($sql) === TRUE) {
    ?>
    <script>
        alert('Data berhasil ditambahkan');
        window.location="penjualan.php";
    </script>

<?php
} else {
  echo "Error: " . $sql . "<br>" . $koneksi->error;
}
$koneksi->close();
}
?>