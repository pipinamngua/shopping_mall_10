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
