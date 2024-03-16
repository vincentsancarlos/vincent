<?php
include "koneksi.php";
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $login = mysqli_query($koneksi, "SELECT * FROM admin where
    username = '$username' AND password = '$password'");
    $cek = mysqli_num_rows($login);
    if ($cek){
        ?>
        <script>
        alert('USERNAME DAN PASSWORD BENAR');
        window.location = "DASHBOARD.php";
    </script>
        <?php
    } else {
        ?>
        <script>
        alert('USERNAME ATAU PASSWORD SALAH !! SILAHKAN DICEK KEMBALI.');
        window.location = "LOGIN.html";
    </script>
    <?php
    }
}
?>