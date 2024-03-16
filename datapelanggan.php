<?php
    include "koneksi.php";

    $table = "SELECT * FROM pelanggan";
    $data = mysqli_query($koneksi,$table);
?>

<style>
    * {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>
</head>
<body>
<h2>Data Pelanggan</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

    <table id="myTable" border="solid">
        <thead>
        <th>Nama Pelanggan</th>
        <th>Alamat</th>
        <th>Nomor Telepon</th>
        <th colspan="2">AKSI</th>
        </thead>
        <?php 
        while ($tampil = mysqli_fetch_assoc($data)){
        ?>
        <tbody>
            <tr>
            <td><?php echo $tampil['NamaPelanggan'];?></td>
            <td><?php echo $tampil['Alamat'];?></td>
            <td><?php echo $tampil['NomorTelepon'];?></td>
            <td><button type="submit" name="edit"><a style="color: black;text-decoration:none"style="color: black;text-decoration:none" href="editpelanggan.php?PelangganID=<?php echo $tampil['PelangganID'];?>">EDIT</a></button></td>
            <td><button type="text"><a style="color: black;text-decoration:none" href="hapuspelanggan.php?PelangganID=<?php echo $tampil['PelangganID'];?>">Hapus</a></button></td>
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

</body>
</html>