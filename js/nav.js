let cubmenu = 0;

$('.user').click(function() {
    if(cubmenu == 0) {
        cubmenu = 1;
        $(".submenu").css("display", "block");
    } else if(cubmenu == 1) {
        cubmenu = 0;
        $(".submenu").css("display", "none");
    }
});