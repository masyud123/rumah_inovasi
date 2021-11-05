<div class="container-fluid">
	
	<div>
		<a href="#" class="btn btn-primary btn-sm btn-icon-split mb-4" data-toggle="modal" data-target="#tambah_nominator">
      <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
      </span>
      <span class="text">Tambah Keterangan</span>
    </a>
		<!-- <button class="btn btn-sm btn-primary mb-4" data-toggle="modal" data-target="#tambah_nominator"><i class="fas fa-plus fa-sm"></i> Tambah Keterangan</button> -->
		<a href="<?php echo base_url('admin/data_inovasi/') ?>"><div class="btn btn-sm btn-warning mb-4">Kembali</div></a>
	</div>

	<h4><div>Indikator : <?php echo $indikator_penilaian->indikator ?></div> </h4>

	<?php echo $this->session->flashdata('message');  ?>
	<table style="width: 80%;" class="table table-hover table-responsive">
		
		<tr>
			<th class="text-center table-secondary">No</th>
			<th class="text-center table-secondary">Keterangan</th>
			<th class="text-center table-secondary">Nilai Minimal</th>
			<th class="text-center table-secondary">Nilai Maksimal</th>
			<th class="text-center table-secondary" colspan="2">Aksi</th>
		</tr>

		<?php  
		$no=1;
	      foreach($keterangan_indikator as $ketind) : ?>

	      <tr>
	        <td align="center"><?php echo $no++ ?></td>
		 			<td><?php echo $ketind->keterangan ?></td>
		 			<td align="center"><?php echo $ketind->nilai_minimal_keterangan ?></td>
		 			<td align="center"><?php echo $ketind->nilai_maksimal_keterangan ?></td>
		 			<td align="center" style="width: 50"><?php echo anchor('admin/data_inovasi/edit/' .$ketind->id_keterangan_indikator, '<div class="btn btn-sm btn-primary btn"><i class="fa fa-edit"></i>Edit</div>') ?></td>
		 			<td align="center" style="width: 50"> <div class="btn btn-sm btn-danger btn" data-toggle="modal" data-target="#hapus_nominator"><i class="fa fa-trash"></i> <a>Hapus</a></div></td>
			 </tr>
		<?php endforeach; ?>
 
	</table>

	

</div>

<!-- Modal -->
<div class="modal fade" id="tambah_nominator" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  id="exampleModalLabel">Tambah Keterangan</h5>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/data_inovasi/tambah_keterangan/'; ?>" method="post" enctype="multipart/form-data" >

          <div class="form-group row ml-2">
            <dt class="mr-4 text-size 25">Indikator</dt>
            <input type="text" name="indikator" style="position: absolute; left: 138px; width: 90%" class="form-control col-sm-8 ml-3" value="<?php echo $indikator_penilaian->indikator ?>" readonly>
            <input type="text" name="id_indikator_penilaian" style="position: absolute; left: 138px; width: 90%" class="form-control col-sm-8 ml-3" value="<?php echo $indikator_penilaian->id_indikator_penilaian ?>" hidden>
            
          </div><br>


          <div class="form-group row ml-2">
            <dt class="mr-4 text-size 25">Keterangan</dt>
            <input type="text" name="keterangan" style="position: absolute; left: 138px; width: 90%" class="form-control col-sm-8 ml-3" required oninvalid="this.setCustomValidity('Data wajib diisi!')" oninput="setCustomValidity('')">
          </div><br>

          <div class="form-group row ml-2">
            <dt class="mr-4 text-size 25">Nilai Minimal</dt>
            <input type="number" name="nilai_minimal_keterangan" style="position: absolute; left: 138px; width: 20%" class="form-control col-sm-8 ml-3" min="0" max="100" required oninvalid="this.setCustomValidity('Data wajib diisi!')" oninput="setCustomValidity('')">
          </div><br>

          <div class="form-group row ml-2">
            <dt class="mr-4 text-size 25">Nilai Maksimal</dt>
            <input type="number" name="nilai_maksimal_keterangan" style="position: absolute; left: 138px; width: 20%" class="form-control col-sm-8 ml-3" min="0" max="100" required oninvalid="this.setCustomValidity('Data wajib diisi!')" oninput="setCustomValidity('')">
          </div><br>

	      </div>

	      <div class="modal-footer">
	      	
	        <button type="submit" class="btn btn-primary">Simpan</button>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
	        
	      </div>
      	</form>
    </div>
  </div>
</div>


<div class="modal fade" id="hapus_nominator" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  id="exampleModalLabel">Hapus Data</h5>
      </div>
      <div class="modal-body">
        <p>Apakah Anda yakin akan menghapus data ini?</p>

        <div class="modal-footer">
          <?php echo anchor('admin/data_inovasi/hapus_keterangan/' .$ketind->id_keterangan_indikator,   '<div class="btn btn-danger btn">Hapus</div>') ?>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
         
        </div>
    </div>
  </div>
</div>