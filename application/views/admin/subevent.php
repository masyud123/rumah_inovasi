<div class="container-fluid">

    <a href="#" class="btn btn-sm btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#tambah_subevent">
      <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
      </span>
      <span class="text">Tambah Sub Event</span>
    </a>

    <!-- <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah_subevent"><i class="fas fa-plus fa-sm"></i> Tambah Sub Event</button> -->
    <h5>DATA SUB EVENT</h5>
    <?php echo $this->session->flashdata('message');  ?>
    <table class="table table-hover table-responsive">
      <tr>
        <th class="table-secondary">No</th>
        <th class="table-secondary">Tahun</th>
        <th class="table-secondary">Event</th>
        <th class="table-secondary">Sub Event</th>
        <th class="table-secondary">Bidang</th>
        <th class="table-secondary">Tanggal Mulai</th>
        <th class="table-secondary">Tanggal Berakhir</th>
        <th class="text-center table-secondary" colspan="3">Aksi</th>
      </tr>

      <?php 
      $no=1;
      foreach($subevent as $sbevt) : ?>

      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $sbevt->tahun ?></td>
        <td><?php echo $sbevt->event ?></td>
        <td><?php echo $sbevt->subevent ?></td>
        <td><?php echo $sbevt->bidang ?></td>
        <td><?php echo $sbevt->mulai ?></td>
        <td><?php echo $sbevt->akhir ?></td>
        <td align="center" style="width: 50"><?php echo anchor('admin/data_subevent/edit/' .$sbevt->id, '<div class="btn btn-sm btn-primary btn"><i class="fa fa-edit"></i>Edit</div>') ?></td>
        <td align="center" style="width: 50"> <div class="btn btn-sm btn-danger btn" data-toggle="modal" data-target="#hapus_sub"><i class="fa fa-trash"></i> <a>Hapus</a></div></td>
        
      </tr>

    <?php endforeach; ?>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_subevent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  id="exampleModalLabel">Tambah Sub Event</h5>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/data_subevent/tambah_subevent'; ?>" method="post" enctype="multipart/form-data" >

          <div class="form-group row ml-1">
            <dt class="mr-4 text-size 25">Tahun</dt>
            <input type="text" name="tahun" style="position: absolute; left: 138px; width: 60%" class="form-control col-sm-8 ml-3" value="<?php echo date("Y") ?>" readonly>
          </div><br>

          <div class="form-group row ml-1">
            <dt class="mr-1">Event</dt>
            <select class="form-control col-sm-8 ml-3" name="id_event" style="position: absolute; left: 138px; width: 60%">
               <?php foreach($list_event as $evt) : ?>
                <option value="<?php echo $evt->id ?>">
                  <?php echo $evt->event ?>
                </option>
               <?php endforeach; ?>
            </select>
          </div><br>

          <div class="form-group row ml-1">
            <dt class="mr-4 text-size 25">Sub Event</dt>
            <input type="text" name="subevent" style="position: absolute; left: 138px; width: 60%" class="form-control col-sm-8 ml-3" required oninvalid="this.setCustomValidity('Data wajib diisi!')" oninput="setCustomValidity('')">
          </div><br>

          <div class="form-group row ml-1">
            <dt class="mr-4 text-size 25">Bidang</dt>
            <input type="text" name="bidang" style="position: absolute; left: 138px; width: 60%" class="form-control col-sm-8 ml-3" required oninvalid="this.setCustomValidity('Data wajib diisi!')" oninput="setCustomValidity('')">
          </div><br>

          <div class="form-group row ml-1">
            <dt class="mr-3">Tanggal Mulai</dt>
            <input type="date" name="mulai" id="tgl_mulai" style="position: absolute; left: 130px; width: 60%" class="form-control datepicker col-sm-8 ml-4" required oninvalid="this.setCustomValidity('Data wajib diisi!')" oninput="setCustomValidity('')" min="09-20-2001">
          </div><br>



          <div class="form-group row ml-1">
            <dt class="mr-3">Tanggal Berakhir</dt>
            <input type="date" name="akhir" id="tgl_akhir" style="position: absolute; left: 130px; width: 60%" class="form-control datepicker col-sm-8 ml-4" required oninvalid="this.setCustomValidity('Data wajib diisi!')" oninput="setCustomValidity('')" min="2021-09-01">
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


<div class="modal fade" id="hapus_sub" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  id="exampleModalLabel">Hapus Data</h5>
      </div>
      <div class="modal-body">
        <p>Apakah Anda yakin akan menghapus data ini?</p>

        <div class="modal-footer">
          <?php echo anchor('admin/data_subevent/hapus/' .$sbevt->id, '<div class="btn btn-danger btn">Hapus</div>') ?>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        </div>
    </div>
  </div>
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