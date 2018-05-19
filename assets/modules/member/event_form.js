
  $(function()
  {
      
    $('.datepicker-range').datepicker();
    $('#form-event-profile').validate();
   

    var regex = /^(.+?)(\d+)$/i;
    var cloneIndex = $(".clonedInput").length;
  
    function clone(){

        var clone_data = $("#second").parents(".clonedInput").clone()
        .appendTo(".clone-form")
        .attr("id", "clonedInput" +  cloneIndex)
        .find("*")
        .each(function() {
            var id = this.id || "";
            var match = id.match(regex) || [];
            if (match.length == 3) {
                this.id = match[1] + (cloneIndex);
            }
            
        })
        .on('click', 'a#clone', clone)
        // .on('click', 'button.remove', remove);
        
        cloneIndex++;

        $('#num', clone_data).text(cloneIndex+". ข้อมูลชิ้นงานชิ้นที่ " + cloneIndex);
        // $('#myDatepicker', clone_data).attr("id","myDatepicker"+cloneIndex);
        $('.datepicker-range').datepicker();


       
    }
    
    function remove(){
        $(this).parents(".clonedInput").remove();
    }

    $("a.clone").on("click", clone);

    $("button.remove").on("click", remove);

  })

  $(document).ready(function() {

     //get status company
     $company =   $("input[name=radio1]:checked").map(function() {
        return this.value;
     }).get().join(",");

    //chechk company 
    if ($company != 1){
        $("input[name='company_name']").prop( "disabled", true );
        $("input[name='company_address']").prop( "disabled", true );
        $("input[name='company_district']").prop( "disabled", true );
        $("input[name='company_subdistrict']").prop( "disabled", true );
        $("input[name='company_zipcode']").prop( "disabled", true );
        // $("$company_province").prop( "disabled", 'disabled' );
    }

    $('#radio1No').on('change', function() {
        if($('input[name=radio1]').is(':checked')){

            $("input[name='company_name']").prop( "disabled", false );
            $("input[name='company_address']").prop( "disabled", false );
            $("input[name='company_district']").prop( "disabled", false );
            $("input[name='company_subdistrict']").prop( "disabled", false );
            $("input[name='company_zipcode']").prop( "disabled", false );
            // $("$company_province").prop( "disabled", 'disabled' );
        }
    });

    $('#radio1Yes').on('change', function() {
        if($('input[name=radio1]').is(':checked')){
            $("input[name='company_name']").prop( "disabled", true );
            $("input[name='company_address']").prop( "disabled", true );
            $("input[name='company_district']").prop( "disabled", true );
            $("input[name='company_subdistrict']").prop( "disabled", true );
            $("input[name='company_zipcode']").prop( "disabled", true );
            // $("$company_province").prop( "disabled", 'disabled' );
        }
    });

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
 

    $('#btn-next').click(function(){
        if(!$('#checkbox2').is(":checked")){
            return false;
        }
    });

    $('#btn-finish').click(function(){
      $('#form-event-profile').submit();
    });
 
  });

