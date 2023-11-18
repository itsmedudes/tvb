<?php $this->load->view('admin/includes/header'); ?>
<!-- main -->
<div class="panel panel-inverse">
   <div class="panel-heading">
      <h4 class="panel-title">General Information</h4>

      <div class="panel-heading-btn">
         <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
         <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
          <a href='<?=base_url($back_url)?>' class="btn btn-xs btn-warning ml-2" ><i class="fa fa-backward"></i> Back</a>
         
      </div>
   </div>
   <div class="panel-body">
      <table id="data-table-default" class="table table-striped table-bordered align-middle">
         <thead>
            <tr>
               <th width="1%">S.No</th>
               <th class="text-nowrap">Name</th>
               <th class="text-nowrap">Email</th>
               <th class=text-nowrap>Course</th>
               <th class=text-nowrap>Joining Date5</th>
               
        
            </tr>
         </thead>
         <tbody>
            
            <?php
               if(!empty($row)){
             foreach($row as $key => $value):
               
               ?>

            <tr class="odd">
               <td width="1%" class="fw-bold"><?=++$key?></td>
              
               <td><?=$value->student_name ?></td>
               <td><?=$value->email ?></td>
               <td><?=$value->course_name ?></td>
               <td><?=$value->joining_date ?></td>
              
               
            </tr>

         <?php endforeach; }?>
           
         </tbody>
      </table>
   </div>

</div>
<!-- main -->
<?php $this->load->view('admin/includes/footer'); ?>
<script>
   $('#data-table-default').DataTable({
     responsive: true
   });
</script>





