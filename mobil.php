<div class="page-header">
	<h3>Data Mobil</h3>
</div>
<a href="<?php echo base_url().'admin/tambah_mobil'; ?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span> Mobil Baru</a>
<br/><br/>
<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover" id="table-datatable">
		<thead>
			<tr>
				<th>No</th>
				<th>Gambar</th>
				<th>Nama Mobil</th>
				<th>Merek</th>
				<th>Lokasi</th>
				<th>Harga Sewa</th>
				<th>Status</th>
				<th>Pilihan</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 1;
				foreach($mobil as $b){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><img src="<?php echo base_url().'/assets/upload/'.$b->gambar; ?>" width="200" height="100" alt="gambar tidak ada"></td>
				<td><?php echo $b->nama_mobil ?></td>
				<td><?php echo $b->merek ?></td>
				<td><?php echo $b->lokasi ?></td>
				<td><?php echo $b->harga_sewa ?></td>
				<td>
					<?php
						if($b->status_mobil == "1"){
							echo "Tersedia";
						}else if($b->status_mobil == "0"){
							echo "Sedang Di Pinjam";
						}
					?>
				</td>
				<td nowrap="nowrap">
					<a class="btn btn-primary btn-xs" href="<?php echo base_url().'admin/edit_mobil/'.$b->id_mobil; ?>"><span class="glyphicon glyphicon-zoom-in"></span></a>
					<a class="btn btn-warning btn-xs" href="<?php echo base_url().'admin/hapus_mobil/'.$b->id_mobil; ?>"><span class="glyphicon glyphicon-remove"></span></a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>