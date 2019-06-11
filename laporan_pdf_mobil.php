<!DOCTYPE html>
<html>
<head>
 <title></title>
</head>
<body>
 <style type="text/css">
 .table-data{
   width: 100%;
   border-collapse: collapse;
  }

  .table-data tr th,
  .table-data tr td{
   border:1px solid black;
   font-size: 10pt;
  }
 </style>

 <h3>Laporan Data Mobil Rental Mobil Online</h3>
 <br/>
 <table class="table-data">
  <thead>
   <tr>
    <th>No</th>
    <th>Nama Mobil</th>
    <th>Merek</th>
    <th>Lokasi</th>
    <th>Hara Sewa</th>
   </tr>
  </thead>
  <tbody>
   
   <?php
   $no = 1;
   foreach($mobil as $b){
   ?>
   <tr>
     <td><?php echo $no++; ?></td>
     <td><?php echo $b->nama_mobil; ?></td>
     <td><?php echo $b->merek; ?></td>
     <td><?php echo $b->lokasi; ?></td>
     <td><?php echo $b->harga_sewa; ?></td>
   </tr>
   <?php
  }
  ?>
 </tbody>
</table>
</body>
</html>
