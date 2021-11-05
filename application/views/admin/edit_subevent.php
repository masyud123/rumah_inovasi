<div class="container-fluid ml-5">
	<h3><i class="fas fa-edit mb-3"></i> Edit Data Subevent</h3>

	<?php foreach ($subevent as $sbevt) : ?>

		<form method="post" action="<?php echo base_url().'admin/data_subevent/update' ?>">

			<div class= "row">
				<dt for="inputNama" class="col-sm-2 col-form-label">Tahun</dt>
				<div class="col-sm-5 mb-3">
					<input typed="text" name="tahun" class="form-control" value="<?php echo $sbevt->tahun ?>" readonly>
				</div>
			</div>

			<div class= "row">
				<dt for="inputNama" class="col-sm-2 col-form-label">Event</dt>
				<div class="col-sm-5 mb-3">
					<input type="text" name="event" class="form-control" value="<?php echo $sbevt->id_event ?>" readonly>
				</div>
			</div>

			<div class= "row">
				<dt for="inputNama" class="col-sm-2 col-form-label">Sub Event</dt>
				<div class="col-sm-5 mb-3">
					<input type="hidden" name="id" class="form-control" value="<?php echo $sbevt->id ?>">
					<input type="text" name="subevent" class="form-control" value="<?php echo $sbevt->subevent ?>">
				</div>
			</div>

			<div class= "row">
				<dt for="inputNama" class="col-sm-2 col-form-label">Bidang</dt>
				<div class="col-sm-5 mb-3">
					<input type="text" name="bidang" class="form-control" value="<?php echo $sbevt->bidang ?>">
				</div>
			</div>

			<div class= "row">
				<dt for="inputNama" class="col-sm-2 col-form-label">Tanggal Mulai</dt>
				<div class="col-sm-5 mb-3">
					<input type="date" name="mulai" class="form-control" id="tgl_mulai" value="<?php echo $sbevt->mulai ?>">
				</div>
			</div>

			<div class= "row">
				<dt for="inputNama" class="col-sm-2 col-form-label">Tanggal Berakhir</dt>
				<div class="col-sm-5 mb-3">
					<input type="date" name="akhir" class="form-control" id="tgl_akhir" value="<?php echo $sbevt->akhir ?>">
				</div>
			</div>
			

			<button type="submit" class="btn btn-primary btn-sm mt-3 mr-2"> Simpan
			</button>

			<a href="<?php echo base_url('admin/data_subevent') ?>"><div class="btn btn-sm btn-danger mt-3">Kembali</div></a>
		</form>
	<?php endforeach; ?>	
</div>
<script type="text/javascript">

  function DateCheck(){
  var StartDate= document.getElementById('tgl_mulai').value;
  var EndDate= document.getElementById('tgl_akhir').value;
  var eDate = new Date(EndDate);
  var sDate = new Date(StartDate);
  if(StartDate!= '' && StartDate!= '' && sDate> eDate)
    {
    alert("Please ensure that the End Date is greater than or equal to the Start Date.");
    return false;
    }
}
    
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
     if(dd<10){
            dd='0'+dd
        } 
        if(mm<10){
            mm='0'+mm
        } 

    today = yyyy+'-'+mm+'-'+dd;
    document.getElementById("tgl_mulai").setAttribute("min", today);
    var berakhir = document.getElementById("tgl_mulai").value;
    document.getElementById('tgl_akhir').setAttribute("min", today);
  </script>