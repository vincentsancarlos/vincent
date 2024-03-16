<?php
include "koneksi.php";

if(isset($_POST['submit'])){
    $NamaProduk = $_POST['NamaProduk'];
    $Harga = $_POST['Harga'];
    $Stok = $_POST['Stok'];

    $produk = "INSERT INTO produk (NamaProduk, Harga, Stok)
VALUES ('$NamaProduk', '$Harga', '$Stok')";

if ($koneksi->query($produk) === TRUE) {
    ?>
    <script>
        alert('Data berhasil ditambahkan');
        window.location="tampilanproduk.php";
    </script>

<?php
} else {
  echo "Error: " . $produk . "<br>" . $koneksi->error;
}
$koneksi->close();
}
?>