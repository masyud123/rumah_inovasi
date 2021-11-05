<div class="container">
  	<div class="form-group">
  		<table style="width: 100%;">
  			<tr>
		  		<td><h4>RIWAYAT INOVASI</h4></td>
		  		<td class="col-lg-6"></td>
		  		<!-- <td><?php echo anchor('peserta/daftar/', '<div class="btn btn-success  mb-1 mr-2"><i class="fa fa-plus"></i> Tambah Inovasi</div>') ?>
		  		</td> -->
		  		<td>
		  			<a href="<?php echo base_url('peserta/daftar') ?>" class="btn btn-sm btn-success btn-icon-split ml-5">
				      <span class="icon text-white-50">
				        <i class="fas fa-plus"></i>
				      </span>
				      <span class="text">Tambah Inovasi</span>
				    </a>
		  		</td>
	  		</tr>
  		</table>
  	</div>
  	<?php echo $this->session->flashdata('pesan1') ?>
  	<?php echo $this->session->flashdata('pesan2') ?>
  	<?php echo $this->session->flashdata('berubah3') ?>
	<table style="width: 100%;" class="table table-hover table-responsive table-bordered" >
		<tr>
			<th class="text-center table-secondary">NO</th>
			<th width="13%" class="text-center table-secondary">Event</th>
			<th width="13%"class="text-center table-secondary">Sub Event</th>
			<th width="13%"class="text-center table-secondary">Kategori</th>
			<th width="13%"class="text-center table-secondary">Nama Tim</th>
			<th width="13%"class="text-center table-secondary">Nama Inovasi</th>
			<th  width="13%"class="text-center table-secondary">Status</th>
			<th class="text-center table-secondary" colspan="2" width="20%">Aksi</th>
			
		</tr>

		<?php 
	      $no=1;
	      foreach($riwayat as $riw) : ?>
		    <tr>
        		<td align="center"><?php echo $no++ ?></td>
			    <td align="center"><?php echo $riw->event ?></td>
			    <td align="center"><?php echo $riw->subevent ?></td>
			    <td align="center"><?php echo $riw->kategori_peserta ?></td>
			    <td align="center"><?php echo $riw->nama_tim ?></td>
			    <td align="center"><?php echo $riw->judul ?></td>
			    <td align="center">
		    		<?php if ($riw->status == '1')
			    		{echo'Melengkapi Data';}
					elseif ($riw->status == '2')
						{echo'Sedang Dinilai';} 
					elseif ($riw->status == '3')
						{echo'Selesai';}?>
			    </td> 
			    <?php if ($riw->status == '1'): ?>
				    <td align="center">
			    		<button onclick="window.location.href='<?php echo base_url('peserta/riwayat/edit_riwayat1/'.$riw->id_peserta) ?>'" class="btn btn-sm btn-warning">View Detail & Edit</button>
				    </td>
				    <td align="center">
				    	<button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#KirimKonfirmasi<?php echo $riw->id_usulan?>">Kirim Data</button>
				    </td>
				<?php elseif ($riw->status == '2' or '3'): ?>
					 <td align="center">
			    		<button onclick="window.location.href='<?php echo base_url('peserta/riwayat/edit_riwayat1/'.$riw->id_peserta) ?>'" class="btn btn-sm btn-warning">View Detail</button>
				    </td>
				    <td align="center">
				    	<button disabled class="btn btn-sm btn-secondary">Kirim Data</button>
				    </td>
			    <?php endif ?>
		    </tr>
		<?php endforeach; ?>
	</table>
</div>

<!-- MODAL konfirmasi -->
<?php foreach($riwayat as $riw) : ?>
<div class="modal fade" id="KirimKonfirmasi<?php echo $riw->id_usulan?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
    <div class="modal-content">
      <div class="modal-header text-center form-group" style="background:skyblue; justify-content:center; position: static;" align="center">
        <h4 class="modal-title text-white" id="exampleModalLabel"><strong>Konfirmasi</strong></h4>
        <button type="button" data-dismiss="modal" class="fas fa-times btn-lg" style="margin-left:90%;margin-top:-5px;position:absolute;background: transparent;border:none;color:white;"></button>
      </div>
      <div class="modal-body">
      <form action="<?php echo base_url('peserta/riwayat/update_status_usulan') ; ?>" method="post" enctype="multipart/form-data" >
        <div class="container">
            <div class="form-group" align="center">
		        <div class="form-group" hidden >
	        		<input type="text" name="id" value="<?php echo $riw->id_usulan ?>">
	        		<input type="text" name="status" value="2">
		        </div>
                <h5>Apakah Anda yakin ingin mengirim data ini ?</h5>
            </div><br>
        </div>
        <div align="center">
            <button type="submit" class="btn btn-sm btn-primary mr-2" style="width:20%;margin-bottom:20px;" >Iya</button>
            <button type="button" data-dismiss="modal" class="btn btn-sm btn-secondary ml-2" style="width:20%;margin-bottom:20px;" >Tidak</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>

<!-- <form id="formD" name="formD" action="" method="post" enctype="multipart/form-data">
   Harga Satuan: <br> 
   <input type="text" name="harga" onkeyup="OnChange(this.value)"><br> 
   Jumlah:<br>
  <input type="text" name="jmlpsn" onkeyup="OnChange(this.value)"><br>
   Harga keseluruhan : <br>
   <input type="text" name="txtDisplay" value="" readonly="readonly">
</form>
 
<script type="text/javascript" language="Javascript">
   function OnChange(value){
     hargasatuan = document.formD.harga.value;
     jumlah = document.formD.jmlpsn.value;
     total = hargasatuan * jumlah;
     document.formD.txtDisplay.value = total;
   }
 </script> -->