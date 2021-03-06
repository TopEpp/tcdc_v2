
  $(function()
  {

    $('.datepicker-range').datepicker();
    // $('.wysiwyg').wysihtml5();

    $(".project_detail").wysihtml5({
        events: {
            change: function() {
                var html = this.textarea.getValue();
                $("input[name='project_detail[]']").val(html);
            }
        }
    });

    $(".project_provenance").wysihtml5({
        events: {
            change: function() {
                var html = this.textarea.getValue();
                $("input[name='project_provenance[]']").val(html);
            }
        }
    });

    $('#project_type').change(function(){
      if(this.value==4){
        $('#event_type_div').show();
      }else{
        $('#event_type_div').hide();
      }
    });
    
    // $('#form-project').validate();
    
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

    $('#form-project').bootstrapWizard({
      onTabClick : function () {
        return false;
      },
      onTabChange : function(){
        console.log("onTabChange");
        alert('onTabChange');
      },
      onNext : function(){

        console.log("onNext");
        alert('onNext');
      },
      onTabShow: function(tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index + 1;

        if ($current == 0) {
          $('#btn_back').hide();
        }
      }
    });

  });


