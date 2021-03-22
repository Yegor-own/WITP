let menuOpen = 0;

$('.user').click(function() {
    if(menuOpen == 0) {
        menuOpen = 1;
        $(".submenu").css("display", "block");
    } else if(menuOpen == 1) {
        menuOpen = 0;
        $(".submenu").css("display", "none");
    }
});