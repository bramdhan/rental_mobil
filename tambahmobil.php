<div class="page-header">
	<h3>Mobil Baru</h3>
</div>
<?= validation_errors('<p style="color:red;">','</p>'); ?>
<?php
if($this->session->flashdata())
	{
		echo "<div class='alert alert-danger alert-message'>";
		echo $this->session->flashdata('alert');
		echo "</div>";
	}
?>
<form action="<?php echo base_url().'admin/tambah_mobil_act' ?>" method="post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label>Kategori</label>
		<select name="id_kategori" class="form-control">
			<option value="">-Pilih Kategori-</option>
			<?php foreach($kategori as $k){ ?>
			<option value="<?php echo $k->id_kategori; ?>"><?php echo $k->nama_kategori; ?></option>
			<?php } ?>
		</select>
		<?php echo form_error('id_kategori'); ?>
	</div>

	<div class="form-group">
		<label>Nama Mobil</label>
		<input type="text" name="nama_mobil" class="form-control">
		<?php echo form_error('nama_mobil'); ?>
	</div>

	<div class="form-group">
		<label>Merek</label>
		<input type="text" name="merek" class="form-control">
	</div>

	<div class="form-group">
		<label>Jumlah Mobil</label>
		<input type="text" name="jumlah_mobil" class="form-control">
	</div>

	<div class="form-group">
		<label>Harga Sewa</label>
		<input type="text" name="harga_sewa" class="form-control">
	</div>

	<div class="form-group">
		<label>Lokasi</label>
		<input type="text" name="lokasi" class="form-control">
	</div>

	<div class="form-group">
		<label>Status Mobil</label>
		<select name="status" class="form-control">
			<option value="1">Tersedia</option>
			<option value="0">Sedang Di Pinjam</option>
		</select>
		<?php echo form_error('status'); ?>
	</div>

	<div class="form-group">
		<label>Gambar</label>
		<input name="foto" type="file" class="form-control">	
	</div>

	<div class="form-group">
		<input type="submit" value="Simpan" class="btn btnprimary">
	</div>
</div>
</form>