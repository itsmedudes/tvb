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
<form method="post" class="form-data" action="<?=base_url($form_submit)?>" novalidate >
   <div class="row">
      <!-- personal Information -->
      <fieldset>
         <legend>Category</legend>
         <div class='row'>
            <div class="mb-3 col-md-12">
               <label class="form-label">Course Name *</label>
               <input class="form-control" type="text" required placeholder="Course Name" value="<?php if(!empty($row))echo $row->name ?>" name="name" />
            </div>
            <div class="mb-3 col-md-12">
               <label class="form-label">Course Description *</label>
               <textarea class="form-control"  name="description" > <?php if(!empty($row))echo $row->description?></textarea>
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




