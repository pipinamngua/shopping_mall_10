<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    {{ Html::style('css/user/bootstrap.css') }}
    {{ Html::style('css/user/style.css') }}
    {{ Html::style('css/user/fasthover.css') }}
    {{ Html::script('js/user/jquery.min.js') }}
    {{ Html::style('css/user/jquery.countdown.css') }}
    {{ Html::script('js/user/simpleCart.min.js') }}
    {{ Html::style('//fonts.googleapis.com/css?family=Glegoo:400,700') }}

</head>
<body>
    <div class="header">
        <div class="container">
            <div class="w3l_login">
                <a href="#" data-toggle="modal" data-target="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
            </div>
            <div class="w3l_logo">
                <h1><a href="#">{{ trans('settings.layout.user.name_shop') }}<span>{{ trans('settings.layout.user.label') }}</span></a></h1>
            </div>
            <div class="search">
                <input class="search_box" type="checkbox" id="search_box">
                <label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
                <div class="search_form">
                    <form action="#" method="post">
                        <input type="text" name="Search" placeholder="{{ trans('settings.layout.user.search') }}">
                        <input type="submit" value="Send">
                    </form>
                </div>
            </div>
            <div class="cart box_1">
                <a href="#">
                    <div class="total">
                    <span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</div>
                    <img src="{{ asset('images/products/bag.png') }} alt="" />
                </a>
                <p><a href="#" class="simpleCart_empty">{{ trans('settings.layout.user.cart_status') }}</a></p>
                <div class="clearfix"> </div>
            </div>  
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="navigation">
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#" class="act">{{ trans('settings.layout.user.home') }}</a></li>   
                        <!-- Mega Menu -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ trans('settings.layout.user.products') }}<b class="caret"></b></a>
                            <ul class="dropdown-menu multi-column columns-3">
                            </ul>
                        </li>
                        <li><a href="#">{{ trans('settings.layout.user.news') }}</a></li>
                        <li><a href="s#">{{ trans('settings.layout.user.history') }}</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="banner">
        <div class="container">
            <h3>{{ trans('settings.layout.user.pre_title') }} <span>{{ trans('settings.layout.user.suf_title') }}</span></h3>
        </div>
    </div>
    <div class="banner-bottom">
    @yield('content')
    </div>
    <div class="footer">
        <div class="container">
            <div class="w3_footer_grids">
                <div class="col-md-3 w3_footer_grid">
                    <h3>{{ trans('settings.layout.footer.contact') }}</h3>
                    <p>{{ trans('settings.layout.footer.contact_content') }}</p>
                    <ul class="address">
                        <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>{{ trans('settings.layout.footer.address') }}<span>{{ trans('settings.layout.footer.city') }}</span></li>
                        <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="#">{{ trans('settings.layout.footer.contact_email') }}</a></li>
                        <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>{{ trans('settings.layout.footer.contact_phone') }}</li>
                    </ul>
                </div>
                <div class="col-md-3 w3_footer_grid">
                    <h3>{{ trans('settings.layout.footer.information') }}</h3>
                    <ul class="info"> 
                        <li><a href="#">{{ trans('settings.layout.footer.about_us') }}</a></li>
                        <li><a href="#">{{ trans('settings.layout.footer.contact_us') }}</a></li>
                        <li><a href="#">{{ trans('settings.layout.footer.news') }}</a></li>
                        <li><a href="#">{{ trans('settings.layout.footer.QA') }}</a></li>
                        <li><a href="#">{{ trans('settings.layout.footer.special_products') }}</a></li>
                    </ul>
                </div>
                <div class="col-md-3 w3_footer_grid">
                    <h3>{{ trans('settings.layout.footer.category') }}</h3>
                    <ul class="info"> 
                        <li><a href="#">{{ trans('settings.layout.footer.a_category') }}</a></li>
                    </ul>
                </div>
                <div class="col-md-3 w3_footer_grid">
                    <h3>{{ trans('settings.layout.title.profile') }}</h3>
                    <ul class="info"> 
                        <li><a href="#">{{ trans('settings.title.history') }}</a></li>
                    </ul>
                    <h4>{{ trans('settings.layout.footer.follow_us') }}</h4>
                    <div class="agileits_social_button">
                        <ul>
                            <li><a href="#" class="facebook"> </a></li>
                            <li><a href="#" class="twitter"> </a></li>
                            <li><a href="#" class="google"> </a></li>
                            <li><a href="#" class="pinterest"> </a></li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="footer-copy">
            <div class="footer-copy1">
                <div class="footer-copy-pos">
                    <a href="#" class="scroll"><img src="{{ asset('images/products/arrow.png') }}" alt=" " class="img-responsive" /></a>
                </div>
            </div>
            <div class="container">
                <p>{{ trans('settings.layout.footer.sign') }}</p>
            </div>
        </div>
    </div>
</body>
</html>
