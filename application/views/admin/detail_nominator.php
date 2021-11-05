<div class="container-fluid">
	
	<div>
		<!-- <a href="#" class="btn btn-primary btn-sm btn-icon-split mb-4" data-toggle="modal" data-target="#tambah_nominator">
      <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
      </span>
      <span class="text">Tambah Indikator</span>
    </a> -->
    <?php foreach($indikator_penilaian_pemenang as $indpnl);?>
		<?php if ($indikator_penilaian_pemenang == null): ?>
			<a href="#" class="btn btn-primary btn-sm btn-icon-split mb-4" data-toggle="modal" data-target="#tambah_nominator"> 
	      <span class="icon text-white-50">
	        <i class="fas fa-plus"></i>
	      </span>
	      <span class="text">Tambah Indikator</span>
	    </a>
	  <?php else: ?>
	  		<?php $id_subevent = $indpnl->id_subevent;?>
				<?php $sql = $this->db->query("SELECT * FROM usulan where (id_subevent='$id_subevent' and status='3')")->result(); ?>
				<?php if ($sql) :?>
						<a href="#" class="btn btn-secondary disabled btn-sm btn-icon-split mb-4" data-toggle="modal" data-target="#tambah_nominator">
			      <span class="icon text-white-50">
			        <i class="fas fa-plus"></i>
			      </span>
			      <span class="text">Tambah Indikator</span>
			    </a>
				<?php else: ?>
						<a href="#" class="btn btn-primary btn-sm btn-icon-split mb-4" data-toggle="modal" data-target="#tambah_nominator">
			      <span class="icon text-white-50">
			        <i class="fas fa-plus"></i>
			      </span>
			      <span class="text">Tambah Indikator</span>
			    </a>
				<?php endif;?>
		<?php endif; ?>
		<!-- <button class="btn btn-sm btn-primary mb-4" data-toggle="modal" data-target="#tambah_nominator"><i class="fas fa-plus fa-sm"></i> Tambah Indikator</button> -->
		<a href="<?php echo base_url('admin/data_nominator/') ?>"><div class="btn btn-sm btn-warning mb-4">Kembali</div></a>
	</div>

	<h4><div>Sub Event : <?php echo $subevent->subevent ?></div> </h4>
	<?php echo $this->session->flashdata('message3');  ?>
	<table style="width: 80%;" class="table table-hover table-responsive">
		
		<tr>
			<th class="text-center table-secondary">No</th>
			<th class="text-center table-secondary">Indikator</th>
			<th class="text-center table-secondary">Keterangan</th>
			<th class="text-center table-secondary">Nilai Minimal</th>
			<th class="text-center table-secondary">Nilai Maksimal</th>
			<th class="text-center table-secondary">Aksi</th>
		</tr>

		<?php  
		$no=1;
	      foreach($indikator_penilaian_pemenang as $indpnl) : ?>

	      <tr>
	        <td align="center"><?php echo $no++ ?></td>
		 			<td><?php echo $indpnl->komponen ?></td>
		 			<td><?php echo $indpnl->note ?></td>
		 			<td align="center"><?php echo $indpnl->nilai_komponen_min ?></td>
		 			<td align="center"><?php echo $indpnl->nilai_komponen_max ?></td>
		 			<!-- <td align="center" style="width: 50"><?php //echo anchor('admin/data_user/edit/' .$indpnl->id, '<div class="btn btn-sm btn-primary btn"><i class="fa fa-edit"></i>Edit</div>') ?></td> -->
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
        <h5 class="modal-title"  id="exampleModalLabel">Tambah Indikator Nominator</h5>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/data_nominator/tambah_nominator/'; ?>" method="post" enctype="multipart/form-data" >

          <div class="form-group row ml-2">
            <dt class="mr-4 text-size 25">Sub Event</dt>
            <input type="text" name="subevent" style="position: absolute; left: 138px; width: 60%" class="form-control col-sm-8 ml-3" value="<?php echo $subevent->subevent ?>" readonly>
            <input type="text" name="id_subevent" style="position: absolute; left: 138px; width: 60%" class="form-control col-sm-8 ml-3" value="<?php echo $subevent->id ?>" hidden>
            
          </div><br>

         <div class="form-group row ml-2">
            <dt class="mr-4 text-size 25">Indikator</dt>
            <input type="text" name="komponen" style="position: absolute; left: 138px; width: 60%" class="form-control col-sm-8 ml-3" required oninvalid="this.setCustomValidity('Data wajib diisi!')" oninput="setCustomValidity('')">
          </div><br>

          <div class="form-group row ml-2">
            <dt class="mr-4 text-size 25">Keterangan</dt>
            <input type="text" name="note" style="position: absolute; left: 138px; width: 60%" class="form-control col-sm-8 ml-3" required oninvalid="this.setCustomValidity('Data wajib diisi!')" oninput="setCustomValidity('')">
          </div><br>

          <div class="form-group row ml-2">
            <dt class="mr-4 text-size 25">Nilai Minimal</dt>
            <input type="number" name="nilai_komponen_min" style="position: absolute; left: 138px; width: 20%" class="form-control col-sm-8 ml-3" min="0" max="100" required oninvalid="this.setCustomValidity('Data wajib diisi!')" oninput="setCustomValidity('')">
          </div><br>

          <div class="form-group row ml-2">
            <dt class="mr-4 text-size 25">Nilai Maksimal</dt>
            <input type="number" name="nilai_komponen_max" style="position: absolute; left: 138px; width: 20%" class="form-control col-sm-8 ml-3" min="0" max="100" required oninvalid="this.setCustomValidity('Data wajib diisi!')" oninput="setCustomValidity('')">
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
          <?php echo anchor('admin/data_nominator/hapus/' .$indpnl->id,   '<div class="btn btn-danger btn">Hapus</div>') ?>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        </div>
    </div>
  </div>
</div>