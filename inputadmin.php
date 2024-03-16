<?php
include "koneksi.php";

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $admin = "INSERT INTO admin (username, password)
VALUES ('$username', '$password')";

if ($koneksi->query($admin) === TRUE) {
    ?>
    <script>
        alert('Data berhasil ditambahkan');
        window.location="login.html";
    </script>

<?php
} else {
  echo "Error: " . $admin . "<br>" . $koneksi->error;
}
$koneksi->close();
}
?>