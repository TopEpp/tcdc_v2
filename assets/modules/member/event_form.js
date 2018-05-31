
  $(function()
  {
      
    $('.datepicker-range').datepicker({
        format: "yyyy",
         weekStart: 1,
        // orientation: "bottom",
        // language: "{{ app.request.locale }}",
            // keyboardNavigation: false,
        viewMode: "years",
        minViewMode: "years"
    });

    $('.datepicker-range_event').datepicker({
        // dateFormat: 'yy-dd-mm',
    });
    // $('#form-event-profile').validate();
   
    var cloneIndex = $(".clonedInput").length;
  
    function clone(){
         console.log(cloneIndex)
        var clone_data = $("#second").parents(".clonedInput").clone()
            .appendTo(".clone-form")
            .attr("id", "clonedInput" +  cloneIndex)
            .find("*")
            // .each(function(){  
            //     // $(this).val('');
            //  })
            .on('click', 'a#clone', clone);
        // .on('click', 'button.remove', remove);

               
        cloneIndex++;

        $('#num', clone_data).text("1. ข้อมูลชิ้นงานชิ้นที่ " + cloneIndex);
        $('input', clone_data).val('');
        $("input[name='product_img[1][]']", clone_data).attr("name",'product_img['+cloneIndex+'][]');
        $("input[name='product_closeup[1][]']", clone_data).attr("name",'product_closeup['+cloneIndex+'][]');
        $("input[name='product_packshot[1][]']", clone_data).attr("name",'product_packshot['+cloneIndex+'][]');
        $('.select2', clone_data).remove();
        $('.datepicker-range').datepicker(); 
        $("select[name='product_type[]']").select2();
    }
    
    function remove(){
        $(this).parents(".clonedInput").remove();
    }

    $("a.clone").on("click", clone);

    $("button.remove").on("click", remove);

  })

  $(document).ready(function() {

     //job change 
     $("#job").change(function(){
        if ($(this).val() ==  11){
           
           document.getElementById("job_detail").style.display = "block";
        }else{
          document.getElementById("job_detail").value = "";
          document.getElementById("job_detail").style.display = "none";
        }
      });

          //prename
    // if (document.getElementById("prename").value == 4){
    //     document.getElementById("prename_detail").style.display = "block";
    //     // $("input[name='prename_detail']").focus();
    //   }
    //   $('#prename').on('change', function() {
    //       if(this.value == 4){
    //         document.getElementById("prename_detail").style.display = "block";
    //         $("input[name='prename_detail']").focus();
    //       }else{
    //         document.getElementById("prename_detail").style.display = "none";
    //       }
    //   });
  


    //target_type checked
    $("#check15").change(function() {
   
     
        if ($('#check15').is(":checked"))
        {
            document.getElementById("target_type").style.display = "block";
        }
        else{
            document.getElementById("target_type").style.display = "none";
        }
    });

// //get status company
//     $company =   $("input[name=radio1]:checked").map(function() {
//     return this.value;
//     }).get().join(",");

//     if ($company != 1){
//     document.getElementById("radio-company").style.display = "none";
//     }
//     else{
//     document.getElementById("radio-company").style.display = "block";
//     }

//     $('#radio1No').on('change', function() {
//         if($('input[name=radio1]').is(':checked')){
//             document.getElementById("radio-company").style.display = "block";
//             // $("$company_province").prop( "disabled", 'disabled' );
//         }
//     });

//     $('#radio1Yes').on('change', function() {
//         if($('input[name=radio1]').is(':checked')){
//             document.getElementById("radio-company").style.display = "none";
//             // $("$company_province").prop( "disabled", 'disabled' );
//         }
//     });

    //end check company

     //hidden agent
     $('#agent').hide();
    
     //get status agent
     $('#radio2No').on('change', function() {
         if($('input[name=radio2]').is(':checked')){
             $('#agent').show();
         }
     });
     $('#radio2Yes').on('change', function() {
         if($('input[name=radio2]').is(':checked')){
             $('#agent').hide();
         }
     });
     //end status agent
 
    
   

    $('#btn-next #tab1').click(function(){
        if(!$('#checkbox2').is(":checked") || !$('#product_check').is(":checked")){
            return false;
        }

        // max select file upload
        $("#product_img").on("change", function() {
            if($("#product_img")[0].files.length > 5) {
                alert("คุณสามารถเรียกภาพได้สูงสุด 5 ภาพ");
                return false;
            } 
        });

        $("#product_closeup").on("change", function() {
            if($("#product_closeup")[0].files.length > 5) {
                alert("คุณสามารถเรียกภาพได้สูงสุด 5 ภาพ");
                return false;
            } 
        });

        $("#product_packshot").on("change", function() {
            if($("#product_packshot")[0].files.length > 5) {
                alert("คุณสามารถเรียกภาพได้สูงสุด 5 ภาพ");
                return false;
            } 
        });
        //end file upload
        
        
    });

    $('#btn-finish').click(function(){

      
        $('#form-event-profile').submit();
    });
 
  });

