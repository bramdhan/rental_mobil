<div class="page-header">
	<h3>Transaksi Baru</h3>
</div>
<form action="<?php echo base_url().'admin/tambah_peminjaman_act/' ?>" method="post">
	
	<div class="form-group">
		<label>Customer</label>
		<select name="customer" class="form-control">
			<option value="">-Pilih Customer-</option>
			<?php foreach($customer as $a){ ?>
			<option value="<?php echo $a->id_customer; ?>"><?php echo $a->nama_customer; ?></option>
			<?php } ?>
		</select>
		<?php echo form_error('customer'); ?>
	</div>

	<div class="form-group">
		<label>Mobil</label>
		<select name="mobil" class="form-control">
			<option value="">-Pilih Mobil-</option>
			<?php foreach($mobil as $b){ ?>
			<option value="<?php echo $b->id_mobil; ?>"><?php echo $b->nama_mobil; ?></option>
			<?php } ?>
		</select>
		<?php echo form_error('mobil'); ?>
	</div>

	<div class="form-group">
		<label>Tanggal Pinjam</label>
		<input type="date" name="tgl_pinjam" class="form-control">
		<?php echo form_error('tgl_pinjam'); ?>
	</div>

	<div class="form-group">
		<label>Tanggal Kembali</label>
		<input type="date" name="tgl_kembali" class="form-control">
		<?php echo form_error('tgl_kembali'); ?>
	</div>

	<div class="form-group">
		<label>Harga Denda / Hari</label>
		<input type="text" name="denda" class="form-control">
		<?php echo form_error('denda'); ?>
	</div>

	<div class="form-group">
		<input type="submit" value="Simpan" class="btn btnprimary btn-sm">
	</div>
</form>