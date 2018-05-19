/**
 * Created by JetBrains PhpStorm.
 * User: Top
 * Date: 12/16/13 AD
 * Time: 1:51 PM
 * To change this template use File | Settings | File Templates.
 */

$(function(){

    var height = $(window).height();
//    $('body').css('min-height',height);
//    $('.body_container').css('min-height',height);


    if($('#user_id_login').val()==''){
//        $('body').css('background', 'url(asset/images/background_blur.png) no-repeat bottom center fixed');
        $("body").addClass("popupLogin");
        $('#body_container').addClass('body_blur');
        $('#user').focus();
    }

    $('#btn-login').click(function(){
        login();
    });

    $('#loginForm').submit(function(e) {
        login();
        e.preventDefault();
    });

    $('body').removeClass("loading");
});

function login(){
    // if($('#username').val()==''){
    //     alertify.error('');
    //     $('#username').focus();
    //     return false;
    // }

    // if($('#password').val()==''){
    //     alertify.error('');
    //     $('#password').focus();
    //     return false;
    // }

    var URL = domain+'login';
    var user = $('#username').val();
    var password = $('#password').val();
    var keep = $('#checkbox1').val();

    var data = { 'user' : user , 'password' : password , 'keep' : keep }
    $.ajax({
        url: URL,
        type: "POST",
        data: data,
        success: function (res) {
            if(res.status){
                if(res.user_type==1){
                    window.location.href = domain+'staff';
                }else if(res.user_type==2){
                    window.location.href = domain+'staff/show_user_register';
                }else if(res.user_type==3){
                    window.location.href = domain+'member';
                }
                
            }else{
                alertify.error('Incorect Username or Password');
            }
        }
    });
}
