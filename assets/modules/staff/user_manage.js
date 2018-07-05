function delUser(pid,name){
    // var project_name = $('#project_name_'+pid).html();
    $('#name_del').html(' "'+name+'" ');
    $('#del_id').val(pid);
    $('#modal-delUser').modal('show');
  }

  $(function(){ 

	$('#delBtn').click(function(){
		$('#form-del-user').submit();
	});


});