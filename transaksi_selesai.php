<div class="page-header">
	<h3>Transaksi Selesai</h3>
</div>
<?php foreach($peminjaman as $p){ ?>
<form action="<?php echo base_url().'admin/transaksi_selesai_act' ?>" method="post">
	<input type="hidden" name="id" value="<?php echo $p->id_pinjam ?>">
	<input type="hidden" name="mobil" value="<?php echo $p->id_mobil ?>">
	<input type="hidden" name="tgl_kembali" value="<?php echo $p->tgl_kembali ?>">
	<input type="hidden" name="denda" value="<?php echo $p->denda ?>">
	<div class="form-group">
		<label>Customer</label>
		<select class="form-control" name="customer" disabled>
			<option value="">-Pilih Customer-</option>
			<?php foreach($customer as $k){ ?>
				<option <?php if($p->id_customer == $k->id_customer){echo "selected='selected'";} ?> value="<?php echo $k->id_customer; ?>"><?php echo $k->nama_customer; ?></option>
			<?php } ?>
		</select>
	</div>

	<div class="form-group">
		<label>Mobil</label>
		<select class="form-control" name="mobil" disabled>
			<option value="">-Pilih Mobil-</option>
			<?php foreach($mobil as $m){ ?>
			<option <?php if($p->id_mobil == $m->id_mobil){echo "selected='selected'";} ?> value="<?php echo $m->id_mobil; ?>"><?php echo $m->nama_mobil; ?></option>
			<?php } ?>
		</select>
	</div>

	<div class="form-group">
		<label>Tanggal Pinjam</label>
		<input class="form-control" type="date" name="tgl_pinjam" value="<?php echo $p->tgl_pinjam ?>" 
		disabled>
	</div>

	<div class="form-group">
		<label>Tanggal Kembali</label>
		<input class="form-control" type="date" name="tgl_kembali" value="<?php echo $p->tgl_kembali ?>"disabled>
	</div>

	<div class="form-group">
		<label>Harga Denda / Hari</label>
			<input class="form-control" type="text" name="denda" value="<?php echo $p->denda ?>" disabled>
	</div>

	<div class="form-group">
		<label>Tanggal Dikembalikan Oleh Customer</label>
		<input class="form-control" type="date" name="tgl_dikembalikan">
		<?php echo form_error('tgl_dikembalikan'); ?>
	</div>
	<div class="form-group">
		<input type="submit" value="Simpan" class="btn btnprimary btn-sm">
	</div>
</form>
<?php } ?>