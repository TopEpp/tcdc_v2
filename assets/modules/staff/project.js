
  $(function()
  {

    $('.datepicker-range').datepicker();
    $('.wysiwyg').wysihtml5();
    $('#form-project').validate();
    
    // var validator = $('#form-project').validate({
    //   rules : {
    //     project_name : "required",
    //     project_start_date : "required",
    //     project_finish_date : "required",
    //     register_start_date : "required",
    //     register_start_date : "required",
    //     project_provenance : "required",
    //     project_detail : "required"
    //   },
    //   messages : {
    //     project_name : "กรุณากรอกชื่อโครงการ",
    //     project_start_date : "required",
    //     project_finish_date : "required",
    //     register_start_date : "required",
    //     register_finish_date : "required",
    //     project_provenance : "required",
    //     project_detail : "required"
    //   }
    // });

    $('.checkbox_owner').click(function(){
      var owner_id = [];
      $(".checkbox_owner").each(function() {
        if (document.getElementById(this.id).checked) {
          owner_id.push(this.value);    
        }
      });

      document.getElementById('owner_id').value = owner_id.join(",");
      
    });

    var owner_id = $('#owner_id').val();
    owner_id = owner_id.split(',');
    owner_id.forEach(function(i){
      if(i){
       document.getElementById("owner_"+i).checked = true;
      }
    });

    

    $('#btn-finish').click(function(){
      // $('#form-project').validate();
      $('#form-project').submit();
    });


  });


