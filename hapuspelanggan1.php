<?php
include "koneksi.php";

$PelangganID = $_GET['PelangganID'];
$query = mysqli_query ($koneksi, "DELETE from pelanggan WHERE PelangganID='$PelangganID'");

if ($query) {
    //Pesan berhasil
?>
<script>
    alert('Pelanggan Berhasil Dihapus');
    window.location = "tampilanpelanggan.php";
</script>
<?php
} else {
    //Pesan warning ketika terjadi kesalahan
?>
<script>
    alert('Data Tidak Bisa Dihapus, Karena Data Sudah Digunakan Pada Tabel Yang Lain, Harap Hapus Data Pada Tabel Ini');
    window.location = "tampilanpenjualan.php";
</script>
<?php
}