<div class="container-fluid">
	
	<h5>DATA PENILAI</h5>
	<table style="width: 80%;" class="table table-bordered">
		<tr>
			<th class="text-center table-secondary">No</th>
			<th class="text-center table-secondary">Sub Event</th>
			<th class="text-center table-secondary">Detail Penilai</th>
		</tr>

		<?php 
	      $no=1;
	      foreach($subevent as $sbevt) : ?>

	      <tr>
	        <td align="center"><?php echo $no++ ?></td>
	     	<td align="center"><?php echo $sbevt->subevent ?></td>
	        <td align="center"><?php echo anchor('admin/data_penilai/detail_penilai/'.$sbevt->id,'<div class="btn btn-warning btn-sm"><i class="fa fa-search-plus"></i> Detail</div>') ?></td>

	        
	      </tr>
	  	<?php endforeach; ?>
	</table>	
</div>