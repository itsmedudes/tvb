   function success_toaster(msg){

      toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }

      toastr["success"](msg);
   }

   function warning_toaster(msg){

      toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }

      toastr["warning"](msg);
   }


function check_required_fields(form_id)
{
  var form_ok = 1;
  $(".error-custom").remove();
  $($(form_id).find(':input')).each(function(){
         var input = $(this).prop("required"); 
         if (input == true)
         {
            if ($(this).val()=="" || $(this).val()=="0")
            {
              form_ok = 0;
              var placeholder = $(this).attr("placeholder");
              if (placeholder==undefined) placeholder = $(this).attr("name");
              $(this).next('p').remove();
              $(this).before('<span class="error-custom text text-danger" style="font-size:12px;" ><b>This field is required.</b></span>');  
              $(this).addClass("is-invalid");
              // $(this).addClass("focus-red");
              $(this).focus();
              return false;
            }
            else 
            {
              $(this).removeClass("is-invalid");
              $(this).next('.invalid-feedback').remove();
             form_ok = 1;
            }
          }
        });
  return form_ok;
}
$(document).on('submit','.form-data',function(e){
    e.preventDefault();

  

    var form = $(this);
    var form_ok = check_required_fields(form);
    if(form_ok==0) return false;



    var input_type_submit = $(form).find("input[type='submit']");
    var button_type_submit = $(form).find("button[type='submit']");
    // $(input_type_submit).attr("disabled",true);
    // $(button_type_submit).attr("disabled",true);

    
    $('.thumb_image_error').text("");
    $('multiple_image_error').text("");

    var url = $(form).attr('action');  
    var formData = new FormData(this);
      
    $.ajax({
               url: url ,
               type: "POST",
               data: formData,
               processData:false,
               contentType:false,
               cache:false,
               async:true,
               dataType: 'json',
               beforeSend : function()
               {
                // $("#err").fadeOut();
               },
               success: function(data)
               {
                  
                  // $(input_type_submit).attr("disabled",false);
                  // $(button_type_submit).attr("disabled",false);
                    


                if(data.status==200) {
                    success_toaster(data.message);
                    
                }
                 else{
                    
                    warning_toaster(data.message);
                 } 

                   


               

            
               },
               error: function() {
                   // $(input_type_submit).attr("disabled",false);
                   // $(button_type_submit).attr("disabled",false);
               },
           });
   
   })