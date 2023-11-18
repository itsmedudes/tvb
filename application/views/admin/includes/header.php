<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title><?=ucwords($title)?></title>
      <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
      <meta content name="description" />
      <meta content name="author" />
      <link href="<?=base_url()?>assets/admin/css/vendor.min.css" rel="stylesheet" />
      <link href="<?=base_url()?>assets/admin/css/default/app.min.css" rel="stylesheet" />
      <link href="<?=base_url()?>assets/admin/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
      <link href="<?=base_url()?>assets/admin/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
      <link href="<?=base_url()?>assets/admin/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
      <link href="<?=base_url()?>assets/admin/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="<?=base_url()?>assets/admin/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
      <link href="<?=base_url()?>assets/admin/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
        <link href="<?=base_url()?>assets/admin/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script src="<?=base_url()?>assets/admin/plugins/select2/dist/js/select2.full.min.js"></script>
      <script src="<?=base_url()?>assets/admin/plugins/select2/dist/js/select2.min.js"></script>
      <!-- Toaster -->

      <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

      <script src="<?=base_url()?>assets/admin/plugins/toaster/toastr.min.js"></script>
      <link href="<?=base_url()?>assets/admin/plugins/toaster/toastr.min.css" rel="stylesheet" />






   </head>
   <body>
      <div id="loader" class="app-loader">
         <span class="spinner"></span>
      </div>

      <?php $this->load->view('admin/includes/navbar'); ?>
               <div id="content" class="app-content">
            <ol class="breadcrumb float-xl-end">
               <li class="breadcrumb-item"><a href="<?=base_url($title_url)?>">Home</a></li>
               <li class="breadcrumb-item active"><?=ucwords($breadcrumb)?></li>
            </ol>
            <h1 class="page-header"><?=ucwords($breadcrumb)?></h1>