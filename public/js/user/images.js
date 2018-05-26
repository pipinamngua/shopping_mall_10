
addEventListener('load', function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ 
    window.scrollTo(0, 1); 
};

jQuery(document).ready(function($) {
    $('.scroll').click(function(event){     
        event.preventDefault();
        $('html, body').animate({scrollTop: $(this.hash).offset().top}, 1000);
    });
});

$(document).ready(function() {
    $('.flexslider').flexslider({
                        animation: "slide",
                        controlNav: "thumbnails"
                      });
    $('#horizontalTab').easyResponsiveTabs({
        type: 'default', //Types: default, vertical, accordion           
        width: 'auto', //auto or any width like 600px
        fit: true   // 100% fit in a container
    }); 

    $('.value-plus1').on('click', function() {
        var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10) + 1;
        divUpd.text(newVal);
    });

    $('.value-minus1').on('click', function() {
        var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10) - 1;
        if(newVal >= 1) divUpd.text(newVal);
    });

    $('#horizontalTab1').easyResponsiveTabs({
        type: 'default', //Types: default, vertical, accordion           
        width: 'auto', //auto or any width like 600px
        fit: true   // 100% fit in a container
    });

    var $rate = 0;
    $('body').on('click', '#rating1', function(e) {
        $rate = 5;
        $('#rate').val($rate);
    });
    $('body').on('click', '#rating2', function(e) {
        $rate = 4;
        $('#rate').val($rate);
    });
    $('body').on('click', '#rating3', function(e) {
        $rate = 3;
        $('#rate').val($rate);
    });
    $('body').on('click', '#rating4', function(e) {
        $rate = 2;
        $('#rate').val($rate);
    });
    $('body').on('click', '#rating5', function(e) {
        $rate = 1;
        $('#rate').val($rate);
    });
});

$(window).load(function() {
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: 'slide',
            controlNav: 'thumbnails'
        });
    });
    $('#flexiselDemo2').flexisel({
        visibleItems:4,
        animationSpeed: 1000,
        autoPlay: true,
        autoPlaySpeed: 3000,            
        pauseOnHover: true,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: { 
            portrait: { 
                changePoint: 480,
                visibleItems: 1
            }, 
            landscape: { 
                changePoint: 640,
                visibleItems: 2
            },
            tablet: { 
                changePoint: 768,
                visibleItems: 3
            }
        }
    });
});
