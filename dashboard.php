<?php
    include "koneksi.php";

    $pelanggan = "SELECT * FROM pelanggan";
    $jum_pelanggan = mysqli_query($koneksi, $pelanggan);

    $jumlah_pelanggan = mysqli_num_rows($jum_pelanggan);

    $admin = "SELECT * FROM admin";
    $jum_admin = mysqli_query($koneksi, $admin);
    $jumlah_admin = mysqli_num_rows($jum_admin);


    //mengambil data dari produk

    $produk = "SELECT SUM(Stok) as total FROM produk";
    $jum_produk = mysqli_query($koneksi, $produk);

    $barang = mysqli_fetch_assoc($jum_produk);
    $totalStok = $barang ['total'];

    

?>


<!doctype html>
<html lang="en">
  <head>
    <title>DashboardLandingpage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            background-size: cover;
            background-repeat: no-repeat;
            background-color: #f4f4f4; /* Warna latar belakang */
        }

        .navbar {
            overflow: hidden;
            background-color: #333;
            z-index: 2;
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

        .navbar a:hover,
        .dropdown:hover .dropbtn {
            background-color: red;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 243px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: center;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            z-index: 1;
            background-color: #333; /* Warna latar belakang sidebar */
            overflow-x: hidden;
            padding-top: 16px;
        }

        .sidebar a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 20px;
            color: white;
            display: block;
        }

        .sidebar a:hover {
            color: #f1f1f1;
        }

        .main {
            margin-left: 250px; /* Same as the width of the sidenav */
            padding: 20px 10px; /* Sesuaikan padding */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white; /* Warna latar belakang tabel */
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #333; /* Warna latar belakang header */
            color: white;
        }

        button {
            background-color: #4CAF50; /* Warna latar belakang tombol */
            color: white;
            padding: 8px 12px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049; /* Warna latar belakang tombol saat dihover */
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-top: 10px;
            box-sizing: border-box;
        }

        @media screen and (max-height: 450px) {
            .sidebar {
                padding-top: 15px;
            }
            .sidebar a {
                font-size: 18px;
            }
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
    </style>
  </head>
  <body>
    <div class="navbar">
        <a>ambatron store</a>
        <div class="dropdown" style="float: right; margin-right: 60px;">
          <button class="dropbtn">Selamat datang admin 
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
          <button type="submit" claas="btn" onclick="myFunction()">logout</button>
          <p id="demo"></p>
          <script>
function myFunction() {
  var txt;
  if (confirm("apakah anda yakin logout")) {
    window.location  = "LANDINGPAGE.html";
  } else {
    window.location = "dashboard.php";
  }
}
</script>

          </div>
        </div> 
    </div>

    <div class="sidebar">
    <a href="dashboard.php"><i class="	fa fa-child"></i> DASHBOARD</a>
    <br>
        <a href="tampilanpelanggan.php"><i class="	fa fa-child"></i> Pelanggan</a>
        <a href="tampilanproduk.php"><i class="fa fa-inbox"></i> Stock Barang</a>
        <a href="penjualan.php"><i class="fa fa-line-chart"></i> Penjualan</a>
        <a href="#"><i class="fa fa-home"></i> detailpenjualan</a>
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
      <h3>Admin</h3>
      <div class="ikon"><i class="fa fa-fw fa fa fa-user-circle-o"></i></div>
      <p class="icon"><?php echo "" . $jumlah_admin . "";?></p>
    </div>
  </div>
</div>


    </div>


  
  </body>
</html>

