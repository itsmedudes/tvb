<?php $this->load->view('admin/includes/header'); ?>
<!-- main -->
<div class="panel panel-inverse">
   <div class="panel-heading">
      <h4 class="panel-title">General Information</h4>

      <div class="panel-heading-btn">
         <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
         <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
          <a href='<?=base_url($add_url)?>' class="btn btn-xs btn-warning ml-2" ><i class="fa fa-add"></i> Add <?=$breadcrumb?></a>
         
      </div>
   </div>
   <div class="panel-body">
      <table id="data-table-default" class="table table-striped table-bordered align-middle">
         <thead>
            <tr>
               <th width="1%">S.No</th>
               <th class="text-nowrap">Name</th>
               <th class=text-nowrap>Address</th>
               <th class=text-nowrap>Email</th>
               <th class=text-nowrap>Dob</th>

               <th class="text-nowrap">Operation</th>
        
            </tr>
         </thead>
         <tbody>
            
            <?php
               if(!empty($row)){
             foreach($row as $key => $value):
               
               ?>

            <tr class="odd">
               <td width="1%" class="fw-bold"><?=++$key?></td>
              
               <td><?=$value->name ?></td>
               
               <td><?=$value->address ?></td>
               <td><?=$value->email ?></td>
               <td><?=$value->dob?></td>
              

               <td>
                  <a href="<?=base_url($edit_url).'/'.$value->id?>" class="btn btn-xs btn-warning">Edit</a>
                  <a href="" class="btn btn-xs btn-success">View</a>
                  <a href="javascript:void(0)" data-id='<?=$value->id?>' class="btn btn-xs btn-danger delete-user">Delete</a>
               </td>
               
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


<script >
   
$(document).on('click',".status-change",function (e) {
   let value;
   if($(this).prop('checked')) value =1;
   else value  = 0;
   let id = $(this).val();
 
   
   $.ajax({
      url: '<?=base_url($status_change)?>',
      type: "POST",
      data:  {id : id,switch : value},
      dataType: 'json',
      beforeSend : function(){
         // $("#err").fadeOut();
      },
      success: function(data){
         if(data.status==400){
            warning_toaster(data.message);
         }
      }
   });
          

});  

//delete user 

$(document).on('click','.delete-user', function(e){

   let id = $(this).data('id');
   let element = this;


   Swal.fire({
            title: 'Are you sure?',
            text: 'This action cannot be undone!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it',
   }).then((result) => {
    
      if (result.isConfirmed) {
           $.ajax({
              url: '<?=base_url($delete_url)?>',
              type: 'POST',
              data: {id:id},
              dataType: 'json',
              beforeSend : function(){
             
               },
              success: function(data) {
                  if(data.status==200){
                     $(element).closest('tr').fadeOut();
                     success_toaster(data.message);
                  
                  }else{
                    
                    warning_toaster(data.message);
                  }

              }
              
            });
      } else if (result.isDismissed === 'cancel') {
          Swal.fire('Cancelled', 'Your item is safe.', 'info');
      }
  });
})


</script>

