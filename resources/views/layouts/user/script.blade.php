<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
    function hideURLbar(){ window.scrollTo(0, 1); } 
</script>
<!-- js -->
{{ Html::script('assets/Hoang_library/user/js/jquery.min.js') }}
<!-- cart -->
{{ Html::script('assets/Hoang_library/user/js/simpleCart.min.js') }}
<!-- for bootstrap working -->
{{ Html::script('assets/Hoang_library/user/js/bootstrap-3.1.1.min.js') }}
<!-- start-smooth-scrolling -->
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.scroll').click(function(event){     
            event.preventDefault();
            $('html, body').animate({scrollTop:$(this.hash).offset().top}, 1000);
        });
    });
</script>
<!-- //end-smooth-scrolling -->
