<div class="page-header">
	<h3>Edit Customer</h3>
</div>
<?php foreach($customer as $b){ ?>
<form action="<?php echo base_url().'admin/update_customer' ?>" method="post">
	<div class="form-group">
		<label>Nama Customer</label>
		<input type="hidden" name="id" value="<?php echo $b->id_customer; ?>">
		<input class="form-control" type="text" name="nama_customer" value="<?php echo $b->nama_customer; ?>">
		<?php echo form_error('nama_customer'); ?>
	</div>

	<div class="form-group">
		<label>Jenis Kelamin</label>
		<input class="form-control" type="text" name="gender" value="<?php echo $b->gender; ?>">
		<?php echo form_error('gender'); ?>
	</div>

	<div class="form-group">
		<label>No Telp</label>
		<input class="form-control" type="text" name="notelp" value="<?php echo $b->no_telp; ?>">
		<?php echo form_error('notelp'); ?>
	</div>

	<div class="form-group">
		<label>Alamat</label>
		<input class="form-control" type="text" name="alamat" value="<?php echo $b->alamat; ?>">
		<?php echo form_error('alamat'); ?>
	</div>

	<div class="form-group">
		<label>Email</label>
		<input class="form-control" type="text" name="email" value="<?php echo $b->email; ?>" >
		<?php echo form_error('email'); ?>
	</div>

	<div class="form-group">
		<input type="submit" value="Update" class="btn btnprimary">
	</div>
</form>
<?php } ?>