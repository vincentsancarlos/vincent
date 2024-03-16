<?php
include "koneksi.php";

// Periksa apakah parameter 'PelangganID' disertakan dalam URL
if (!isset($_GET['PelangganID'])) {
    die("Parameter PelangganID tidak disertakan dalam URL.");
}

$PelangganID = $_GET['PelangganID'];

// Periksa apakah data dengan ID yang diberikan ada dalam database
$edit = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE PelangganID='$PelangganID'");
$data = mysqli_fetch_array($edit);
if (!$data) {
    die("Data tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
  background-color: dodgerblue;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
  
}

a {
    text-decoration: none;
    color: white;
}
.btn:hover {
  opacity: 1;
}
</style>
</head>
<body>

<form action="updatepelanggan.php" style="max-width:500px;margin:auto" method="post">
  <h2>Edit Pelanggan</h2>
  <div class="input-container">
    <input class="input-field" type="hidden" name="PelangganID"  value="<?php echo $data['PelangganID'];?>" required>
  </div>

  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Masukkan Nama Pelanggan" name="NamaPelanggan" value="<?php echo $data['NamaPelanggan'];?>">
  </div>

  <div class="input-container">
    <i class="fa fa-address-book icon"></i>
    <input class="input-field" type="text" placeholder="Alamat" name="Alamat" value="<?php echo $data['Alamat'];?>">
  </div>
  
  <div class="input-container">
    <i class="fa fa-phone icon"></i>
    <input class="input-field" type="text" placeholder="Nomor Telepon" name="NomorTelepon" value="<?php echo $data['NomorTelepon'];?>">
  </div>

  <button type="submit" name="edit" class="btn">Edit</button><br><br>
  <button type="text" class="btn"><a href="tampilanpelanggan.php">Batal Edit</button></a>

</form>

</body>
</html>
