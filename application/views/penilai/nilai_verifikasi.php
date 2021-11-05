<div id="layoutSidenav_content">
  <main>
    <div class="container mt-3">
      <div>
        <a href="<?php echo base_url('penilai/data_verifikasi/') ?>" class="btn btn-sm btn-warning btn-icon-split mb-2">
          <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
          </span>
          <span class="text">Kembali</span>
        </a>
        <a href="#" class="btn btn-sm btn-primary btn-icon-split mb-2" data-toggle="modal" data-target="#lihat_usulannn">
          <span class="icon text-white-50">
            <i class="fas fa-search-plus"></i>
          </span>
          <span class="text">Lihat Usulan</span>
        </a>
      </div>
      <div class="card">
       
        <h5 class="card-header"><b>Nama Inovasi     : <?php echo $usulan->judul ?><br>Inovator : <?php echo $usulan->user ?></b></h5><br>
        <h5 class="card-header"><b>Nilai Verifikasi </b></h5>
        <h5 class="card-header"><b>1. Penilaian Makalah</b></h5>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-11">
              <form method="post" action="<?php echo base_url().'penilai/data_verifikasi/simpan' ?>">
              <table class="table-metadata table-responsive"> 
                <tr>
                  <td><label style="margin-left: 20px">Nilai Makalah</label></td>
                  <td></td>
                  <td><input type="number" name="nilai_proposal" id="nil_makalah" onkeyup="b()" class="form-control" style="width: 11%; margin-left: 550px;" min="0" max="100" required oninvalid="this.setCustomValidity('Data wajib diisi!')" oninput="setCustomValidity('')"></td>
                  <input type="text" name="id_usulan" style="position: absolute; left: 138px; width: 60%" class="form-control col-sm-8 ml-3" value="<?php echo $usulan->id ?>" hidden>
                </tr>
              </table>
            </div>
          </div>
          </div>

        <h5 class="card-header"><b>2. Penilaian Video dan Substansi Inovasi</b></h5>
        <div class="card-body">
          <div class="row">
              <div class="col-md-11">
              <table class="table table-hover table-responsive ">
                  <tr>
                    <th rowspan="2" class="text-center table-secondary">No</th>
                    <th colspan="3" class="text-center table-secondary">KRITERIA PENILAIAN PROPOSAL DAN VIDEO INOVASI</th>
                    
                  </tr>
                  <tr>
                    <th class="table-secondary">Uraian Komponen Inovasi Teknologi</th>
                    <th class="table-secondary">Nilai Komponen</th>
                    <th class="table-secondary">Nilai</th>
                  </tr>
                  <?php $i=1;
                  foreach ($indikator_keterangan as $key => $value):?>
                    <tr>
                      <td rowspan="<?=count($value['ket'])+1?>"><?php echo $i++?></td>
                      <td><dt><?= $value['label_indikator']?></dt></td>
                      <td></td>
                      <td>
                          <input type="number" name="nilai[]" onblur="a()" class="form-control tot_nilai" id="nilai_verifikasi" max="<?php echo $keterangan[$key]['nilai'] ?>" min="0" style="width: 40%" required oninvalid="this.setCustomValidity('Data wajib diisi!')" oninput="setCustomValidity('')">    
                      </td>  
                      <input type="text" name="indikator[]"  value="<?php echo $value['id'] ?>" hidden>
                      <input type="text" name="usulan_id"  value="<?php echo $usulan->id ?>" hidden>
                    </tr>
                  <?php foreach ($value['ket'] as $key2 => $val): ?>
                    <tr>
                      <td>- <?= $val->keterangan?></td>
                      <td class="text-center">(<?= $val->nilai_minimal_keterangan.'-'.$val->nilai_maksimal_keterangan?>)</td>
                      <td></td>
                    </tr> 
                  <?php endforeach ?>
                  
                  <?php endforeach;?>
                    <tr>
                      <td colspan="3" class="text-center"><dt>Total Nilai</dt></td>
                      <td><input type="text" name="total_nilai_komponen" id="tot_nilai_komponen" onblur="b()" class="form-control" style="width: 40%"></td>
                    </tr>

                  <?php
                    /*
                  echo "<pre>";
                  print_r($indikator_keterangan);exit;*/
                  ?>
                
              </table>
            </div>
          </div>
        </div>
        <h5 class="card-header"><b>3. Penilaian Verifikasi</b></h5>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-11">
              <table class="table-metadata table-responsive"> 
                <tr>
                  <td><label style="margin-left: 20px">Penilaian Makalah 20% + Penilaian Video dan Substansi Inovasi 80%</label></td>
                  <td></td>
                  <td></td>
                  <td><input type="text" name="nilai_verifikasi" class="form-control" id="tot_verif" style="width: 25%; margin-left: 190px;" readonly="true"></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>

                  <td> <button type="submit" class="btn btn-success mt-2" > Simpan</button></td>
                </tr>
              </table>
            </div>

          </div>

          </div>

      </div>

    </div>
  </main>
</div>

<div class="modal fade bd-example-modal-xl" id="lihat_usulannn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  id="exampleModalLabel">Lihat Usulan</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="card">
       
        <div class="card-body">

          
          <div class="row">
            <!-- <i>GAMBAR</i> -->
            <div class="col-md-12">

              <table class="table">
                <tr>
                  <td><dt>Inovator</dt></td>
                  <td><?php echo $usulan->user ?></td>
                </tr>

                <tr>
                  <td><dt>Tahun</dt></td>
                  <td><?php echo $usulan->tahun ?></td>
                </tr>

                <tr>
                  <td><dt>Sub Event</dt></td>
                  <td><?php echo $usulan->subevent ?></td>
                </tr>

                <tr>
                  <td><dt>Judul</dt></td>
                  <td><?php echo $usulan->judul ?></td>
                </tr>

                <!-- <tr>
                  <td><dt>Status</dt></td>
                  <td><?php echo $usulan->status ?></td>
                </tr> -->

                <tr>
                  <td><dt>Latar Belakang</dt></td>
                  <td><?php echo $usulan->latar_belakang ?></td>
                </tr>

                <tr>
                  <td><dt>Kondisi Sebelumnya</dt></td>
                  <td><?php echo $usulan->kondisi_sebelumnya ?></td>
                </tr>

                <tr>
                  <td><dt>Sasaran & Tujuan</dt></td>
                  <td><?php echo $usulan->sasaran_n_tujuan ?></td>
                </tr>

                <tr>
                  <td><dt>Deskripsi</dt></td>
                  <td><?php echo $usulan->deskripsi ?></td>
                </tr>

                <tr>
                  <td><dt>Bahan Baku</dt></td>
                  <td><?php echo $usulan->bahan_baku ?></td>
                </tr>

                <tr>
                  <td><dt>Cara Kerja</dt></td>
                  <td><?php echo $usulan->cara_kerja ?></td>
                </tr>

                <tr>
                  <td><dt>Keunggulan</dt></td>
                  <td><?php echo $usulan->keunggulan ?></td>
                </tr>

                <tr>
                  <td><dt>Hasil yang Diharapkan</dt></td>
                  <td><?php echo $usulan->hasil_yg_diharapkan ?></td>
                </tr>

                <tr>
                  <td><dt>Manfaat</dt></td>
                  <td><?php echo $usulan->manfaat ?></td>
                </tr>

                <tr>
                  <td><dt>Rencana</dt></td>
                  <td><?php echo $usulan->rencana ?></td>
                </tr>

                <tr>
                  <td><dt>Proposal</dt></td>
                  <td><a href="#" class="btn btn-sm btn-success btn-icon-split" data-toggle="modal" data-target="#lihat_file2">
                      <span class="icon text-white-50">
                        <i class="far fa-file-alt"></i>
                      </span>
                      <span class="text">Lihat File</span>
                    </a></td>
                 <!--  <td>  <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#lihat_file2"></i>Lihat File</button></td> -->
                </tr>

                <tr>
                  <td><dt>Link Video</dt></td>
                  <td><a href="#lihat_video2" class="btn btn-sm btn-success btn-icon-split" data-toggle="modal">
                      <span class="icon text-white-50">
                        <i class="fab fa-youtube"></i>
                      </span>
                      <span class="text">Lihat Video</span>
                    </a></td>
                 <!--  <td><a href="#lihat_video2" class="btn btn-sm btn-success" data-toggle="modal">Lihat Video</a></td> -->
                </tr>

                <tr>
                  <td><dt>Gambar</dt></td>
                  <td><a href="#" class="btn btn-sm btn-success btn-icon-split" data-toggle="modal" data-target="#lihat_gambar2">
                      <span class="icon text-white-50">
                        <i class="far fa-image"></i>
                      </span>
                      <span class="text">Lihat Gambar </span>
                    </a></td>
                  <!-- <td>  <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#lihat_gambar2"></i>Lihat Gambar</button></td> -->
                </tr>

                <!-- <tr>
                  <td><dt>Jurnal</dt></td>
                  <td><?php echo $usulan->jurnal ?></td>
                </tr> -->
                <tr>
                  <td><dt>Jurnal</dt></td>
                  <td><a href="#" class="btn btn-sm btn-success btn-icon-split" data-toggle="modal" data-target="#lihat_jurnal2">
                      <span class="icon text-white-50">
                        <i class="far fa-file"></i>
                      </span>
                      <span class="text">Lihat Jurnal</span>
                    </a></td>
                 <!--  <td>  <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#lihat_file2"></i>Lihat File</button></td> -->
                </tr>

              </table>
              
            </div>

          </div>

        
        </div>
      </div>
        
    </div>
  </div>
</div>
</div>

<br><br>
<script type="text/javascript">
  function a(){
    var arr = document.getElementsByClassName('tot_nilai');
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }
    document.getElementById('tot_nilai_komponen').value = tot;
  } 

  function b(){
    var arr1 = document.getElementById('nil_makalah').value;
    var arr2 = document.getElementById('tot_nilai_komponen').value;

    var jumlah = ((20 / 100) * arr1) + ((80 / 100) * arr2);
    document.getElementById('tot_verif').value = jumlah.toFixed(2);
  } 
  
</script>
