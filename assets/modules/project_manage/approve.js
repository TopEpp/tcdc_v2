$(function(){

  var reg_status = $('#reg_status').val();
  if(reg_status==1){
    $('#div_reject').hide();
  }else{
    $('#div_reject').show();
  }

  // var check = false;
  $('#radio5Yes').click(function(){
    $('#reg_status').val(1);
    $('#div_reject').hide();
  });

  $('#radio5No').click(function(){
    $('#reg_status').val(0);
    $('#div_reject').show();
  });
    
  $('#btn-finish').click(function(){
    // if($('#reg_status').val()!=1 && $('#reject_detail').val()==''){
      // alert('โปรดระบุส่งที่ต้องแก้ไข');
      // $('#reject_detail').focus();
    // }else{
      $('#form-profile-approve').submit();
    // }
    
  });

  $(".product_concept").wysihtml5({
        events: {
            change: function() {
                var html = this.textarea.getValue();
                $("input[name='product_concept[]']").val(html);
            }
        }
    });

  $(".reject_detail").wysihtml5({
        events: {
            change: function() {
                var html = this.textarea.getValue();
                $("input[name='reject_detail[]']").val(html);
            }
        }
    });

}); 


