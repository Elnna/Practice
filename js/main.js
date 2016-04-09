$(document).ready(function(){
    $(".experience").popover('show');
     $('.my-works,.cert').slick({
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear'
    });
});