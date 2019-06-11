<div class="x_panel" align="center">
	<div class="x_title">
		<h2><i class="fa fa-book"></i> Detail Mobil</h2>
		 <div class="clearfix"></div>
	</div>

	<div class="x_content">
	 <div class="row">
	  <div class="col-sm-3 col-md-3">
	   <div class="thumbnail" style="height: auto; position: relative; left:165%; width: auto;">
	    <img src="<?php echo base_url();?>assets/upload/<?=$gambar;?>"
	    style="max-width:100%; max-height: 100%; height: 150px; width: 120px">

	    <div class="caption">
	     <h4 style="min-height:40px;"align="center"><?=$merek?></h4>
	     <table class="table table-triped">
	      <tr>
	      	<td>Nama Mobil: </td><td><?=substr($nama_mobil,0,30).'..'?></td>
	      </tr>
	      	<td>Merek: </td><td><?=$merek?></td>
	      </tr>
	      	<td>Lokasi: </td><td><?=$lokasi?></td>
	      </tr>
	      	<td>Harga Sewa: </td><td><?=$harga_sewa?></td>
	      </tr>
	     </table>
	     <p>
	     	<a href="#" class="btn btn-primary" onclick="window.history.go(-1)"> Kembali</a>
              <?=anchor('peminjaman/tambah_pinjam/' . $id, ' Booking' , [
                'class' => 'btn btn-success',
                'role'  => 'button'
              ])?>
	     </p>
	 </div>
	</div>
</div>
</div>
</div>
</div>
