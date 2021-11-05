<div class="container-fluid">
    <h5>Data Nominator</h5>
    <!-- <form action="<?php echo base_url(). 'penilai/data_verifikasi/cari_verifikasi'; ?>" method="post" > -->
        <td><div class="form-row align-items-center">
            <div class="col-auto my-1">
              <select class="custom-select mr-sm-2" name="cari_verifikasi" id="myInput" onkeyup="filter_tahun()">
                <option disabled selected>Pilih Tahun</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
              </select>
            </div>
            <div class="col-auto my-1">
              <button type="submit" onclick="filter_tahun()" class="btn btn-sm btn-primary btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-search"></i>
                  </span>
                  <span class="text">Filter</span>
              </button>

              <!-- <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>  Filter</button> -->
            </div>
          </div>
        </td>
     <!--  </form>  -->
    
    <?php echo $this->session->flashdata('messagee');  ?>
    <table id="myTable" class="table table-hover table-responsive" style="width: 100%">
      <tr>
        <th class="text-center table-secondary">No</th>
        <th class="table-secondary">Tahun</th>
        <th class="table-secondary">Sub Event</th>
        <th class="table-secondary">Nama Inovasi</th>
        <th class="table-secondary">Inovator</th>
        <th class="text-center table-secondary" colspan="2">Aksi</th>
      </tr>

      <?php 
      $no=1;
      foreach($usulan as $usl) : ?>

      <tr>
        <td class="text-center"><?php echo $no++ ?></td>
        <td><?php echo $usl->tahun ?></td>
        <td><?php echo $usl->subevent ?></td>
        <td><?php echo $usl->judul ?></td>
        <td><?php echo $usl->user ?></td>
        <td align="center" style="width: 50"><?php echo anchor('penilai/data_nominator/view/' .$usl->id, '<div class="btn btn-sm btn-warning btn"><i class="fa fa-search-plus"></i> Lihat</div>') ?>
        </td>
        <td align="center" style="width: 50">
            <div class="form-group row">  
                <?php echo anchor('penilai/data_nominator/nilai_nominator/' .$usl->id, '<div class="btn btn-sm btn-primary "><i class="fa fa-edit"></i> Nilai</div>') ?>  
                <?php foreach ($ganti_warna2 as $wrn): ?>
                  <?php if($wrn->id_usulan == $usl->id): ?>
                    <button style="position: absolute;" class="btn btn-sm btn-secondary" disabled="" ><i class="fa fa-edit"> Nilai</i></button>
                  <?php endif; ?>
                <?php endforeach ?>
            </div>
          </td>
        <!-- <td align="center" style="width: 50">
          <?php echo anchor('penilai/data_nominator/nilai_nominator/' .$usl->id, '<div class="btn btn-sm btn-primary "><i class="fa fa-edit"></i> Nilai</div>') ?>  
        </td> -->
      </tr>
      <?php endforeach; ?>
    </table>
  </div>

<script>
function filter_tahun() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

    




