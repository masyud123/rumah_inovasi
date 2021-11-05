<div class="container-fluid">

  <a href="#" class="btn btn-sm btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#tambah_user">
      <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
      </span>
      <span class="text">Tambah User</span>
  </a>
  
	<!-- <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah_user"><i class="fas fa-plus fa-sm"></i> Tambah User</button> -->
  <h5>DATA USER</h5>
  <?php echo $this->session->flashdata('message');  ?>
	<table class="table table-hover table-responsive">
		<tr>
			<th class="text-center table-secondary">No</th>
			<th class="text-center table-secondary">Nama</th>
			<th class="text-center table-secondary">Email</th>
			<!-- <th class="table-secondary">Password</th> -->
			<th class="text-center table-secondary">Satuan Kerja</th>
			<th class="text-center table-secondary">Kecamatan</th>
			<th class="text-center table-secondary">Hak Akses</th>
			<th class="text-center table-secondary">Status</th>
			<th class="text-center table-secondary" colspan="2">Aksi</th>
			
		</tr>

		 <?php 
	      $no=1;
	      foreach($user as $usr) : ?>

      <tr>
        <td align="center"><?php echo $no++ ?></td>
        <td><?php echo $usr->nama ?></td>
        <td><?php echo $usr->email ?></td>
        <!-- <td><?php echo $usr->password ?></td> -->
        <td><?php echo $usr->satuan_kerja ?></td>
        <td><?php echo $usr->kecamatan ?></td>
        <td><?php echo $usr->hak_akses ?></td>
        <td><?php echo $usr->status ?></td>
        <td align="center" style="width: 50"><?php echo anchor('admin/data_user/edit/' .$usr->id_usr, '<div class="btn btn-sm btn-primary btn"><i class="fa fa-edit"></i>Edit</div>') ?></td>
        <td align="center" style="width: 50"><div class="btn btn-sm btn-danger btn" data-toggle="modal" data-target="#hapus_user<?php echo $usr->id_usr ?>"><i class="fa fa-trash"></i> <a>Hapus</a></div></td>
      </tr>
      <div class="modal fade" id="hapus_user<?php echo $usr->id_usr ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"  id="exampleModalLabel">Hapus Data</h5>
          </div>
          <form action="<?php echo base_url('admin/data_user/hapus/') ?>" enctype="multipart/form-data" method="post">
            <input hidden value="<?php echo $usr->id_usr?>" type="text" name="id_usr">
            <div class="modal-body">
              <p>Apakah Anda yakin akan menghapus data ini?</p>

                <div class="modal-footer">
                  <!-- <?php echo anchor('admin/data_user/hapus/' .$usr->id_usr, '<div class="btn btn-danger btn">Hapus</div>') ?> -->
                  <button type="submit" class="btn btn-danger" >Iya</button>
                  <button type="close" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
          </form>
      </div>
    </div>

    <?php endforeach; ?>
	</table>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  id="exampleModalLabel">Tambah User</h5>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/data_user/tambah_user'; ?>" method="post" enctype="multipart/form-data" >

          <div class="form-group row ml-4">
            <dt class="mr-4 text-size 25">Nama</dt>
            <input type="text" name="nama" style="position: absolute; left: 138px; width: 60%" class="form-control col-sm-8 ml-3" required oninvalid="this.setCustomValidity('Data wajib diisi!')" oninput="setCustomValidity('')">
          </div><br>

          <div class="form-group row ml-4">
            <dt class="mr-3">Email</dt>
            <input type="email" name="email" style="position: absolute; left: 130px; width: 60%" class="form-control col-sm-8 ml-4" required oninvalid="this.setCustomValidity('Data wajib diisi dan format harus sesuai!')" oninput="setCustomValidity('')">
          </div><br>

          <div class="form-group row ml-4">
            <dt class="mr-3">Password</dt>
            <input type="password" name="password" style="position: absolute; left: 130px; width: 60%" class="form-control col-sm-8 ml-4" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Password harus lebih dari 8 karakter, mengandung huruf BESAR, huruf kecil dan angka" required >
          </div><br>

          <div class="form-group row ml-4">
            <dt class="mr-1">Satuan Kerja</dt>
            <select class="form-control col-sm-8 ml-3" name="satuan_kerja" style="position: absolute; left: 138px; width: 60%" required oninvalid="this.setCustomValidity('Data wajib diisi!')" oninput="setCustomValidity('')">
              <option>-</option>
              <option>Bappeda</option>
              <option>Kominfo</option>
              <option>Kecamatan</option>
            </select>
          </div><br>

          <div class="form-group row ml-4">
            <dt class="mr-2">Kecamatan</dt>
            <select class="form-control col-sm-8 ml-4" name="kecamatan" style="position: absolute; left: 130px; width: 60%" required oninvalid="this.setCustomValidity('Data wajib diisi!')" oninput="setCustomValidity('')">
              <option>-</option>
              <option>Barat</option>
              <option>Bendo</option>
              <option>Karangrejo</option>
              <option>Karas</option>
              <option>Kartoharjo</option>
              <option>Kawedanan</option>
              <option>Lembeyan</option>
              <option>Magetan</option>
              <option>Maospati</option>
              <option>Ngariboyo</option>
              <option>Nguntoronadi</option>
              <option>Panekan</option> 
              <option>Parang</option>
              <option>Plaosan</option>
              <option>Poncol</option>
              <option>Sidorejo</option>
              <option>Sukomoro</option>
              <option>Takeran</option>
            </select>
          </div><br>

           <div class="form-group row ml-4">
            <dt class="mr-3">Hak Akses</dt>
            <select class="form-control col-sm-8 ml-4" name="hak_akses" style="position: absolute; left: 130px; width: 60%" required oninvalid="this.setCustomValidity('Data wajib diisi!')" oninput="setCustomValidity('')">
              <option>-</option>
              <option>Admin_Bappeda</option>
              <option>Admin_OPD</option>
              <option>Admin_Kecamatan</option>
              <option>Penilai</option>
              <option>Peserta</option>
            </select>
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

<script>
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }
  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>