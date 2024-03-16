<?php
include "koneksi.php";

if (isset($_POST['edit'])) {
    $ProdukID = $_POST['ProdukID'];
    $NamaProduk = $_POST['NamaProduk'];
    $Harga = $_POST['Harga'];
    $Stok = $_POST['Stok'];

    // Jalankan query SQL untuk melakukan UPDATE
    $query = mysqli_query($koneksi, "UPDATE produk SET NamaProduk='$NamaProduk', Harga='$Harga', Stok='$Stok' WHERE ProdukID='$ProdukID'");

    // Periksa apakah query berhasil dijalankan
    if ($query) {
        // Pesan berhasil jika query berhasil
?>
    <script>
        alert('Produk Anda Berhasil Diedit');
        window.location = "tampilanproduk.php";
    </script>
<?php
    } else {
        // Pesan kesalahan jika terjadi kesalahan saat menjalankan query
?>
    <script>
        alert('Terjadi kesalahan saat mengedit produk. Silakan coba lagi.');
        window.location = "tampilanproduk.php";
    </script>
<?php
        // Tampilkan pesan kesalahan MySQL jika ada
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
