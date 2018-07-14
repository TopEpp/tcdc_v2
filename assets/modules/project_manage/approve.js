$(function(){

  // $('.tab_btn').click(function(){
  //    var tab_id = this.id;
  //    $('.tab_btn').removeClass('active');
  //    $('.tab-pane').removeClass('active');

  //    var id = tab_id.split('_');
  //    $('#'+this.id).addClass('active');
  //    $('#tab'+id[1]).addClass('active');
  // });

  var reg_status = $('#reg_status').val();
  if(reg_status==1){
    // $('#div_reject').hide();
  }else{
    // $('#div_reject').show();
  }

  // var check = false;
  $('#radio5Yes').click(function(){
    $('#reg_status').val(1);
    // $('#div_reject').hide();
  });

  $('#radio5No').click(function(){
    $('#reg_status').val(0);
    // $('#div_reject').show();
  });
    
  $('#btn-finish').click(function(){
    if($('#reg_status').val()!=1 && $('#reject_detail').val()==''){
      alert('โปรดระบุส่งที่ต้องแก้ไข');
      $('#reject_detail').focus();
    }else{
      $('#form-profile-approve').submit();
    }
    
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
                $("input[name='reject_detail']").val(html);
            }
        }
    });

  $('.work_talk_detail').wysihtml5({
        events: {
            change: function() {
                var html = this.textarea.getValue();
                $("input[name='work_talk_detail']").val(html);
            }
        }
    });

  $('.join_property').wysihtml5({
        events: {
            change: function() {
                var html = this.textarea.getValue();
                $("input[name='join_property']").val(html);
            }
        }
    });


}); 


(function($) {

    'use strict';

    $(document).ready(function() {

        $('#rootwizard_appv').bootstrapWizard({
            onTabClick : function () {
                return true;
              },
            onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index +1;

                // If it's the last tab then hide the last button and show the finish instead
                
                if ($current >= $total) {
                    $('#rootwizard_appv').find('.pager .next').hide();
                    $('#rootwizard_appv').find('.pager .finish').show().removeClass('disabled hidden');
                } else {
                    $('#rootwizard_appv').find('.pager .next').show();
                    $('#rootwizard_appv').find('.pager .finish').hide();
                }

                var li = navigation.find('li a.active').parent();

                var btnNext = $('#rootwizard_appv').find('.pager .next').find('button');
                var btnPrev = $('#rootwizard_appv').find('.pager .previous').find('button');

                // remove fontAwesome icon classes
                function removeIcons(btn) {
                    btn.removeClass(function(index, css) {
                        return (css.match(/(^|\s)fa-\S+/g) || []).join(' ');
                    });
                }

                if ($current > 1 && $current < $total) {

                    var nextIcon = li.next().find('.fa');
                    var nextIconClass = nextIcon.attr('class').match(/fa-[\w-]*/).join();

                    removeIcons(btnNext);
                    btnNext.addClass(nextIconClass + ' btn-animated from-left fa');

                    var prevIcon = li.prev().find('.fa');
                    var prevIconClass = prevIcon.attr('class').match(/fa-[\w-]*/).join();

                    removeIcons(btnPrev);
                    btnPrev.addClass(prevIconClass + ' btn-animated from-left fa');
                } else if ($current == 1) {
                    // remove classes needed for button animations from previous button
                    btnPrev.removeClass('btn-animated from-left fa');
                    removeIcons(btnPrev);
                } else {
                    // remove classes needed for button animations from next button
                    btnNext.removeClass('btn-animated from-left fa');
                    removeIcons(btnNext);
                }
            },
            onNext: function(tab, navigation, index) {
                console.log("Showing next tab");
                window.scrollTo(0, 0);
                $('.previous').show();
            },
            onPrevious: function(tab, navigation, index) {
                console.log("Showing previous tab");

                var $total = navigation.find('li').length;
                var $current = index + 1;
                if ($current == 1) {
                  $('#btn_back').hide();
                }
            },
            onInit: function() {
                $('#rootwizard_appv ul').removeClass('nav-pills');
            },
          

        });

        

    });

})(window.jQuery);


