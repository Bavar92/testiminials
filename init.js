$ = jQuery;
$(document).ready(function () {

    $(".acf-radio-list li")
        .mouseenter(function () {
            $(this).addClass("active");
            $(this).prevAll('li').addClass('active');
        })
        .mouseleave(function () {
            $(this).removeClass("active");
            $(this).prevAll('li').removeClass('active');
        });
    $(".acf-radio-list li").click(function () {
        $(this).addClass("enable");
        $(this).prevAll('li').addClass('enable');
        $(this).nextAll('li').removeClass('enable');
    });


    $('#newTestimonial #acf-_post_title').attr('placeholder', 'Name');
    $('#newTestimonial input[type="submit"]').addClass('btn');
});

