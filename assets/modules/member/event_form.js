
  $(function()
  {

      
    $('.datepicker-year').datepicker({
        format: "yyyy",
         weekStart: 1,
        viewMode: "years",
        minViewMode: "years"
    });

    $('.datepicker-range_event').datepicker();

    
    $('.timepicker').timepicker();
    

    // show
    $(".product_concept").wysihtml5({
        events: {
            change: function() {
                var html = this.textarea.getValue();
                $("input[name='product_concept[]']").val(html);
            }
        }
    });

    //pop
    
    $(".pop_story").wysihtml5({
        events: {
            change: function() {
                var html = this.textarea.getValue();
                $("input[name='pop_story']").val(html);
            }
        }
    });

    //event
    $(".event_detail").wysihtml5({
        events: {
            change: function() {
                var html = this.textarea.getValue();
                $("input[name='event_detail']").val(html);
            }
        }
    });
    $(".join_property").wysihtml5({
        events: {
            change: function() {
                var html = this.textarea.getValue();
                $("input[name='join_property']").val(html);
            }
        }
    });

    //work talk
    $('.work_talk_detail').wysihtml5({
        events: {
            change: function() {
                var html = this.textarea.getValue();
                $("input[name='work_talk_detail']").val(html);
            }
        }
    });

    $('.textarea').wysihtml5();
   
     
    // $('#form-event-profile').validate();
   
    var cloneIndex = $(".clonedInput").length;
  
    function clone(){
        //  console.log(cloneIndex)
        var clone_data = $("#second").parents(".clonedInput").clone()
            .appendTo(".clone-form")
            .attr("id", "clonedInput" +  cloneIndex)
            .find("*")
            // .each(function(){  
            //     // $(this).val('');
            //  })
            .on('click', 'a#clone', clone);
        // .on('click', 'button.remove', remove);

               
        cloneIndex++;

        $('#num', clone_data).text("คอลเลกชั่น " + cloneIndex);
        $('input', clone_data).val('');
        $('img', clone_data).remove();
        $("input[name='product_img[1][]']", clone_data).attr("name",'product_img['+cloneIndex+'][]');
        $("input[name='product_closeup[1][]']", clone_data).attr("name",'product_closeup['+cloneIndex+'][]');
        $("input[name='product_packshot[1][]']", clone_data).attr("name",'product_packshot['+cloneIndex+'][]');
        $(".check_product", clone_data).attr("id",'check_product'+cloneIndex);
        $('.check_product_for',clone_data).attr('for','check_product'+cloneIndex);
        $('.select2', clone_data).remove();
        
        

        // $('.product_concept', clone_data).remove();
        // $(".product_concept", clone_data).attr("id",'product_concept'+cloneIndex);
        $('.datepicker-year').datepicker({
            format: "yyyy",
             weekStart: 1,
            viewMode: "years",
            minViewMode: "years"
        });
        $("select[name='product_type[]']").select2();
        // $('.product_concept').wysihtml5();
        // 

        var num = $('.product_concept').length + 1; //num is the total count of the cloned textareas
        clone_data.find('.wysiwyg5-wrapper').html('');
        clone_data.find('.wysiwyg5-wrapper').html(' <textarea name="product_concept[]" id="textarea-'+num+'" class="product_concept demo-form-wysiwyg"  placeholder="" ui-jq="wysihtml5" ui-options="{ html: true,stylesheets: ["pages/css/editor.css"]}"></textarea>');
        $('#textarea-'+num).wysihtml5({
            events: {
                change: function() {
                    var html = this.textarea.getValue();
                    $("input[name='product_concept[]']").val(html);
                }
            }
        }); 
    }
    
    function remove(){
        $(this).parents(".clonedInput").remove();
    }

    $("a.clone").on("click", clone);

    $("button.remove").on("click", remove);

  })

  $(document).ready(function() {

    //register 
    $("input[name='company_join_work']").change(function() {
        $("input[name='company_join_work']").not(this).prop('checked', false);
    });

     //job change 
    //  $("#job").change(function(){
    //     if ($(this).val() ==  11){
           
    //        document.getElementById("job_detail").style.display = "block";
    //     }else{
    //       document.getElementById("job_detail").value = "";
    //       document.getElementById("job_detail").style.display = "none";
    //     }
    //   });

            //status job
        var group = $('#job').find(':selected').data('group');
        var group_id = $('#job').find(':selected').val();
        $('#job_group').val(group);
        switch (group) {
            case 1:
                $( "#group_one" ).toggle(true);
                break;
            case 2:
                $( "#group_two" ).toggle(true);
              break;
            case 3:
                $( "#group_three" ).toggle(true);
              break;
            case 4:
                if (group_id == 8){
                    $('#four_nine_detail').prop('disabled', 'disabled');
                    $('#four_eig_detail').prop('disabled', false);
                    $( "#four_eig" ).toggle(true);
                    $( "#four_nine" ).toggle(false);
                }else{
                    $('#four_nine_detail').prop('disabled', false);
                    $('#four_eig_detail').prop('disabled', 'disabled');
                    $( "#four_nine" ).toggle(true);
                    $( "#four_eig" ).toggle(false);
                }
                $( "#group_four" ).toggle(true);
              break;
          }
    
        
        //status job change 
        $('#job').change(function(){
          // $( "#foot" ).toggle(true);
          // $( "#group_four_bug" ).toggle(true);
          var group = $(this).find(':selected').data('group');
          var group_id = $('#job').find(':selected').val();
          $('#job_group').val(group);
          switch (group) {
            case 1:
                $( "#group_one" ).toggle(true);
                $( "#group_two" ).toggle(false);
                $( "#group_three" ).toggle(false);
                $( "#group_four" ).toggle(false);
                break;
            case 2:
                $( "#group_one" ).toggle(false);
                $( "#group_two" ).toggle(true);
                $( "#group_three" ).toggle(false);
                $( "#group_four" ).toggle(false);
              break;
            case 3:
                $( "#group_one" ).toggle(false);
                $( "#group_two" ).toggle(false);
                $( "#group_three" ).toggle(true);
                $( "#group_four" ).toggle(false);
              break;
            case 4:
                if (group_id == 8){
                    $('#four_nine_detail').prop('disabled', 'disabled');
                    $('#four_eig_detail').prop('disabled', false);
                    $( "#four_eig" ).toggle(true);
                    $( "#four_nine" ).toggle(false);
                }else{
                    $('#four_nine_detail').prop('disabled', false);
                    $('#four_eig_detail').prop('disabled', 'disabled');
                    $( "#four_nine" ).toggle(true);
                    $( "#four_eig" ).toggle(false);
                }
                $( "#group_one" ).toggle(false);
                $( "#group_two" ).toggle(false);
                $( "#group_three" ).toggle(false);
                $( "#group_four" ).toggle(true);
              break;
          }
            
        });
          //prename
    // if (document.getElementById("prename").value == 4){
    //     document.getElementById("prename_detail").style.display = "block";
    //     // $("input[name='prename_detail']").focus();
    //   }
    //   $('#prename').on('change', function() {
    //       if(this.value == 4){
    //         document.getElementById("prename_detail").style.display = "block";
    //         $("input[name='prename_detail']").focus();
    //       }else{
    //         document.getElementById("prename_detail").style.display = "none";
    //       }
    //   });
    var type = $('#project_type').val();
//    console.log(type)
    switch (type) {
        case '1':
                        //clear checked form show case 
            $("input[name='target_type']").change(function() {
                $("input[name='target_type']").not(this).prop('checked', false);
                document.getElementById("target_type_detail").style.display = "none";  
                $('#target_type_detail').val('');
            
            });

            //target_type checked form show case 
            if ($('#target_ty4').is(":checked"))
            {
                document.getElementById("target_type_detail").style.display = "block";
            }
            $("#target_ty4").change(function() {
                if ($('#target_ty4').is(":checked"))
                {
                    document.getElementById("target_type_detail").style.display = "block";
                }
                else{
                    document.getElementById("target_type_detail").style.display = "none";
                }
            });
            
            break;
        case '2':
               // pop_product and food form clear checked
                $("input[name='pop_product_type']").change(function() {
                    $("input[name='pop_product_type']").not(this).prop('checked', false);
                });
            //     $("input[name='pop_type']").change(function() {
            //         $("input[name='pop_type']").not(this).prop('checked', false);
            //         $("input[name='pop_food']").prop('checked', false);
            //     });
            //     $("input[name='pop_food']").change(function() {
            //         $("input[name='pop_type']").prop('checked', false);
            //         $("input[name='pop_food']").not(this).prop('checked', false);
            //     });

            //     if ($('#pop_select1').is(":checked"))
            //     {
            //         document.getElementById("product").style.display = "block";
            //         document.getElementById("food").style.display = "none";
            //     }
            //     $("#pop_select1").change(function() {
            //         if ($('#pop_select1').is(":checked"))
            //         {
            //             document.getElementById("product").style.display = "block";
            //             document.getElementById("food").style.display = "none";
            //         }
            //         else{
            //             document.getElementById("product").style.display = "none";
            //         }
            //     });
            //     if ($('#pop_select2').is(":checked"))
            //     {
            //         document.getElementById("food").style.display = "block";
            //         document.getElementById("product").style.display = "none";
            //     }
            //     $("#pop_select2").change(function() {
            //         if ($('#pop_select2').is(":checked"))
            //         {
            //             document.getElementById("food").style.display = "block";
            //             document.getElementById("product").style.display = "none";
            //         }
            //         else{
            //             document.getElementById("food").style.display = "none";
            //         }
            //     });
            break;
        case '4':
                  //event form clear checked 
                $("input[name='event_ty']").change(function() {
                    if ($(this).val() == 5){
                        $("#event_type_other").toggle(true);
                        $("input[name='event_type_other']").focus();
                    }else{
                        $("#event_type_other").toggle(false);
                    }
                    $("input[name='event_ty']").not(this).prop('checked', false);
                });

                $("input[name='event_add']").change(function() {
                    $("input[name='event_add']").not(this).prop('checked', false);
                    document.getElementById("event_address_detail").style.display = "none";
                });

                if ($('#event_ty5').is(":checked"))
                {
                    $("#event_type_other").toggle(true);
                }

                //check event_address_detail event form
                if ($('#event_add2').is(":checked"))
                {
                    document.getElementById("event_address_detail").style.display = "block";
                }
                $("#event_add2").change(function() {
                    if ($('#event_add2').is(":checked"))
                    {
                        document.getElementById("event_address_detail").style.display = "block";
                    }
                    else{
                        document.getElementById("event_address_detail").style.display = "none";
                    }
                });
            case '3':
              //clear work talk checked 
    $("input[name='work_talk_ty']").change(function() {
        $("input[name='work_talk_ty']").not(this).prop('checked', false);
    });
    $("input[name='work_talk_ty_at']").change(function() {
        $("input[name='work_talk_ty_at']").not(this).prop('checked', false);
    });

    if ($('#work_talk_ty1').is(":checked"))
    {
        document.getElementById("work_type_1").style.display = "block";
    }
    $("#work_talk_ty1").change(function() {
        if ($('#work_talk_ty1').is(":checked"))
        {
            document.getElementById("work_type_1").style.display = "block";
            document.getElementById("work_type_2").style.display = "none";
        }
        else{
            document.getElementById("work_type_1").style.display = "none";
        }
    });

    if ($('#work_talk_ty2').is(":checked"))
    {
        document.getElementById("work_type_2").style.display = "block";
    }
    $("#work_talk_ty2").change(function() {
        if ($('#work_talk_ty2').is(":checked"))
        {
            document.getElementById("work_type_2").style.display = "block";
            document.getElementById("work_type_1").style.display = "none";
        }
        else{
            document.getElementById("work_type_2").style.display = "none";
        }
    });

                break;
                
    
        default:
            break;
    }


    // $('.demo-form-wysiwyg').contents().find('body').on("change",function() {
    //     alert('asd');
    // });

 

  

  
    // if ($('#work_talk_ty_at2').is(":checked"))
    // {
    //     document.getElementById("work_talk_type_at_detail1").style.display = "block";
    //     $("#work_talk_det1").prop('disabled', false);
    //     $("#work_talk_det2").prop('disabled', true);
    // }
    // $("#work_talk_ty_at2").change(function() {
    //     if ($('#work_talk_ty_at2').is(":checked"))
    //     {
    //         document.getElementById("work_talk_type_at_detail1").style.display = "block";
    //         $("#work_talk_det1").prop('disabled', false);
    //         $("#work_talk_det2").prop('disabled', true);
    //     }
    //     else{
    //         document.getElementById("work_talk_type_at_detail1").style.display = "none";
    //     }
    // });
    // if ($('#work_talk_ty_at4').is(":checked"))
    // {
    //     document.getElementById("work_talk_type_at_detail2").style.display = "block";
    //     $("#work_talk_det1").prop('disabled', true);
    //     $("#work_talk_det2").prop('disabled', false);
    // }
    // $("#work_talk_ty_at4").change(function() {
    //     if ($('#work_talk_ty_at4').is(":checked"))
    //     {
    //         document.getElementById("work_talk_type_at_detail2").style.display = "block";
    //         $("#work_talk_det1").prop('disabled', true);
    //         $("#work_talk_det2").prop('disabled', false);

    //     }
    //     else{
    //         document.getElementById("work_talk_type_at_detail2").style.display = "none";
    //     }
    // });
    


// //get status company
//     $company =   $("input[name=radio1]:checked").map(function() {
//     return this.value;
//     }).get().join(",");

//     if ($company != 1){
//     document.getElementById("radio-company").style.display = "none";
//     }
//     else{
//     document.getElementById("radio-company").style.display = "block";
//     }

//     $('#radio1No').on('change', function() {
//         if($('input[name=radio1]').is(':checked')){
//             document.getElementById("radio-company").style.display = "block";
//             // $("$company_province").prop( "disabled", 'disabled' );
//         }
//     });

//     $('#radio1Yes').on('change', function() {
//         if($('input[name=radio1]').is(':checked')){
//             document.getElementById("radio-company").style.display = "none";
//             // $("$company_province").prop( "disabled", 'disabled' );
//         }
//     });

    //end check company

     //hidden agent
     $('#agent').hide();
    
     //get status agent
     $('#radio2No').on('change', function() {
         if($('input[name=radio2]').is(':checked')){
             $('#agent').show();
         }
     });
     $('#radio2Yes').on('change', function() {
         if($('input[name=radio2]').is(':checked')){
             $('#agent').hide();
         }
     });
     //end status agent
 
    
   

    $('#btn-next').click(function(){
        if(!$('#checkbox2').is(":checked")){
            
            $('#check_form').modal();
            return false;
        }

        
    });

      // max select file upload
      $("#product_img").on("change", function() {
        if($("#product_img").get(0).files.length > 2) {
            alert("คุณสามารถอัพโหลด ภาพรวมของผลงาน ได้สูงสุด 2 ภาพ");
            return false;
        } 
    });

    $("#product_closeup").on("change", function() {
        if($("#product_closeup").get(0).files.length > 2) {
            alert("คุณสามารถอัพโหลด Close Up ได้สูงสุด 2 ภาพ");
            return false;
        } 
    });

    $("#product_packshot").on("change", function() {
        if($("#product_packshot").get(0).files.length > 2) {
            alert("คุณสามารถอัพโหลด Pack Shot ได้สูงสุด 2 ภาพ");
            return false;
        } 
    });
    //end file upload

    $('#btn-finish').click(function(){
              //css loading
       
        //get project type
        var type = $('#project_type').val();
       
        switch (type) {
            case '1':
                var loops = false;
                $('.check_product').each(function() {
                    if(!$(this).is(":checked")){
                       loops = true;
                    }else{
                        loops = false;
                    }
                });
                if (loops){
                    alert('ยังไม่ได้ยอมรับ ข้าพเจ้าขอยืนยันว่าผลงานชิ้นนี้ไม่ได้มีการทำซ้ำหรือคัดลอกมาจากผู้อื่น');
                    return false;
                }
                var loops = false;
                $('.product_img').each(function() {
                    if ($(this).get(0).files.length === 0) {
                        loops = true;
                       
                    }else{
                        loops = false;
                    }
                });
                if (loops){
                    alert('กรุณาอัพโหลดภาพรวมของผลงาน');
                    return false;
                }
                var loops = false;
                $('.product_closeup').each(function() {
                    if ($(this).get(0).files.length === 0) {
                        loops = true;
                       
                    }else{
                        loops = false;
                    }
                });
                if (loops){
                    alert('กรุณาอัพโหลดภาพ Close Up');
                    return false;
                }
                var loops = false;
                $('.product_packshot').each(function() {
                    if ($(this).get(0).files.length === 0) {
                        loops = true;
                       
                    }else{
                        loops = false;
                    }
                });
                if (loops){
                    alert('กรุณาอัพโหลดภาพPack Shot');
                    return false;
                }
                    
                
               
                break;
            case '2':
                //pop market
                // var pop_product = $.map($('input[name="pop_select"]:checked'), function(c){return c.value; })
                // $('#pop_product_type').val(pop_product);
                // var pop_food = $.map($('input[name="pop_food"]:checked'), function(c){return c.value; })
                // $('#pop_food_type').val(pop_food);

                if ($('#have_img').val() == 'false')
                {
                    var loops = false;
                    $('.pop_img').each(function() {
                        if ($(this).get(0).files.length === 0) {
                            loops = true;
                        
                        }else{
                            loops = false;
                        }
                    });
                    if (loops){
                        alert('กรุณาอัพโหลดภาพรวมของผลงาน');
                        return false;
                    }
                    var loops = false;
                    $('.pop_closeup').each(function() {
                        if ($(this).get(0).files.length === 0) {
                            loops = true;
                        
                        }else{
                            loops = false;
                        }
                    });
                    if (loops){
                        alert('กรุณาอัพโหลดภาพ Close Up');
                        return false;
                    }
                    var loops = false;
                    $('.pop_packshot').each(function() {
                        if ($(this).get(0).files.length === 0) {
                            loops = true;
                        
                        }else{
                            loops = false;
                        }
                    });
                    if (loops){
                        alert('กรุณาอัพโหลดภาพPack Shot');
                        return false;
                    }
                }
                    
                break;
            case '3':
                // work talk
                                  
                if ($('#have_img').val() == 'false')
                {
                    var loops = false;
                    $('.join_profile').each(function() {
                        if ($(this).get(0).files.length === 0) {
                            loops = true;
                        
                        }else{
                            loops = false;
                        }
                    });
                    if (loops){
                        alert('กรุณาอัพโหลดโปรไฟล์ของวิทยากร');
                        return false;
                    }

                    var loops = false;
                    $('.join_img_profile').each(function() {
                        if ($(this).get(0).files.length === 0) {
                            loops = true;
                        
                        }else{
                            loops = false;
                        }
                    });
                    if (loops){
                        alert('กรุณาอัพโหลดภาพวิทยากร');
                        return false;
                    }

                    var loops = false;
                    $('.join_img').each(function() {
                        if ($(this).get(0).files.length === 0) {
                            loops = true;
                        
                        }else{
                            loops = false;
                        }
                    });
                    if (loops){
                        alert('กรุณาอัพโหลดภาพ Key Visual หรือ กิจกรรมที่เคยจัด');
                        return false;
                    }
                    var loops = false;
                    $('.join_event').each(function() {
                        if ($(this).get(0).files.length === 0) {
                            loops = true;
                        
                        }else{
                            loops = false;
                        }
                    });
                    if (loops){
                        alert('กรุณาอัพโหลดกำหนดการณ์กิจกรรม');
                        return false;
                    }
                }
                var work_talk_type = $.map($('input[name="work_talk_ty"]:checked'), function(c){return c.value; })
                
                $('#work_talk_type').val(work_talk_type);
                var work_talk_type_at = $.map($('input[name="work_talk_ty_at"]:checked'), function(c){return c.value; })
                $('#work_talk_type_at').val(work_talk_type_at);

                break;
            case '4':
                  // event 
                  
                if ($('#have_img').val() == 'false')
                {
                    var loops = false;
                    $('.join_profile').each(function() {
                        if ($(this).get(0).files.length === 0) {
                            loops = true;
                        
                        }else{
                            loops = false;
                        }
                    });
                    if (loops){
                        alert('กรุณาอัพโหลดโปรไฟล์ของผู้จัด');
                        return false;
                    }
                    var loops = false;
                    $('.join_img').each(function() {
                        if ($(this).get(0).files.length === 0) {
                            loops = true;
                        
                        }else{
                            loops = false;
                        }
                    });
                    if (loops){
                        alert('กรุณาอัพโหลดภาพกิจกรรมที่เคยจัดหรือภาพร่าง');
                        return false;
                    }
                    var loops = false;
                    $('.join_event').each(function() {
                        if ($(this).get(0).files.length === 0) {
                            loops = true;
                        
                        }else{
                            loops = false;
                        }
                    });
                    if (loops){
                        alert('กรุณาอัพโหลดกำหนดการณ์กิจกรรม');
                        return false;
                    }
                }
                  var event_type = $.map($('input[name="event_ty"]:checked'), function(c){return c.value; })
               
                  $('#event_type').val(event_type);
                  var event_address = $.map($('input[name="event_add"]:checked'), function(c){return c.value; })
                  $('#event_address').val(event_address);
                break;
            default:
                day = "Saturday";
        }
        $('#loading').toggle(true);
   


      
        $('#form-event-profile').submit();
    });
 
  });

