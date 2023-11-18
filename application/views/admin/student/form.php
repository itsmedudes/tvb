<?php $this->load->view('admin/includes/header'); if(!empty($row)) $row=$row[0];?>
<div class="panel panel-inverse">
<div class="panel-heading">
   <h4 class="panel-title"><?=ucwords($breadcrumb)?></h4>
   <div class="panel-heading-btn">
      <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
      <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
      <a href='<?=base_url($back_url)?>' class="btn btn-xs btn-warning ml-2" ><i class="fa fa-backward"></i> Back</a>
   </div>
</div>
<div class="panel-body">
<form action="<?=base_url($form_submit)?>" method="post" class="form-data"  enctype="multipart/form-data" novalidate>
   <div class="row">
      <!-- personal Information -->
      <fieldset>
         <legend>Information</legend>
         <div class='row'>
            <div class="mb-3 col-md-6">
               <label class="form-label">Name *</label>
               <input class="form-control" type="text" required placeholder="Student Name" value="<?php if(!empty($row))echo $row->name ?>" name="name" />
            </div>

             <div class="mb-3 col-md-6">
               <label class="form-label">DOB *</label>
               <input class="form-control" type="date" required placeholder="DOB" value="<?php if(!empty($row))echo $row->dob ?>" name="dob" />
            </div>
            <div class="mb-3 col-md-6">
               <label class="form-label">Email *</label>
               <input class="form-control" type="text" required placeholder="email" value="<?php if(!empty($row))echo $row->email ?>" name="email" />
            </div>

            <?php if(empty($row)){?>
             <div class="mb-3 col-md-6">
               <label class="form-label">Course *</label>
               <select class="form-select" name="course[]" required multiple='multiple'>
                
                <?php 
                  $student_course_table = $this->crud->get('student_courses',array('student_id'=>$row->id,));
                  $course = $this->crud->get_all('course');

                  $users_data = [];
                     foreach ($student_course_table as $key => $value) {
                        $users_data[] = $value->course_id;
                     }
            
                     foreach($course as $key => $value){ 
                        $selected = '';
                        if(in_array($value->id,$users_data))
                           $selected = 'selected';
                        ?>
                        <option value="<?=$value->id?>" <?=$selected?> ><?=$value->name; ?></option>
               <?php } ?>

               
                  
               </select>
            </div>
         <?php }?>
            <div class="mb-3 col-md-6">
               <label class="form-label">Address *</label>
               <textarea class="form-control"  name="address" > <?php if(!empty($row))echo $row->address ?></textarea>
            </div>


           
          
         </div>
      </fieldset>
      
      </div>
      </div>
      <div class="col-md-12">
         <div class="panel-body">
            <div class="row">
               <div class="col-md-12" style="text-align: center;">
                  <button type="submit" class="btn btn-primary w-100px me-5px submit-data">Save</button>                     
               </div>
            </div>
         </div>
      </div>
</form>
</div>
<?php $this->load->view('admin/includes/footer');?>



