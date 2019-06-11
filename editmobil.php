<div class="page-header">
	<h3>Edit Mobil</h3>
</div>
<?php foreach($mobil as $b){ ?>
<form action="<?php echo base_url().'admin/update_mobil' ?>" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Kategori</label>
		<select name="id_kategori" class="form-control">
			<option value="<?php echo $b->id_kategori; ?>"><?php echo $b->nama_kategori; ?></option>
			<?php foreach($kategori as $k){ ?>
			<option value="<?php echo $k->id_kategori; ?>"><?php echo $k->nama_kategori; ?></option>
			<?php } ?>
		</select>
		<?php echo form_error('id_kategori'); ?>
	</div>

	<div class="form-group">
		<label>Nama Mobil</label>
		<input type="hidden" name="id" value="<?php echo $b->id_mobil; ?>">
		<input class="form-control" type="text" name="nama_mobil" value="<?php echo $b->nama_mobil; ?>">
		<?php echo form_error('nama_mobil'); ?>
	</div>

	<div class="form-group">
		<label>merek</label>
		<input class="form-control" type="text" name="merek" value="<?php echo $b->merek; ?>">
		<?php echo form_error('merek'); ?>
	</div>

	<div class="form-group">
		<label>Jumlah Mobil</label>
		<input class="form-control" type="text" name="jumlah_mobil" value="<?php echo $b->jumlah_mobil; ?>">
		<?php echo form_error('jumlah_mobil'); ?>
	</div>

	<div class="form-group">
		<label>Lokasi</label>
		<input class="form-control" type="text" name="lokasi" value="<?php echo $b->lokasi; ?>">
		<?php echo form_error('lokasi'); ?>
	</div>

	<div class="form-group">
		<label>Harga Sewa</label>
		<input class="form-control" type="text" name="harga_sewa" value="<?php echo $b->harga_sewa; ?>">
		<?php echo form_error('harga_sewa'); ?>
	</div>

	<div class="form-group">
		<label>Status</label>
		<select name="status" class="form-control">
			<option <?php if($b->status_mobil == "1"){echo "selected='selected'";} echo $b->status_mobil; ?> value="1">Tersedia</option>
			<option <?php if($b->status_mobil == "0"){echo "selected='selected'";} echo $b->status_mobil; ?> value="0">Sedang Di Pinjam</option>
		</select>
		<?php echo form_error('status'); ?>
	</div>

	<dir class="form-group">
		<label>Gambar</label>
		<?php
			if(isset($b->gambar)){
				echo '<input type="hidden" name="old_pict" value="'.$b->gambar.'">';
				echo '<img src="'.base_url().'assets/upload/'.$b->gambar.'" width="30%">';
			}
		?>
		<input name="foto" type="file" class="form-control">
	</dir>

	<div class="form-group">
		<input type="submit" value="Update" class="btn btnprimary">
	</div>
</form>
<?php } ?>