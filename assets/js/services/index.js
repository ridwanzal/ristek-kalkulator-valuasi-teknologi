window.onbeforeunload = function (e) {
    e = e || window.event;
    if (window.event.keyCode == 116) {
        alert('you press f5')
        sessionStorage.setItem('index_luaran_paten', 1);
    }
    else {
    }  
};

$(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover()
    $(".toggle-password").click(function() {
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
            $('.image_replacer').attr('title', 'Sembunyikan');
            $('.image_replacer').attr('src','https://www.flaticon.com/svg/static/icons/svg/709/709612.svg')
        } else {
            input.attr("type", "password");
            $('.image_replacer').attr('title', 'Tampilkan');
            $('.image_replacer').attr('src','https://www.flaticon.com/svg/static/icons/svg/535/535193.svg')
        }
    });
});