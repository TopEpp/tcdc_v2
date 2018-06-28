$(function(){

  var initTableWithPage = function() {
	  var table = $('#table_user_reg');

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
	    $('#search-table').keyup(function() {
	        table.fnFilter($(this).val());
	    });
	}

	initTableWithPage();
  
});


