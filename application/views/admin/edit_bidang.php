<div class="container-fluid ml-5">
	<h3><i class="fas fa-edit mb-3"></i> Edit Data Bidang</h3>

	<?php foreach ($bidang as $bdg) : ?>

		<form method="post" action="<?php echo base_url().'admin/data_bidang/update' ?>">

			<div class= "row">
				<dt for="inputNama" class="col-sm-2 col-form-label">Bidang</dt>
				<div class="col-sm-5 mb-3">
					<input type="hidden" name="id" class="form-control" value="<?php echo $bdg->id ?>">
					<input type="text" name="bidang" class="form-control" value="<?php echo $bdg->bidang ?>">
				</div>
			</div>

			<button type="submit" class="btn btn-primary btn-sm mt-3 mr-2"> Simpan
			</button>

			<a href="<?php echo base_url('admin/data_bidang') ?>"><div class="btn btn-sm btn-secondary mt-3">Kembali</div></a>
		</form>
	<?php endforeach; ?>	
</div>