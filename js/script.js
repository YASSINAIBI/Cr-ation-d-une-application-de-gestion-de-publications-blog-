$(function() {
    $('.loggin_register_forget ul li').on('click', function(){
        $(this).addClass('active').siblings().removeClass('active');
});

$('.loggin_register_forget ul li.log').on('click', function(){
    $('.loggin_register_forget .show-hide1').hide();
    $('.loggin_register_forget .show-hide2').show();

    $('.loggin_register_forget .button').css("top", "120px");
});

$('.loggin_register_forget ul li.reg').on('click', function(){
    $('.loggin_register_forget .show-hide1').show();
    $('.loggin_register_forget .show-hide2').hide();

    $('.loggin_register_forget .button').css("top", "25px");
    $('.loggin_register_forget .show-hide1 label').css("color", "white");
});
});
