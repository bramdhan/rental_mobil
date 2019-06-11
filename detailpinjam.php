<div class="page-header">
	<h3>Data peminjaman</h3>
</div>

<br/><br/>
<div class="table-responsive">
	<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td><h3>No Transaski</h3></td>
		</tr>
		<tr>
			<td>
				<table border="0" cellpadding="0" cellspacing="0">
					<td>Nama customer</td><td>:</td><td></td>
					<td>Alamat</td><td>:</td><td></td>
					<td>No Telp</td><td>:</td><td></td>
				</table>
			</td>
		</tr>
	</table>
	<table cellpadding="0" cellspacing="0" border="0" >
		<thead>
			<tr>
				<th>No</th>
				<th>Image</th>
				<th>Nama Mobil</th>
				<th>Merek</th>
				<th>Lokasi</th>
				<th>Pilihan</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 1;
				foreach($mobil as $p){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><img src="<?php echo base_url().'assets/image/'.$p->gambar; ?>" width="80" height="80"></td>
				<td><?php echo $p->Nama_Mobil; ?></td>
				<td><?php echo $p->Merek; ?></td>
				<td><?php echo $p->lokasi; ?> </td>
				<td>
					<a class="btn btn-sm btn-danger" href="<?php echo base_url().'admin/hapus_peminjaman/'.$p->id_mobil; ?>"><span class="glyphicon glyphicon-remove"></span> Batalkan</a>
				</td>
			</tr>
		<?php } ?>
		<tr>
			<td>
				<a class="btn btn-xs btn-succes" href="<?php echo base_url().'admin/tambah_pinjamonetomany/'.$p->id_pinjam; ?>"><span class="glyphicon glyphicon-remove"></span> Lanjutkan Peminjaman</a>
			</td>
			<td>
				<a class="btn btn-xs btn-primary" href="<?php echo base_url().'admin/checkout/'.$p->id_pinjam; ?>"><span class="glyphicon glyphicon-remove"></span> Checkout</a>
			</td>
		</tr>
		</tbody>
	</table>
</div>
