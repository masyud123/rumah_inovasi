<div class="container-fluid">


  
   <?php foreach($subevent as $sub) : 
      if (strtotime($sub->mulai) <= time() AND strtotime($sub->akhir) >= time()) : ?>
          <div class="row">
           <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <a href="<?php echo base_url('peserta/daftar/daftar/'.$sub->id)?>">
                        <div class="text-xl font-weight-bold text-primary text-uppercase mb-1"><?php echo $sub->subevent ?></div>
                     </a>
                     
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-book-open fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
       </div>
     <?php  endif; ?>
     
   <?php endforeach;?>      
  
</div>