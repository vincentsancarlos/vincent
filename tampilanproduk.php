<?php
    include "koneksi.php";

    $table = "SELECT * FROM produk";
    $data = mysqli_query($koneksi,$table);
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
        .btn {
  background-color: #ddd;
  border: none;
  color: black;
  padding: 16px 32px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  transition: 0.3s;
}

.btn:hover {
  background-color: #3e8e41;
  color: white;
}

        @media screen and (max-height: 450px) {
            .sidebar {
                padding-top: 15px;
            }
            .sidebar a {
                font-size: 18px;
            }
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
          <button type="submit" claas="btn" onclick="keluar()">logout</button>
          <p id="demo"></p>
          <script>
function keluar() {
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
        <a href="#"><i class="fa fa-home"></i> Landingpage</a>
    </div>

    <div class="main">
       

<h2>Data Produk</h2>
 <a href="inputproduk.html"><button>tambah produk</button></a>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

    <table id="myTable" border="solid">
        <thead>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Stok</th>
        <th colspan="2">AKSI</th>
        </thead>
        <?php 
        while ($tampil = mysqli_fetch_assoc($data)){
        ?>
        <tbody>
            <tr>
            <td><?php echo $tampil['NamaProduk'];?></td>
            <td><?php echo $tampil['Harga'];?></td>
            <td><?php echo $tampil['Stok'];?></td>
            <td><button type="submit" name="edit"><a style="color: black;text-decoration:none"style="color: black;text-decoration:none" href="editproduk.php?ProdukID=<?php echo $tampil['ProdukID'];?>">EDIT</a></button></td>
            <td><button type="text"><a style="color: black;text-decoration:none" href="hapusproduk.php?ProdukID=<?php echo $tampil['ProdukID'];?>">Hapus</a></button></td>
            </tr>
            <?php
        }
            ?>
        </tbody>
    </table>


    <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
    </div>

  
  </body>
</html>

