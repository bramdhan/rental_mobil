<div style="padding: 25px;">
<div class="page-header">
	<h3 style="position: relative; left: 25%">Data Penyewa</h3>
</div>
<div style="position: relative; left: 25%">
<table>
	<?php
		foreach ($customer as $a) {
	?>
	<tr><th>Nama Penyewa</th><th>:</th><th><?php echo $a->nama_customer; ?></th></tr>
	<tr><th>Alamat</th><th>:</th><th><?php echo $a->alamat; ?></th></tr>
	<?php } ?>
	<tr>
		<td colspan="3">
			<br/><br/>
			<div class="page-header">
				<h3>Data Mobil</h3>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover" id="table-datatable" >
					<thead>
						<tr>
							<th>No</th>
							<th>Gambar</th>
							<th>Nama Mobil</th>
							<th>Merek</th>
							<th>Lokasi</th>
							<th>Harga sewa</th>
							<th>Pilihan</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							foreach($peminjaman as $b){
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><img src="<?php echo base_url();?>assets/upload/<?php echo $b->gambar; ?>" width="70"></td>
							<td style="max-width: 200px"><?php echo $b->nama_mobil; ?></td>
							<td><?php echo $b->merek; ?></td>
							<td><?php echo $b->lokasi; ?></td>
							<td><?php echo $b->harga_sewa; ?></td>
							</form>
							<td>
								<a class="btn btn-sm btn-danger" href="<?php echo base_url().'peminjaman/hapus_keranjang/'.$b->id_mobil; ?>"><span class="glyphicon glyphicon-remove"></span> </a>
								<br/>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</td>
	</tr>
	<tr><td colspan="3"><hr></td></tr>
	<tr>
		<td align="left">
			<a class="btn btn-sm btn-primary" href="<?php echo base_url().'member'; ?>"><span class="glyphicon glyphicon-delete"></span> Lanjutkan Penyewaan Mobil</a>
		</td>
		<td>
			&nbsp;
		</td>
		<td align="right">
			<a class="btn btn-sm btn-success" href="<?php echo base_url().'peminjaman/selesai_booking/'.$this->session->userdata('id_cst'); ?>"><span class="glyphicon glyphicon-delete"></span> Selesaikan Booking</a>
		</td>
	</tr>
</table>
</div>
</div>
