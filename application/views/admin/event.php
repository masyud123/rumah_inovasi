<div class="container-fluid">

    <a href="#" class="btn btn-sm btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#tambah_event">
      <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
      </span>
      <span class="text">Tambah Event</span>
    </a>

    <!-- <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah_event"><i class="fas fa-plus fa-sm"></i> Tambah Event</button> -->
    <h5>DATA EVENT</h5>
    <?php echo $this->session->flashdata('message');  ?>  
    <table style="width: 60%;" class="table table-bordered ">
      <tr>
        <th style="width: 15%;" class="text-center table-secondary">No</th>
        <th class="table-secondary">Event</th>
        <th class="text-center table-secondary">Aksi</th>
      </tr>
      <?php 
      $no=1;
      foreach($event as $evt) : ?>
      <tr>
        <td class="text-center"><?php echo $no++ ?></td>
        <td><?php echo $evt->event ?></td>
        <td align="center" style="width: 50"><?php echo anchor('admin/data_event/edit/' .$evt->id, '<div class="btn btn-sm btn-primary btn"><i class="fa fa-edit"></i>Edit</div>') ?></td>
       <!--  <td align="center" style="width: 50"> <div class="btn btn-sm btn-danger btn" data-toggle="modal" data-target="#hapus_event"><i class="fa fa-trash"></i> <a>Hapus</a></div></td> -->
      </tr>
    <?php endforeach; ?>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_event" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  id="exampleModalLabel">Tambah Event</h5>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/data_event/tambah_event'; ?>" method="post" enctype="multipart/form-data" >

          <div class="form-group row ml-4">
            <dt class="mr-4 text-size 25">Nama Event</dt>
            <input type="text" name="event" style="position: absolute; left: 138px; width: 60%" class="form-control col-sm-8 ml-3" required oninvalid="this.setCustomValidity('Data wajib diisi!')" oninput="setCustomValidity('')">
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

<!-- Modal -->
<div class="modal fade" id="hapus_event" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  id="exampleModalLabel">Hapus Data</h5>
      </div>
      <div class="modal-body">
        <p>Apakah Anda yakin akan menghapus data ini?</p>

        <div class="modal-footer">
          <?php echo anchor('admin/data_event/hapus/' .$evt->id, '<div class="btn btn-danger btn">Hapus</div>') ?>
          <a href="<?php echo base_url('admin/data_event') ?>"><div class="btn btn-secondary">Batal</div></a>
        </div>
    </div>
  </div>
</div>

