
  // $(document).ready(function() {
  //   $("#phone").mask("(999) 999-9999");
  // });

//   var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
// // Success color: #10CFBD
// elems.forEach(function(html) {
//   var switchery = new Switchery(html, {color: '#10CFBD'});
// });

  // $(document).ready(function() {
  //   $('#myDatepicker').datepicker();
  // });

  // $(document).ready(function() {
  //   $('#wysiwyg5').wysihtml5();
  // });

  // $(document).ready(function() {
  //   $('#tagsinput').tagsinput({
  //     typeahead: {
  //       source: ['ชื่อไม่ถูกต้อง', 'บัตรประชาชนไม่ชัดเจน', 'รูปภาพประจำตัวไม่ถูกต้อง', 'ที่อยู่ไม่ชัดเจน', 'ไม่ได้ระบุชื่อผลงาน']
  //     }
  //   });
  // });

  //user active status
  $(document).ready(function() {
    $("#user-active").change(function(){
   
      if($('#user-active').is(':checked')){
           $(this).val('1');
      }else{
           $(this).val('0');
      }
    });  
  });

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


    
    $('#btn-finish').click(function(){

      //check user active
      if ($('#user-active').val() != ''){
        $('#user_active').val($('#user-active').val()) ;
      }
 
      $('#form-edit-profile').submit();
    });

    $('#btn-create-finish').click(function(){

      //check user active
      if ($('#user-active').val() != ''){
        $('#user_active').val($('#user-active').val()) ;
      }
 
      $('#form-create-profile').submit();
    });
  });
