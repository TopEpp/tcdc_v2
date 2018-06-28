$(function(){
  $('.tab_btn').click(function(){
     var tab_id = this.id;
     $('.tab_btn').removeClass('active');
     $('.tab-pane').removeClass('active');

     var id = tab_id.split('_');
     $('#'+this.id).addClass('active');
     $('#tab'+id[2]).addClass('active');
  });

  var initTableWithPage = function(id) {
	  var table = $('#table_'+id);

	    var settings = {
	        "sDom": "<t><'row'<p i>>",
	        "destroy": true,
	        "scrollCollapse": true,
	        "oLanguage": {
	            "sLengthMenu": "_MENU_ ",
	            "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
	        },
	        "iDisplayLength": 5
	    };

	    table.dataTable(settings);

	    // search box for table
	    $('#search-table_'+id).keyup(function() {
	        table.fnFilter($(this).val());
	    });
	}

	var table_prj_id = $('#table_prj_id').val();
	var prj_id = table_prj_id.split(',');

	$.each( prj_id, function( key, value ) {
	  initTableWithPage(value);
	});

  
});


