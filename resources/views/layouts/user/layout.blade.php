<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        @include('layouts.user.style')
        @section('style')
            @show
        {{ Html::script('assets/Hoang_library/user/js/jquery.min.js') }}
        
    </head>
    <body>
        <!-- header -->
        <div class="modal fade" id="myLogin" tabindex="-1" role="dialog" aria-labelledby="myModal88"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;</button>
                        <h4 class="modal-title" id="myModalLabel">
                            {{ trans('custom.login.title')}}
                        </h4>
                    </div>
                    <div class="modal-body modal-body-sub">
                        <div class="row">
                            <div class="col-md-8 modal_body_left modal_body_left1" style="border-right: 1px dotted #C2C2C2;padding-right:3em;">
                                <div class="sap_tabs">
                                    <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                                        <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0" style="display: block">
                                            <div class="facts">
                                                <div class="register">
                                                    {!! Form::open([
                                                        'method' => 'POST',
                                                        'route' => 'login',
                                                        'id' => 'formLogin'
                                                    ]) !!}
                                                        
                                                        {!! Form::label(
                                                            'login_email',
                                                            trans('custom.login.email')
                                                        ) !!}

                                                        {!! Form::text(
                                                            'email',
                                                            null,
                                                            ['id' => 'login_email']
                                                        ) !!}

                                                        <p id = "errorEmailLogin" style="display:block;color:red;"></p>
                                                        {!! Form::label(
                                                        'login_password',
                                                        trans('custom.login.password')
                                                        ) !!}

                                                        {!! Form::password(
                                                        'password',
                                                        ['id' => 'login_password']
                                                        ) !!}

                                                        <p id = "errorPasswordLogin" style="display:block;color:red;"></p>

                                                        {!! Form::submit(trans('custom.login.login')) !!}

                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="OR" class="hidden-xs">
                                    OR
                                </div>
                            </div>
                            <div class="col-md-4 modal_body_right modal_body_right1">
                                <div class="row text-center sign-with">
                                    <div class="col-md-12">
                                        <h3 class="other-nw">
                                            {{ trans('custom.signin') }}
                                        </h3>
                                    </div>
                                    <div class="col-md-12">
                                        <ul class="social">
                                            <li class="social_facebook"><a href="#" class="entypo-facebook"></a></li>
                                            <li class="social_dribbble"><a href="#" class="entypo-dribbble"></a></li>
                                            <li class="social_twitter"><a href="#" class="entypo-twitter"></a></li>
                                            <li class="social_behance"><a href="#" class="entypo-behance"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="myRegister" tabindex="-1" role="dialog" aria-labelledby="myModal888"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;</button>
                        <h4 class="modal-title" id="myModalLabel">
                            {{ trans('custom.register.title') }}
                        </h4>
                    </div>
                    <div class="modal-body modal-body-sub">
                        <div class="row">
                            <div class="col-md-8 modal_body_left modal_body_left1" style="border-right: 1px dotted #C2C2C2;padding-right:3em;">
                                <div class="sap_tabs">
                                    <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                                        <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0" style="display: block">
                                            <div class="facts">
                                                <div class="register">
                                                    {!! Form::open([
                                                        'method' => 'POST',
                                                        'route' => 'register',
                                                        'id' => 'formRegister'
                                                    ])!!}
                                        
                                                        {!! Form::label(
                                                            'name',
                                                            trans('custom.register.name')
                                                        ) !!}
                                        
                                                        {!! Form::text(
                                                            'nameRegister',
                                                             null
                                                        ) !!}
                                        
                                                        <p id = "errorNameRegister" style="display:block;color:red;"></p>
                                            
                                                        {!! Form::label(
                                                            'email',
                                                            trans('custom.register.email')
                                                        ) !!}
                                        
                                                        {!! Form::text(
                                                            'emailRegister',
                                                             null
                                                        ) !!}
                                        
                                                        <p id = "errorEmailRegister" style="display:block;color:red;"></p>
                                                        
                                                        {!! Form::label(
                                                            'password',
                                                            trans('custom.login.password')
                                                        ) !!}

                                                        {!! Form::password('passRegister') !!}

                                                        <p id = "errorPasswordRegister" style="display:block;color:red;"></p>
                                        
                                                        {!! Form::label(
                                                            'confirm_password',
                                                            trans('custom.register.confirm_password')
                                                        ) !!}
                                                        
                                                        {!! Form::password(
                                                        'passRegister_confirmation',
                                                        null,
                                                        ['id' => 'passRegister-confirm']
                                                        )!!}
                                        
                                                        {!! Form::submit(trans('custom.register.register')) !!}
                                        
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="OR" class="hidden-xs">
                                    {{ trans('custom.login.or') }}
                                </div>
                            </div>
                            <div class="col-md-4 modal_body_right modal_body_right1">
                                <div class="row text-center sign-with">
                                    <div class="col-md-12">
                                        <h3 class="other-nw">
                                            {{ trans('custom.signin') }}
                                        </h3>
                                    </div>
                                    <div class="col-md-12">
                                        <ul class="social">
                                            <li class="social_facebook"><a href="#" class="entypo-facebook"></a></li>
                                            <li class="social_dribbble"><a href="#" class="entypo-dribbble"></a></li>
                                            <li class="social_twitter"><a href="#" class="entypo-twitter"></a></li>
                                            <li class="social_behance"><a href="#" class="entypo-behance"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header">
            <div class="container">
                <div class="input-group-btn">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ trans('custom.language.language') }} <span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="{{ route('user.change-language', ['en']) }}">{{ trans('custom.language.english') }}</a></li>
                        <li><a href="{{ route('user.change-language', ['vi']) }}">{{ trans('custom.language.vietnam') }}</a></li>
                    </ul>
                </div>
                <div class="w3l_login">
                    @auth
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            
                            {{ HTML::linkRoute(
                                'profile.index',
                                trans('custom.myAccount'),
                                null,
                                ['id' => 'myAccount']
                            ) }}

                            {{ HTML::linkRoute(
                                'logout',
                                trans('custom.logout'),
                                null,
                                ['id' => 'logout']
                            ) }}

                            {{ Form::open([
                                'route' => 'logout',
                                'method' => 'post',
                                'id' => 'logout-form',
                                'style' => 'display: none;'
                            ])}}

                            {{ Form::close() }}
                        </div>
                    </div>
                    @endauth
                    @guest
                     
                    </script>
                        @if ($errors->has('email') || $errors->has('password')) 
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    $('#myLogin').modal('show');

                                    var errorEmailLogin = "{{ $errors->first('email') }}";
                                    var errorPasswordLogin = "{{ $errors->first('password') }}";

                                     if (errorEmailLogin != ""){
                                        $('#errorEmailLogin').html(errorEmailLogin).show();
                                     }
                                     if (errorPasswordLogin != ""){
                                        $('#errorPasswordLogin').html(errorPasswordLogin).show();
                                     }
                                });   
                            </script>
                        @endif

                        @if ($errors->has('nameRegister') || $errors->has('emailRegister') || 
                        $errors->has('passRegister'))
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    $('#myRegister').modal('show');
                                        var errorNameRegister = "{{ $errors->first('nameRegister') }}";
                                        var errorEmailRegister = "{{ $errors->first('emailRegister') }}";
                                        var errorPasswordRegister = "{{ $errors->first('passRegister') }}";

                                        if (errorNameRegister != ""){
                                            $('#errorNameRegister').html(errorNameRegister).show();
                                        }
                                         
                                         if (errorEmailRegister != ""){
                                            $('#errorEmailRegister').html(errorEmailRegister).show();
                                        }
                                         if (errorPasswordRegister != ""){
                                            $('#errorPasswordRegister').html(errorPasswordRegister).show();
                                        }
                                });
                            </script>
                        @endif
                    <a href="#Login" data-toggle="modal" data-target="#myLogin"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>

                    <a href="#Register" data-toggle="modal" data-target="#myRegister"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
                    @endguest
                </div>
                <div class="w3l_logo">
                    <h1><a href="{{ route('home') }}">Women's Fashion<span>For Fashion Lovers</span></a></h1>
                </div>
                <div class="search">
                    <input class="search_box" type="checkbox" id="search_box">
                    <label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
                    <div class="search_form">
                        {!! Form::open([
                            'method' => 'GET',
                            'route' => 'indexHome'
                        ]) !!}
                            {!! Form::text('keyword',null) !!}
                            {!! Form::submit('Search') !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="cart box_1">
                    <a href="{{ route('cart') }}">
                        {{ number_format(Cart::total(), 2, '.', ',') }}({{ Cart::count() }} {{ trans('custom.cart.item') }})
                        <img src="images/bag.png" alt="" />
                    </a>
                    <p>{!! Html::linkRoute('destroyCart',trans('custom.cart.empty')) !!}</p>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="navigation">
            <div class="container">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header nav_2">
                        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="{{ route('home') }}" class="act">{{ trans('settings.layout.user.home') }}</a></li>
                            <!-- Mega Menu -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ trans('settings.layout.user.products') }} <b class="caret"></b></a>
                                @include('layouts.user.categorylist')
                            </li>
                            <li><a href="#">{{ trans('settings.layout.user.news') }}</a></li>
                            <li><a href="s#">{{ trans('settings.layout.user.history') }}</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- //header -->
        @yield('slide')
        <div class="banner-bottom">
            @yield('content')
        </div>
        <!-- footer -->
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
                        <h3>{{ trans('settings.title.profile') }}</h3>
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
                    <p>{{ trans('settings.layout.admin.sign') }}</p>
                </div>
            </div>
        </div>
        <!-- //footer -->
        @include('layouts.user.script')
        @section('script')
            @show
    </body>
</html>
