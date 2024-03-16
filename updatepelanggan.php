<?php
include "koneksi.php";

if (isset($_POST['edit'])) {
    $PelangganID = $_POST['PelangganID'];
    $NamaPelanggan = $_POST['NamaPelanggan'];
    $Alamat = $_POST['Alamat'];
    $NomorTelepon = $_POST['NomorTelepon'];

    // Jalankan query SQL untuk melakukan UPDATE
    $query = mysqli_query($koneksi, "UPDATE pelanggan SET NamaPelanggan='$NamaPelanggan', Alamat='$Alamat', NomorTelepon='$NomorTelepon' WHERE PelangganID='$PelangganID'");

    // Periksa apakah query berhasil dijalankan
    if ($query) {
        // Pesan berhasil jika query berhasil
?>
    <script>
        alert('Akun Anda Berhasil Diedit');
        window.location = "tampilanpelanggan.php";
    </script>
<?php
    } else {
        // Pesan kesalahan jika terjadi kesalahan saat menjalankan query
?>
    <script>
        alert('Terjadi kesalahan saat mengedit akun. Silakan coba lagi.');
        window.location = "tampilanpelanggan.php";
    </script>
<?php
        // Tampilkan pesan kesalahan MySQL jika ada
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
