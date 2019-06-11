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

 <h3>Laporan Data Customer rental Mobil Online</h3>
 <br/>
 <table class="table-data">
  <thead>
   <tr>
    <th>No</th>
    <th>nama_customer</th>
    <th>no.Telpon</th>
    <th>Alamat</th>
    <th>Email</th>
   </tr>
  </thead>
  <tbody>
   <?php
   $no = 1;
   foreach($customer as $a){
   ?>
   <tr>
     <td><?php echo $no++; ?></td>
     <td><?php echo $a->nama_customer; ?></td>
     <td><?php echo $a->no_telp; ?></td>
     <td><?php echo $a->alamat; ?></td>
     <td><?php echo $a->email; ?></td>
   </tr>
   <?php
  }
  ?>
 </tbody>
</table>

<script type="text/javascript">
 window.print();
</script>

</body>
</html>
