$(document).ready(function() {
    $('#myModal88').modal('show');
    $('#horizontalTab').easyResponsiveTabs({
        type: 'default', //Types: default, vertical, accordion           
        mwidth: 'auto', //auto or any width like 600px
        fit: true   // 100% fit in a container
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name='csrf-token']').attr('content')
        }
    });
    $('body').on('click', '.select-category', function(e) {
        var id = $(this).attr('data-id');
        $.ajax({
            type: 'POST',
            url: '/category/' + id,
            data: { id: id },
            success: function(msg) {
                $('#products_content').html(msg); 
            }
        });
    });

    $('.value-plus1').on('click', function() {
        var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10) + 1;
        divUpd.text(newVal);
    });

    $('.value-minus1').on('click', function() {
        var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10) - 1;
        if(newVal >= 1) divUpd.text(newVal);
    });

    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: 'slide',
            controlNav: 'thumbnails'
        });
    });
});
