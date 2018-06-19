
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

        //status job
        var group = $('#job').find(':selected').data('group');
        switch (group) {
            case 1:
                $( "#group_one" ).toggle(true);
                break;
            case 2:
                $( "#group_two" ).toggle(true);
              break;
            case 3:
                $( "#group_three" ).toggle(true);
              break;
            case 4:
                $( "#group_four" ).toggle(true);
              break;
          }
    
        
        //status job change 
        $('#job').change(function(){
          // $( "#foot" ).toggle(true);
          // $( "#group_four_bug" ).toggle(true);
          var group = $(this).find(':selected').data('group');
          switch (group) {
            case 1:
                $( "#group_one" ).toggle(true);
                $( "#group_two" ).toggle(false);
                $( "#group_three" ).toggle(false);
                $( "#group_four" ).toggle(false);
                break;
            case 2:
                $( "#group_one" ).toggle(false);
                $( "#group_two" ).toggle(true);
                $( "#group_three" ).toggle(false);
                $( "#group_four" ).toggle(false);
              break;
            case 3:
                $( "#group_one" ).toggle(false);
                $( "#group_two" ).toggle(false);
                $( "#group_three" ).toggle(true);
                $( "#group_four" ).toggle(false);
              break;
            case 4:
                $( "#group_one" ).toggle(false);
                $( "#group_two" ).toggle(false);
                $( "#group_three" ).toggle(false);
                $( "#group_four" ).toggle(true);
              break;
          }
            
        })

    //job change 
    // $("#job").change(function(){
    //   if ($(this).val() == 11){

    //      document.getElementById("job_detail").style.display = "block";
    //   }else{
    //     document.getElementById("job_detail").value = "";
    //     document.getElementById("job_detail").style.display = "none";
    //   }
    // });

    //prename
    // if (document.getElementById("prename").value == 4){
    //   document.getElementById("prename_detail").style.display = "block";
    //   // $("input[name='prename_detail']").focus();
    // }
    // $('#prename').on('change', function() {
    //     if(this.value == 4){
    //       document.getElementById("prename_detail").style.display = "block";
    //       $("input[name='prename_detail']").focus();
    //     }else{
    //       document.getElementById("prename_detail").style.display = "none";
    //     }
    // });

    //get status company
    $company =   $("input[name=radio1]:checked").map(function() {
      return this.value;
    }).get().join(",");
  
    if ($company != 1){
      $("#radio-company").hide();
      // document.getElementById("radio-company").style.display = "none";
    }
    else{
      document.getElementById("radio-company").style.display = "block";
    }

    $('#radio1No').on('change', function() {
      if($('input[name=radio1]').is(':checked')){
          document.getElementById("radio-company").style.display = "block";
          // $("$company_province").prop( "disabled", 'disabled' );
      }
    });

    $('#radio1Yes').on('change', function() {
        if($('input[name=radio1]').is(':checked')){
            document.getElementById("radio-company").style.display = "none";
            // $("$company_province").prop( "disabled", 'disabled' );
        }
    });

    //end check company


    $('#pass_new').on('blur ', function(e){
      document.getElementById("errors").innerHTML = '';
      var str = $('#pass_new').val();
      var err = false ;

      if (str.search(/[a-z]/) < 0) {
        err = true ;
      
      }
      if (str.search(/[0-9]/) < 0) {
        err = true ;
      }
      if(str.search(/[\!\@\#\$\%\^\&\*\(\)\_\+\.\,\;\:\-]/) < 0) {
        err = true ;
      }
      if (str.length < 8){
        err = true ;
      }
      if (err) {
        document.getElementById("errors").innerHTML = "ตั้งรหัสผ่านไม่น้อยกว่า 8 ตัวอักษร ประกอบด้วยตัวอักษร ตัวเลข และเครื่องหมาย ."
        $('#pass_new').focus();
        return false;
      }
      
    });

    $('#btn-finish').click(function(){
     
      // return false;
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
