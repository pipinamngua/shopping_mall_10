$(document).ready( function(){
    jQuery(document).ready(function($) {
        $('.scroll').click(function(event){     
            event.preventDefault();
            $('html, body').animate({scrollTop: $(this.hash).offset().top}, 1000);
        });
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
});

$(window).load(function() {
    $('.flexslider').flexslider({
        animation: 'slide',
        controlNav: 'thumbnails'
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
