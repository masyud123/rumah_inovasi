<div class="container-fluid ml-5">
	<h3><i class="fas fa-edit mb-3"></i> Edit Data Riwayat</h3>

	<?php foreach ($usulan as $usl) : ?>

		<form method="post" action="<?php echo base_url().'admin/data_riwayat/update' ?>">

			<div class= "row">
				<dt for="inputNama" class="col-sm-2 col-form-label">Inovator</dt>
				<div class="col-sm-5 mb-3">
					<input type="hidden" name="id" class="form-control" value="<?php echo $usl->id ?>">
					<input type="text" name="event" class="form-control" value="<?php echo $usl->user ?>">
				</div>
			</div>

			<div class= "row">
				<dt for="inputNama" class="col-sm-2 col-form-label">Nama Inovasi</dt>
				<div class="col-sm-5 mb-3">
					<input type="text" name="event" class="form-control" value="<?php echo $usl->judul ?>">
				</div>
			</div>

			<div class="row">
            <dt for="inputSatKer" class="col-sm-2 col-form-label">Status</dt>
	            <div class="col-sm-5 mb-3">
		            <select class="form-control" name="status">
		              <option><?php if ($usl->status == '1')
						              {echo'Melengkapi Data';}
						            elseif ($usl->status == '2')
						              {echo'Sedang Dinilai';} 
						            elseif ($usl->status == '3')
						              {echo'Selesai';}?></option>
		              <option value="2">Sedang Dinilai</option>
		              <option value="1">Melengkapi Data</option>
		            </select>
		        </div>
          	</div>

			<button type="submit" class="btn btn-primary btn-sm mt-3 mr-2"> Simpan
			</button>

			<a href="<?php echo base_url('admin/data_riwayat') ?>"><div class="btn btn-sm btn-secondary mt-3">Kembali</div></a>
		</form>
	<?php endforeach; ?>	
</div>