/* ============================================================
 * Form Wizard
 * Multistep form wizard using Bootstrap Wizard Plugin
 * For DEMO purposes only. Extract what you need.
 * ============================================================ */
(function($) {

        // show
        $(".product_concept").wysihtml5({
            events: {
                change: function() {
                    var html = this.textarea.getValue();
                    $("input[name='product_concept[]']").val(html);
                }
            }
        });

        $('#btn-finish').click(function(){
            $('#form-event-profile').submit();
        });

        $("input[name='showarea_type']").change(function() {
            $("input[name='showarea_type']").not(this).prop('checked', false);
        });
        $("input[name='area_type']").change(function() {
            $("input[name='area_type']").not(this).prop('checked', false);
        });
        $("input[name='show_type']").change(function() {
            $("input[name='show_type']").not(this).prop('checked', false);
        });

    'use strict';

    $(document).ready(function() {

        $('#event-form').bootstrapWizard({
            onTabClick : function () {
                return true;
              },
            onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                console.log($total)
                var $current = index + 1;

                // If it's the last tab then hide the last button and show the finish instead
                if ($current >= 4) {
                    $('#event-form').find('.pager .next').hide();
                    $('#event-form').find('.pager .finish').show().removeClass('disabled hidden');
                } else {
                    $('#event-form').find('.pager .next').show();
                    $('#event-form').find('.pager .finish').hide();
                }

                var li = navigation.find('li a.active').parent();

                var btnNext = $('#event-form').find('.pager .next').find('button');
                var btnPrev = $('#event-form').find('.pager .previous').find('button');

                // remove fontAwesome icon classes
                function removeIcons(btn) {
                    btn.removeClass(function(index, css) {
                        return (css.match(/(^|\s)fa-\S+/g) || []).join(' ');
                    });
                }
                $('#hide_back').toggle(true);
                $('#previous_hide').toggle(false);
                if ($current > 1 && $current < 4) {

                    var nextIcon = li.next().find('.fa');
                    var nextIconClass = nextIcon.attr('class').match(/fa-[\w-]*/).join();

                    removeIcons(btnNext);
                    btnNext.addClass(nextIconClass + ' btn-animated from-left fa');

                    var prevIcon = li.prev().find('.fa');
                    var prevIconClass = prevIcon.attr('class').match(/fa-[\w-]*/).join();

                    removeIcons(btnPrev);
                    btnPrev.addClass(prevIconClass + ' btn-animated from-left fa');
                    
                } else if ($current == 1) {
                    $('#hide_back').toggle(false);
                    $('#previous_hide').toggle(true);
                    // remove classes needed for button animations from previous button
                    btnPrev.removeClass('btn-animated from-left fa');
                    removeIcons(btnPrev);
                } else {
                    
                    $('#previous_hide').toggle(false);
                    $('#hide_back').toggle(true);
                    // remove classes needed for button animations from next button
                    btnNext.removeClass('btn-animated from-left fa');
                    removeIcons(btnNext);
                }
            },
            onNext: function(tab, navigation, index) {
                console.log("Showing next tab");
                window.scrollTo(0, 0);
            },
            onPrevious: function(tab, navigation, index) {
                console.log("Showing previous tab");
            },
            onInit: function() {
                $('#event-form ul').removeClass('nav-pills');
            },
          

        });

        $('.remove-item').click(function() {
            $(this).parents('tr').fadeOut(function() {
                $(this).remove();
            });
        });

    });

})(window.jQuery);