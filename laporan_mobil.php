<div class="page-header">
  <h3>Cetak Data Mobil</h3>
</div>
<a class="btn btn-default btn-md" href="<?php echo base_url().'admin/laporan_print_mobil' ?>">
  <span class="glyphicon glyphicon-print"></span>
Print</a>
<a class="btn btn-warning btn-md" href="<?php echo base_url().'admin/laporan_pdf_mobil' ?>">
  <span class="glyphicon glyphicon-print"></span>
Cetak PDF</a>
<br><br>
<div class="table-responsive">
  <table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Mobil</th>
        <th>Merek</th>
        <th>Lokasi</th>
        <th>Harga Sewa</th>
    
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($mobil as $b) {
      ?>
      <tr>
        <td><?php echo $no++; ?></td>

        <td><?php echo $b->nama_mobil ?></td>
        <td><?php echo $b->merek ?></td>
        <td><?php echo $b->lokasi ?></td>
        <td><?php echo $b->harga_sewa ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
</div>
