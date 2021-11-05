<div class="container-fluid">

    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah_bidang"><i class="fas fa-plus fa-sm"></i> Tambah Bidang</button>
    <h5>DATA BIDANG</h5>
    <?php echo $this->session->flashdata('message');  ?>
    <table style="width: 60%;" class="table table-bordered">
      <tr>
        <th style="width: 15%;" class="text-center table-secondary">No</th>
        <th class="table-secondary">Bidang</th>
        <th class="text-center table-secondary" colspan="2">Aksi</th>
      </tr>

      <?php 
      $no=1;
      foreach($bidang as $bdg) : ?>

      <tr>
        <td class="text-center"><?php echo $no++ ?></td>
        <td><?php echo $bdg->bidang ?></td>
         <td align="center" style="width: 15%"><?php echo anchor('admin/data_bidang/edit/' .$bdg->id, '<div class="btn btn-sm btn-primary btn"><i class="fa fa-edit"></i>Edit</div>') ?></td>
        <td align="center" style="width: 15%"> <div class="btn btn-sm btn-danger btn" data-toggle="modal" data-target="#hapus_bidang"><i class="fa fa-trash"></i> <a>Hapus</a></div></td>
      </tr>

    <?php endforeach; ?>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_bidang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  id="exampleModalLabel">Tambah Bidang</h5>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/data_bidang/tambah_bidang'; ?>" method="post" enctype="multipart/form-data" >

          <div class="form-group row ml-4">
            <dt class="mr-4 text-size 25">Nama Bidang</dt>
            <input type="text" name="bidang" style="position: absolute; left: 138px; width: 60%" class="form-control col-sm-8 ml-3">
          </div><br>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="<?php echo base_url('admin/data_bidang') ?>"><div class="btn btn-secondary">Batal</div></a>
        </div>

        </form>

    </div>
  </div>
</div>

<div class="modal fade" id="hapus_bidang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  id="exampleModalLabel">Hapus Data</h5>
      </div>
      <div class="modal-body">
        <p>Apakah Anda yakin akan menghapus data ini?</p>

        <div class="modal-footer">
          <?php echo anchor('admin/data_bidang/hapus/' .$bdg->id, '<div class="btn btn-danger btn">Hapus</div>') ?>
          <a href="<?php echo base_url('admin/data_bidang') ?>"><div class="btn btn-secondary">Batal</div></a>
        </div>
    </div>
  </div>
</div>

<!-- Modal -->
