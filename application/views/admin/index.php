<?php $this->load->view('admin/includes/header'); ?>
         
         

   <!-- main -->
   <div class="row">
      <div class="col-xl-3 col-md-6">
         <div class="widget widget-stats bg-blue">
            <div class="stats-icon"><i class="fa fa-users"></i></div>
            <div class="stats-info">
               <h4>TOTAL STUDENTS</h4>
               <p><?=(!empty($total_students)) ? $total_students : 0?></p>
            </div>
            <div class="stats-link">
               <a href="<?=base_url('admin/student')?>">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
         </div>
      </div>
       <div class="col-xl-3 col-md-6">
         <div class="widget widget-stats bg-info">
            <div class="stats-icon"><i class="fa fa-book"></i></div>
            <div class="stats-info">
               <h4>TOTAL COURSE</h4>
               <p><?=(!empty($total_courses)) ? $total_courses : 0?></p>
            </div>
            <div class="stats-link">
               <a href="<?=base_url('admin/course')?>">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
         </div>
      </div>
    
   </div>
   <!-- main -->
         
         


  <?php $this->load->view('admin/includes/footer'); ?>