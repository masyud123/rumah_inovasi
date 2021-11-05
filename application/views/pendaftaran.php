<body class="bg-gradient-info">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-9">
                <br>
                <br>
                <br>
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">PENDAFTARAN</h1>
                                    </div>
                                    <?php echo $this->session->flashdata('pesan')?>
                                    <form method="post" action="<?php echo base_url('pendaftaran/index') ?>" class="user">

                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                                placeholder="Nama..." name="nama" onkeypress="return event.charCode < 48 || event.charCode  >57">
                                            <?php echo form_error('nama', '<div class="text-danger small ml-2">', '</div>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                                placeholder="Email..." name="email">
                                            <?php echo form_error('email', '<div class="text-danger small ml-2">', '</div>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                    id="password_1" placeholder="Password" name="password_1" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Password harus lebih dari 8 karakter, mengandung huruf BESAR, huruf kecil dan angka" required>
                                                <?php echo form_error('password_1', '<div class="text-danger small ml-2">', '</div>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                    id="password_2" placeholder="Ulangi Password" name="password_2">
                                        </div>
                                        <!-- <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                
                                            </div>
                                            <div class="col-sm-6">
                                                
                                            </div>
                                        </div> -->

                                        <div class="form-group ml-3">
                                            <input type="checkbox" id="show-password">
                                            <label for="show-hide">Tampilkan Password</label>
                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                            <script>
                                              $(document).ready(function(){  
                                               $('#show-password').click(function(){
                                                if($(this).is(':checked')){
                                                 $('#password_1, #password_2').attr('type','text');
                                                }else{
                                                 $('#password_1, #password_2').attr('type','password');
                                                }
                                               });
                                              });
                                            </script>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block"><i class="fas fa-user-plus"></i> Daftar</button>
                                        
                                    </form>
                                    <hr>
                            
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url('login') ?>">Sudah Punya Akun ? Silahkan Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script>
var myInput = document.getElementById("password_1");
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
</body>