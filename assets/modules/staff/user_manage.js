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


	var initTableWithPage = function() {
        var table = $('$tableWithSearch');

        var settings = {

            "sDom": "<t><'row'<p i>>",
            "destroy": true,
            "scrollCollapse": true,
            "oLanguage": {
                "sLengthMenu": "_MENU_ ",
                "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
            },
            "bPaginate": true,
            "aLengthMenu": [
              [5, 10, 25, 50, -1],
              [5, 10, 25, 50, "All"]
            ],
            "iDisplayLength": 5
        };

        table.dataTable(settings);

        // search box for table
        $('#search-table').keyup(function() {
            table.fnFilter($(this).val());
        });

        $('#table_pageing_length').change(function(){
          var settings = {

              "sDom": "<t><'row'<p i>>",
              "destroy": true,
              "scrollCollapse": true,
              "oLanguage": {
                  "sLengthMenu": "_MENU_ ",
                  "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
              },
              "bPaginate": true,
              "aLengthMenu": [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
              ],
              "iDisplayLength": this.value
          };
            table.dataTable(settings);
        });
    }

	initTableWithPage();
  
});