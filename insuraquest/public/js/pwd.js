$(document).ready(function(){

    $("#reveal").on('click',function() {
        var $pwd = $("#password");
        if ($pwd.attr('type') === 'password') {
            $pwd.attr('type', 'text');
        } else {
            $pwd.attr('type', 'password');
        }
    });
    $("#reveal2").on('click',function() {
        var $pwd2 = $("#password_confirmation");
        if ($pwd2.attr('type') === 'password') {
            $pwd2.attr('type', 'text');
        } else {
            $pwd2.attr('type', 'password');
        }
    });

});
