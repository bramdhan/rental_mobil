<html lang="en">
    <head>
        <title>Rental Mobil |</title>
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css" />
        <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'; ?>"></script>
    </head>
    <body>
        <body background="assets/mobil.png">
        <div><?php $this->load->view('toplayout') ?></div>
        <?php if($this->session->flashdata())
            {
                echo "<div class='alert alert-danger alert-primary'>";
                echo $this->session->flashdata('alert');
                echo "</div>";
            } ?>
    <div style="padding: 50px;">
     <div class="x_panel">
      <div class="x_title">
       <div class="page-header">
        <h3><?=$header?></h3>
      </div>
        <div class="clearfix"></div>
      </div>

      <div class="x_content">
      <!-- Tampilkan semua produk -->
      <div class="row">
      <!-- looping products -->
        <?php foreach($mobil as $mobil) { ?>
        <div class="col-sm-3 col-md-3">
        <div class="thumbnail" style="height: 370px;">
            <img src="<?php echo base_url();?>assets/upload/<?=$mobil->gambar;?>"
            style="max-width:100%; max-height: 100%; height: 150px; width: 120px">
        <div class="caption">
        <h4 style="min-height:40px;"><?=$mobil->merek?></h4>
        <p><?=substr($mobil->merek,0,30)?></p>
        <p><?=substr($mobil->nama_mobil,0,30)?></p>
        <p>
            <?=anchor('peminjaman/tambah_pinjam/' . $mobil->id_mobil, 'Booking' , [
            'class' => 'btn btn-primary',
            'role' => 'button'
            ])?>

            <?=anchor('mobil/katalog_detail/' . $mobil->id_mobil, 'Detail' ,[
            'class' => 'btn btn-warning glyphicon glyphicon-zoom-in',
            'role' => 'button'
            ])?>

     </p>
     </div>
     </div>
     </div>
     <?php } ?>
    <!-- end looping -->
     </div>
     </div>
     </div>
     </div>
     <script type="text/javascript">
     $('.alert-message').alert().delay(3000).slideup('slow');
</script>
    </body>
</html>

