
<div class="container">
  <ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#umum" role="tab" aria-controls="home" aria-selected="true">Umum</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#pelajar" role="tab" aria-controls="profile" aria-selected="false">Pelajar</a>
  </li>
</ul>
  
  <div class="tab-content">
    <!-- KATEGORI UMUM -->
    <div id="umum" class="tab-pane fade show active">
      <table style="width: 100%;">
        <tr>
          <td><h5>Penilaian Nominator [Umum]</h5></td>
          <td class="col-lg-7"></td>
          <td><button type="button" onclick="simpan_umum1()" class="btn btn-sm btn-primary mb-1 ml-1"><i data-target="#rank_umum2" data-toggle="pill"> Rangking <i class="fas fa-arrow-up"></i></i></button></td>
        </tr>
      </table>
      <table style="width: 100%;" class="table table-hover table-responsive">  
        <tr>
          <th class="text-center table-secondary">No</th>
          <th class="text-center table-secondary">Inovator</th>
          <th class="table-secondary">Nama Inovasi</th>
          <th class="text-center table-secondary">Rangking</th>
          <th class="text-center table-secondary">Total Nilai</th>
          <th class="text-center table-secondary">Penilai 1</th>
          <th class="text-center table-secondary">Penilai 2</th>
          <th class="text-center table-secondary">Penilai 3</th>
          <th class="text-center table-secondary">Penilai 4</th>
          <th class="text-center table-secondary">Penilai 5</th>
          <th class="text-center table-secondary">Penilai 6</th>
          <th class="text-center table-secondary">Penilai 7</th>       
        </tr>
       <?php  
        $no=1;
            foreach($total_nilai as $key => $value) : ?>
            <?php if ($value['kategori_peserta'] == 'umum') {  ?>
            <tr>
              <td align="center"><?php echo $no++ ?></td>
              <td><?= $value['user']?></td>
              <td><?= $value['judul']?></td>
              <td align="center"><?= "-"?></td>
              <td align="center"><?= $value['total']?></td>
            
            <?php foreach ($value['nilai_nominator'] as $key2 => $val): ?>
              <td align="center"><?= $val->nilai_nominator ?></td>
            <?php endforeach ?> 
           </tr>
           <?php } ?> 
        <?php endforeach; ?>
      </table>
      <div>
        <?php $rank=1;
        $keys = array_column($total_nilai, 'total');
            array_multisort($keys, SORT_DESC, $total_nilai);
            foreach($total_nilai as $key => $value) : 
              if ($key > 6) break;?>
         <?php if ($value['kategori_peserta'] == 'umum') {  ?>

        <form id="simpan-umum1">
          <input name="status" value="2" id="status" hidden>
          <input name="id_usulan" value="<?= $value['id_usulan']?>" id="id_usulan" hidden>
          <input name="id_subevent" value="<?= $value['id_subevent']?>" id="id_subevent" hidden>
          <input name="pemenang" value="<?php echo $rank++ ?>" id="pemenang" hidden>
        </form>
        <?php } ?>             
        <?php endforeach; ?>
      </div>
    </div>

    <!-- KATEGORI PELAJAR -->
    <div id="pelajar" class="tab-pane fade">
      <table style="width: 100%;">
        <tr>
          <td><h5>Penilaian Nominator [Pelajar]</h5></td>
          <td class="col-lg-7"></td>
          <td><button type="button" onclick="simpan_pelajar1()" class="btn btn-sm btn-primary mb-1 ml-1"><i data-target="#rank_pelajar2" data-toggle="pill"> Rangking <i class="fas fa-arrow-up"></i></i></button></td>
        </tr>
      </table>
      <table style="width: 100%;" class="table table-hover table-responsive">  
        <tr>
          <th class="text-center table-secondary">No</th>
          <th class="text-center table-secondary">Inovator</th>
          <th class="table-secondary">Nama Inovasi</th>
          <th class="text-center table-secondary">Rangking</th>
          <th class="text-center table-secondary">Total Nilai</th>
          <th class="text-center table-secondary">Penilai 1</th>
          <th class="text-center table-secondary">Penilai 2</th>
          <th class="text-center table-secondary">Penilai 3</th>
          <th class="text-center table-secondary">Penilai 4</th>
          <th class="text-center table-secondary">Penilai 5</th>
          <th class="text-center table-secondary">Penilai 6</th>
          <th class="text-center table-secondary">Penilai 7</th>                 
        </tr>
       <?php  
        $no=1;
            foreach($total_nilai as $key => $value) : ?>
            <?php if ($value['kategori_peserta'] == 'pelajar') {  ?>
              <tr>
              <td align="center"><?php echo $no++ ?></td>
              <td><?= $value['user']?></td>
              <td><?= $value['judul']?></td>
              <td align="center"><?php echo "-" ?></td>
              <td align="center"><?= $value['total']?></td>
            <!-- <?php foreach ($value['total'] as $key3 => $val1): ?>
              <td align="center"><?= $val1 ?></td>
            <?php endforeach ?> -->  
            <?php foreach ($value['nilai_nominator'] as $key2 => $val): ?>
              <td align="center"><?= $val->nilai_nominator ?></td>
            <?php endforeach ?> 
           </tr>
           <?php } ?>             
        <?php endforeach; ?>
      </table>
      <div>
        <?php $rank2=1;
        $keys = array_column($total_nilai, 'total');
            array_multisort($keys, SORT_DESC, $total_nilai);
            foreach($total_nilai as $key => $value) : 
              if ($key > 6) break;?>
         <?php if ($value['kategori_peserta'] == 'pelajar') {  ?>

        <form id="simpan-pelajar1">
          <input name="status2" value="2" id="status2" hidden>
          <input name="id_usulan2" value="<?= $value['id_usulan']?>" id="id_usulan2" hidden>
          <input name="id_subevent2" value="<?= $value['id_subevent']?>" id="id_subevent2" hidden>
            <input name="pemenang2" value="<?php echo $rank2++ ?>" id="pemenang2" hidden>
        </form>
        <?php } ?>             
        <?php endforeach; ?>
      </div>
    </div>

    <!--  RANK UMUM -->
    <div id="rank_umum2" class="tab-pane fade">
      <table style="width: 100%;">
        <tr>
          <td><h5>Penilaian Nominator [Umum]</h5></td>
          <td class="col-lg-7"></td>
          <td><a href="<?php echo base_url('admin/nominator/cetak_umum') ?>" target="_blank"><div class="btn btn-sm btn-success mb-2 ml-2"> Cetak <i class="fas fa-print"></i></div></a></td>
        </tr>
      </table>
      <table style="width: 100%;" class="table table-hover table-responsive">  
        <tr>
          <th class="text-center table-secondary">No</th>
          <th class="text-center table-secondary">Inovator</th>
          <th class="table-secondary">Nama Inovasi</th>
          <th class="text-center table-secondary">Rangking</th>
          <th class="text-center table-secondary">Total Nilai</th>
          <th class="text-center table-secondary">Penilai 1</th>
          <th class="text-center table-secondary">Penilai 2</th>
          <th class="text-center table-secondary">Penilai 3</th>
          <th class="text-center table-secondary">Penilai 4</th>
          <th class="text-center table-secondary">Penilai 5</th>
          <th class="text-center table-secondary">Penilai 6</th>
          <th class="text-center table-secondary">Penilai 7</th>       
        </tr>
       <?php  
        $no=1;
        $rank=1;
            $keys = array_column($total_nilai, 'total');
            array_multisort($keys, SORT_DESC, $total_nilai);
            foreach($total_nilai as $key => $value) : ?>
            <?php if ($value['kategori_peserta'] == 'umum') {  ?>
              <tr>
              <td align="center"><?php echo $no++ ?></td>
              <td><?= $value['user']?></td>
              <td><?= $value['judul']?></td>
              <td align="center"><?php echo $rank++ ?></td>
              <td align="center"><?= $value['total']?></td>
            <!-- <?php foreach ($value['total'] as $key3 => $val1): ?>
              <td align="center"><?= $val1 ?></td>
            <?php endforeach ?>  --> 
            <?php foreach ($value['nilai_nominator'] as $key2 => $val): ?>
              <td align="center"><?= $val->nilai_nominator ?></td>
            <?php endforeach ?> 
           </tr>
           <?php } ?>             
        <?php endforeach; ?>
      </table>
    </div>

   <!--  RANK PELAJAR -->
    <div id="rank_pelajar2" class="tab-pane fade">
      <table style="width: 100%;">
        <tr>
          <td><h5>Penilaian Nominator [Pelajar]</h5></td>
          <td class="col-lg-7"></td>
          <td><a href="<?php echo base_url('admin/nominator/cetak_pelajar') ?>" target="_blank"><div class="btn btn-sm btn-success mb-2 ml-2"> Cetak <i class="fas fa-print"></i></div></a></td>
        </tr>
      </table>
      <table style="width: 100%;" class="table table-hover table-responsive">  
        <tr>
          <th class="text-center table-secondary">No</th>
          <th class="text-center table-secondary">Inovator</th>
          <th class="table-secondary">Nama Inovasi</th>
          <th class="text-center table-secondary">Rangking</th>
          <th class="text-center table-secondary">Total Nilai</th>
          <th class="text-center table-secondary">Penilai 1</th>
          <th class="text-center table-secondary">Penilai 2</th>
          <th class="text-center table-secondary">Penilai 3</th>
          <th class="text-center table-secondary">Penilai 4</th>
          <th class="text-center table-secondary">Penilai 5</th>
          <th class="text-center table-secondary">Penilai 6</th>
          <th class="text-center table-secondary">Penilai 7</th>       
        </tr>
       <?php  
        $no=1;
        $rank=1;
            $keys = array_column($total_nilai, 'total');
            array_multisort($keys, SORT_DESC, $total_nilai);
            foreach($total_nilai as $key => $value) : ?>
            <?php if ($value['kategori_peserta'] == 'pelajar') {  ?>
              <tr>
              <td align="center"><?php echo $no++ ?></td>
              <td><?= $value['user']?></td>
              <td><?= $value['judul']?></td>
              <td align="center"><?php echo $rank++ ?></td>
              <td align="center"><?= $value['total']?></td>
            <!-- <?php foreach ($value['total'] as $key3 => $val1): ?>
              <td align="center"><?= $val1 ?></td>
            <?php endforeach ?>  --> 
            <?php foreach ($value['nilai_nominator'] as $key2 => $val): ?>
              <td align="center"><?= $val->nilai_nominator ?></td>
            <?php endforeach ?> 
           </tr>
           <?php } ?>             
        <?php endforeach; ?>
      </table>
    </div> 
  </div>
</div>

<script type="text/javascript">
  function simpan_umum1(){
    var input = $('#simpan-umum1').serializeArray();
    var status = $("#status").val();
    var id_subevent = [];
    var id_usulan = [];
    var pemenang = [];
    $("input[name='id_subevent']").each(function(){
            id_subevent.push(this.value);
        });
    $("input[name='id_usulan']").each(function(){
            id_usulan.push(this.value);
        });
    $("input[name='pemenang']").each(function(){
            pemenang.push(this.value);
        });
    $.ajax({
      url: "<?php echo base_url('admin/nominator/simpan_umum')?>",
      type: "POST",
      data : {status:status,id_subevent:id_subevent,id_usulan:id_usulan,pemenang:pemenang},
      dataType : "JSON",
      success:function(data){
        
      } 
    })
  };

  function simpan_pelajar1(){
    var input = $('#simpan-pelajar1').serializeArray();
    var status2 = $("#status2").val();
    var id_subevent2 = [];
    var id_usulan2 = [];
    var pemenang2 = [];
     $("input[name='id_subevent2']").each(function(){
            id_subevent2.push(this.value);
        });
    $("input[name='id_usulan2']").each(function(){
            id_usulan2.push(this.value);
        });
    $("input[name='pemenang2']").each(function(){
            pemenang2.push(this.value);
        });
    $.ajax({
      url: "<?php echo base_url('admin/nominator/simpan_pelajar')?>",
      type: "POST",
      data : {status2:status2,id_subevent2:id_subevent2,id_usulan2:id_usulan2,pemenang2:pemenang2},
      dataType : "JSON",
      success:function(data){
        
      } 
    })
  };
</script>