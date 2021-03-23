let menuOpen = 0;

$('.subj').click(function() {
    if(menuOpen == 0) {
        menuOpen = 1;
        $(".subject").css("display", "block");
    } else if(menuOpen == 1) {
        menuOpen = 0;
        $(".subject").css("display", "none");
    }
});