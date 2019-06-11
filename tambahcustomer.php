<div class="page-header">
	<h3>Customer Baru</h3>
</div>
<form action="<?php echo base_url().'admin/tambah_customer_act' ?>" method="post">
	<div class="form-group">
		<label>Nama Customer</label>
		<input class="form-control" type="text" name="nama_customer">
		<?php echo form_error('nama_customer'); ?>
	</div>

	<div class="form-group">
		<label>Password</label>
		<input class="form-control" type="password" name="password">
	</div>

	<div class="form-group">
		<label>Ulangi Password</label>
		<input class="form-control" type="password" name="ulangi_password">
	</div>

	<div class="form-group">
		<label>Jenis Kelamin</label><br>
		<input type="radio" name="gender" value="Laki-Laki"> Laki-Laki<br>
		<input type="radio" name="gender" value="Perempuan"> Perempuan
	</div>

	<div class="form-group">
		<label>No Telp</label>
		<input class="form-control" type="text" name="notelp">
	</div>

	<div class="form-group">
		<label>Alamat</label>
		<input class="form-control" type="textarea" name="alamat">
	</div>

	<div class="form-group">
		<label>Email</label>
		<input class="form-control" type="text" name="email">
		<?php echo form_error('email'); ?>
	</div>

	<div class="form-group">
		<input type="submit" value="Simpan" class="btn btnprimary">
	</div>
</div>
</form>