$(function(){
  $('.tab_btn').click(function(){
     var tab_id = this.id;
     $('.tab_btn').removeClass('active');
     $('.tab-pane').removeClass('active');

     var id = tab_id.split('_');
     $('#'+this.id).addClass('active');
     $('#tab'+id[2]).addClass('active');
  });

  
});


