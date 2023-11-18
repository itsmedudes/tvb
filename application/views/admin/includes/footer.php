</div>
<a href="javascript:void(0);" class="btn btn-icon btn-circle btn-theme btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
      </div>
      <script src="<?=base_url()?>assets/admin/js/vendor.min.js" ></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
      <script src="<?=base_url()?>assets/admin/plugins/gritter/js/jquery.gritter.js"></script>
      <script src="<?=base_url()?>assets/admin/js/app.min.js" type="d1f0805ccdeb1c3d36f9a679-text/javascript"></script>
      
      <script src="<?=base_url()?>assets/admin/plugins/sweetalert/dist/sweetalert.min.js"></script>           
    <script src="<?=base_url()?>assets/admin/js/rocket-loader.min.js" data-cf-settings="d1f0805ccdeb1c3d36f9a679-|49" defer=""></script>

    <script src="<?=base_url()?>assets/admin/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/admin/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?=base_url()?>assets/admin/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?=base_url()?>assets/admin/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    

  
    <script src="<?=base_url()?>assets/admin/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?=base_url()?>assets/admin/plugins/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="<?=base_url()?>assets/admin/plugins/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="<?=base_url()?>assets/admin/plugins/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?=base_url()?>assets/admin/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?=base_url()?>assets/admin/plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?=base_url()?>assets/admin/plugins/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?=base_url()?>assets/admin/plugins/pdfmake/build/vfs_fonts.js"></script>
    <script src="<?=base_url()?>assets/admin/plugins/jszip/dist/jszip.min.js"></script>


      
   </body>
</html>
<script>
var path = window.location.href;
$(".menu-link").each(function() {
    if (this.href === path) {
        $(this).parent().addClass("active");
        $(this).parent().parent().parent().addClass("active");
    }
});
</script>

<script src="<?=base_url()?>assets/script.js">
</script>