$(document).ready(function(){

    $("#reveal").on('click',function() {
        var $pwd = $("#password");
        if ($pwd.attr('type') === 'password') {
            $pwd.attr('type', 'text');
        } else {
            $pwd.attr('type', 'password');
        }
    });

});
