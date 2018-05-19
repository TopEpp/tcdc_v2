$(function(){ 
	$('.wysiwyg').wysihtml5();
    $('#form-news').validate();

	$('#delPrjBtn').click(function(){
		$('#form-del-project').submit();
	});

	$('#delNewsBtn').click(function(){
		$('#form-del-news').submit();
	});

	$('#btnSubmitNews').click(function(){
		$('#form-news').submit();
	});

	$('#show-modal-news').click(function(){
		$('#form_type').html('สร้าง');
		$('#form_btn_type').html('สร้าง');
		$('#news_id').val('');
		$('#news_name').val('');
		$('#news_type').val('');
		$('#news_url').val('');

		$('#news_detail').data("wysihtml5").editor.setValue('');
	});

});

function delProject(pid){
	var project_name = $('#project_name_'+pid).html();
	$('#prj_name_del').html(' "'+project_name+'" ');
	$('#del_prj_id').val(pid);
	$('#modal-delproject').modal('show');
}

function delNews(nid){
	var news_name = $('#news_name_'+nid).html();
	$('#news_name_del').html(' "'+news_name+'" ');
	$('#del_news_id').val(nid);
	$('#modal-delnews').modal('show');

}

function editNews(nid){
	$('#form_type').html('แก้ไข');
	$('#form_btn_type').html('แก้ไข');
	$('#news_id').val(nid);
	$('#news_name').val($('#news_name_'+nid).html());
	$('#news_type').val($('#news_type_'+nid).html());
	// $('#news_detail').val($('#news_detail_'+nid).val());
	$('#news_url').val($('#news_url_'+nid).val());

	// var wysihtml5Editor = $('#news_detail').wysihtml5().data("wysihtml5").editor;
	// wysihtml5Editor.setValue($('#news_detail_'+nid).val(), true);

	$('#news_detail').data("wysihtml5").editor.setValue($('#news_detail_'+nid).val());
}