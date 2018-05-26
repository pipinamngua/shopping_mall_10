$(document).ready(function () {
    $('#horizontalTab').easyResponsiveTabs({
        type: 'default', //Types: default, vertical, accordion           
        width: 'auto', //auto or any width like 600px
        fit: true   // 100% fit in a container
    });
});


jQuery(document).ready(function($) {
    $('.scroll').click(function(event){     
        event.preventDefault();
        $('html, body').animate({scrollTop:$(this.hash).offset().top}, 1000);
    });
});

$('#logout').click(function(e) {
    e.preventDefault();
    $('#logout-form').submit();
});

$('#formCredit').hide();
$(document).on('click', function() {
    var payment = $('#formPayment1').val();
    if (payment == 'creditcard'){
        $('#formCredit').show();
    }else if (payment == 'homepayment') {
        $('#formCredit').hide();
    }
});

$('#notiLogin').modal('show');
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});

$('.select_item').on('click', function() {
        var id = $(this).attr('data-id');
        var sort = $('#select_item').val();
        var string = id + '-' +sort;
        console.log(string);

        $.ajax({
            type: "POST",
            url: 'product-list/' + string,
            data: { string: string },
            success: function(msg) {
                $('#product_list').html(msg); 
            }
        });
});

$(window).load(function() {
    $("#flexiselDemo2").flexisel({
        visibleItems:4,
        animationSpeed: 1000,
        autoPlay: true,
        autoPlaySpeed: 3000,            
        pauseOnHover: true,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: { 
            portrait: { 
                changePoint:480,
                visibleItems: 1
            }, 
            landscape: { 
                changePoint:640,
                visibleItems:2
            },
            tablet: { 
                changePoint:768,
                visibleItems: 3
            }
        }
    });
});

