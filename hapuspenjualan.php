<?php
include "koneksi.php";

$penjualanID = $_GET['penjualanID'];
$query = mysqli_query ($koneksi, "DELETE from penjualan WHERE penjualanID='$penjualanID'");

if ($query) {
    //Pesan berhasil
?>
<script>
    alert('Produk Berhasil Dihapus');
    window.location = "penjualan.php";
</script>
<?php
} else {
    //Pesan warning ketika terjadi kesalahan
?>
<script>
    alert('Data Tidak Bisa Dihapus, Karena Data Sudah Digunakan Pada Tabel Yang Lain, Harap Hapus Data Pada Tabel Ini');
    window.location = "penjualan.php";
</script>
<?php
}