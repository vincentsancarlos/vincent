<?php
include "koneksi.php";

if (isset($_POST['edit'])) {
    $penjualanID = $_POST['penjualanID'];
    $TanggalPenjualan = $_POST['TanggalPenjualan'];
    $TotalHarga = $_POST['TotalHarga'];
    $PelangganID = $_POST['PelangganID'];

    // Jalankan query SQL untuk melakukan UPDATE
    $query = mysqli_query($koneksi, "UPDATE penjualan SET penjualanID='$penjualanID', TanggalPenjualan='$TanggalPenjualan', TotalHarga='$TotalHarga' WHERE PelangganID='$PelangganID'");

    // Periksa apakah query berhasil dijalankan
    if ($query) {
        // Pesan berhasil jika query berhasil
?>
    <script>
        alert('Produk Anda Berhasil Diedit');
        window.location = "penjualan.php";
    </script>
<?php
    } else {
        // Pesan kesalahan jika terjadi kesalahan saat menjalankan query
?>
    <script>
        alert('Terjadi kesalahan saat mengedit penjualan. Silakan coba lagi.');
        window.location = "penjualan.php";
    </script>
<?php
        // Tampilkan pesan kesalahan MySQL jika ada
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>