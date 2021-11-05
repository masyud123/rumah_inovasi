  <div class="container-fluid">
    <a href="<?php echo base_url('admin/data_verifikasi/umum') ?>"><div class="btn btn-success active mb-2">Kategori Umum</div></a>
    <a href="<?php echo base_url('admin/data_verifikasi/pelajar') ?>"><div class="btn btn-secondary mb-2">Kategori Pelajar</div></a>
    <table style="width: 100%;">
      <tr>
        <td><h5>Penilaian Verifikasi [Umum]</h5></td>
        <td class="col-lg-7"></td>
        <td><a href="<?php echo base_url('admin/data_verifikasi/') ?>"><div class="btn btn-sm btn-success mb-2 ml-2"> Cetak <i class="fas fa-print"></i></div></a></td>
        <td><a href="<?php echo base_url('admin/data_verifikasi/') ?>"><div class="btn btn-sm btn-primary mb-2 ml-1"> Rangking <i class="fas fa-arrow-up"></i></div></a></td>   
      </tr>
    </table>

  <table style="width: 100%;" class="table table-hover table-responsive">
    
    <tr>
      <th class="text-center table-secondary">No</th>
      <th class="text-center table-secondary">Inovator</th>
      <th class="text-center table-secondary">Nama Inovasi</th>
      <th class="text-center table-secondary">Total</th>
      <th class="text-center table-secondary">Penilai 1</th>
      <th class="text-center table-secondary">Penilai 2</th>
      <th class="text-center table-secondary">Penilai 3</th>
      <th class="text-center table-secondary">Penilai 4</th>
      <th class="text-center table-secondary">Penilai 5</th>
      <th class="text-center table-secondary">Penilai 6</th>
      <th class="text-center table-secondary">Penilai 7</th>
      
      <th class="text-center table-secondary">Rangking</th>
    </tr>

    <?php  
    $no=1;
        foreach($total_nilai as $key => $value) : ?>

        <tr>
          <td align="center"><?php echo $no++ ?></td>
          <td align="center"><?= $value['user']?></td>
          <td align="center"><?= $value['judul']?></td>

        <?php foreach ($value['total'] as $key3 => $val1): ?>
          <td align="center"><?= $val1 ?></td>
        <?php endforeach ?>   
        <?php foreach ($value['nilai_verifikasi'] as $key2 => $val): ?>
          <td align="center"><?= $val->nilai_verifikasi ?></td>
        <?php endforeach ?>

         


       </tr>
    <?php endforeach; ?>
 
  </table>

  

</div>

