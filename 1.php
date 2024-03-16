<?php
    include "koneksi.php";

    $pelanggan = "SELECT * FROM pelanggan";
    $jum_pelanggan = mysqli_query($koneksi, $pelanggan);

    $jumlah_pelanggan = mysqli_num_rows($jum_pelanggan);

    $petugas = "SELECT * FROM petugas";
    $jum_petugas = mysqli_query($koneksi, $petugas);
    $jumlah_petugas = mysqli_num_rows($jum_petugas);

    $admin = "SELECT * FROM admin";
    $jum_admin = mysqli_query($koneksi, $admin);
    $jumlah_admin = mysqli_num_rows($jum_admin);


    //mengambil data dari produk

    $produk = "SELECT SUM(Stok) as total FROM produk";
    $jum_produk = mysqli_query($koneksi, $produk);

    $barang = mysqli_fetch_assoc($jum_produk);
    $totalStok = $barang ['total'];

    

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-size: cover;
}

* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}
.icon {
 
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
}
.container {
  padding: 16px;
}


.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 15%;
  border-radius: 100%;
}

.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 14px 76px;
  text-decoration: none;
  display: block;
  text-align: right;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.sidebar {
  height: 100%;
  width: 180px;
  position: fixed;
  z-index: 1;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 16px;
}

.sidebar a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 180px; /* Same as the width of the sidenav */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}

* {
  box-sizing: border-box;
}

.ikon {
  font-size: 50px;
}

</style>
</head>
<body>



<div class="navbar">
  <a href="#home">Toko Fry Banana</a>
  <div class="dropdown" style="float: right; margin-right: 30px;">
    <button class="dropbtn">Selamat Datang Admin
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="landingpage.html">Log Out</a>
     </div>
  </div> 
</div>

<div class="sidebar"> 
    <a href="dashboard.php"><i class="fa 	fa fa-home"></i> Dashboard</a>
    <br>
    <a href="tampilanpelanggan.php"><i class="fa fa-fw fa fa-users"></i> Pelanggan</a>
    <a href="tampilanproduk.php"><i class="fa fa-fw fa fa-hourglass-2"></i> Stok Barang</a>
    <a href="#services"><i class="fa fa-fw fa fa-line-chart"></i> Penjualan</a>
    <a href="landingpage.html"><i class="fa fa-fw	fa fa-power-off"></i> Log Out</a>
  </div>
  
  <div class="main"> 
    <div class="row">
  <div class="column">
    <div class="card">
      <h3>Pelanggan</h3>
      <div class="ikon">
      <i class="fa fa-fw fa fa-users"></i> </div>
      <p class="icon"><?php echo "" . $jumlah_pelanggan . "";?></p>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <h3>Produk</h3>
      <div class="ikon"><i class="fa fa-fw fa fa-hourglass-2"></i></div>
      <p class="icon"><?php echo "" . $totalStok . "";?></p>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <h3>Petugas</h3>
      <div class="ikon"><i class="fa fa-fw fa fa-address-card-o"></i></div>
      <p class="icon"><?php echo "" . $jumlah_petugas . "";?></p>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <h3>Admin</h3>
      <div class="ikon"><i class="fa fa-fw fa fa fa-user-circle-o"></i></div>
      <p class="icon"><?php echo "" . $jumlah_admin . "";?></p>
    </div>
  </div>
</div>

  </div>
</body>
</html>
