<div class="container-fluid">
	
	<div>
		<?php foreach($indikator_penilaian as $id_pen);?>
		<?php if ($indikator_penilaian == null): ?>
			<a href="#" class="btn btn-primary btn-sm btn-icon-split mb-4" data-toggle="modal" data-target="#tambah_inovasi">
	      <span class="icon text-white-50">
	        <i class="fas fa-plus"></i>
	      </span>
	      <span class="text">Tambah Indikator</span>
	    </a>
	  <?php else: ?>
	  		<?php $id_subevent = $id_pen->id_subevent;?>
				<?php $sql = $this->db->query("SELECT * FROM usulan where (id_subevent='$id_subevent' and status='2'or status='3')")->result(); ?>
				<?php if ($sql) :?>
						<a href="#" class="btn btn-secondary disabled btn-sm btn-icon-split mb-4" data-toggle="modal" data-target="#tambah_inovasi">
			      <span class="icon text-white-50">
			        <i class="fas fa-plus"></i>
			      </span>
			      <span class="text">Tambah Indikator</span>
			    </a>
				<?php else: ?>
						<a href="#" class="btn btn-primary btn-sm btn-icon-split mb-4" data-toggle="modal" data-target="#tambah_inovasi">
			      <span class="icon text-white-50">
			        <i class="fas fa-plus"></i>
			      </span>
			      <span class="text">Tambah Indikator</span>
			    </a>
				<?php endif;?>
		<?php endif; ?>

		<a href="<?php echo base_url('admin/data_inovasi/') ?>"><div class="btn btn-sm btn-warning mb-4">Kembali</div></a>
	</div>
	<h5>DATA DETAIL INOVASI</h5>
	<h4><div>Sub Event : <?php echo $subevent->subevent ?></div> </h4>
	<?php echo $this->session->flashdata('message');  ?>
	<table style="width: 80%;" class="table table-bordered">
		<tr>
			<th class="text-center table-secondary">No</th>
			<th class="text-center table-secondary" style="width: 60%;">Indikator</th>
			<th class="text-center table-secondary">Detail Indikator</th>
			<th  class="text-center table-secondary">Aksi</th>
		</tr>

		<?php 
	      $no=1;
	      foreach($indikator_penilaian as $id_pen) : ?>

	      <tr>
	        <td align="center"><?php echo $no++ ?></td>
	     	<td><?php echo $id_pen->indikator ?></td>
	        <td align="center"><?php echo anchor('admin/data_inovasi/detail_indikator/'.$id_pen->id_indikator_penilaian,'<div class="btn btn-warning btn-sm"><i class="fa fa-search-plus"></i> Detail</div>') ?></td>
	        <!-- <td align="center"><?php echo anchor('admin/data_inovasi/detail_indikator/'.$id_pen->id_indikator_penilaian,'<div class="btn btn-primary btn-sm"><i class="fa fa-search-plus"></i> Edit</div>') ?></td> -->
	       <td align="center" style="width: 50"> <div class="btn btn-sm btn-danger btn" data-toggle="modal" data-target="#hapus_indikator_inovasi"><i class="fa fa-trash"></i> <a>Hapus</a></div></td>
	        
	      </tr>
	  	<?php endforeach; ?>
	</table>	
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_inovasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  id="exampleModalLabel">Tambah Indikator Inovasi</h5>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/data_inovasi/tambah_inovasi/'; ?>" method="post" enctype="multipart/form-data" >

          <div class="form-group row ml-2">
            <dt class="mr-4 text-size 25">Sub Event</dt>
            <input type="text" name="subevent" style="position: absolute; left: 138px; width: 60%" class="form-control col-sm-8 ml-3" value="<?php echo $subevent->subevent ?>" readonly>
            <input type="text" name="id_subevent" style="position: absolute; left: 138px; width: 60%" class="form-control col-sm-8 ml-3" value="<?php echo $subevent->id ?>" hidden>
            
          </div><br>

         <div class="form-group row ml-2">
            <dt class="mr-4 text-size 25">Indikator</dt>
            <input type="text" name="indikator" style="position: absolute; left: 138px; width: 60%" class="form-control col-sm-8 ml-3" required oninvalid="this.setCustomValidity('Data wajib diisi!')" oninput="setCustomValidity('')">
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

<div class="modal fade" id="hapus_indikator_inovasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  id="exampleModalLabel">Hapus Data</h5>
      </div>
      <div class="modal-body">
        <p>Apakah Anda yakin akan menghapus data ini?</p>

        <div class="modal-footer">
          <?php echo anchor('admin/data_inovasi/hapus/' .$id_pen->id_indikator_penilaian, '<div class="btn btn-danger btn">Hapus</div>') ?>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        </div>
    </div>
  </div>
</div>