<?php
include "koneksi.php";

if(isset($_POST['submit'])){
    $NamaPelanggan = $_POST['NamaPelanggan'];
    $Alamat = $_POST['Alamat'];
    $Nomortelepon = $_POST['Nomertelepon'];

    $pelanggan = "INSERT INTO pelanggan (NamaPelanggan, Alamat, Nomertelepon)
VALUES ('$NamaPelanggan', '$Alamat', '$Nomortelepon')";

if ($koneksi->query($pelanggan) === TRUE) {
    ?>
    <script>
        alert('Data berhasil ditambahkan');
        window.location="tampilanpelanggan.php";
    </script>

<?php
} else {
  echo "Error: " . $pelanggan . "<br>" . $koneksi->error;
}
$koneksi->close();
}
?>s