jQuery(document).ready(function($) {
    $('.site-header .main-menu .menu').slicknav({
        label: '',
        appendTo: '.site-header'
    });
    //Add Slider
    $('.testimonials-list').bxSlider({
        auto: true,
        mode: 'fade',
        controls: false
    });
});