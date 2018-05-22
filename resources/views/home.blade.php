@extends('layouts.user.layout')

@section('title')
    {{ trans('settings.title.homepage') }}
@endsection

@section('slide')
<!-- banner -->
<div class="banner">
    <div class="container">
        <h3>{{ trans('settings.layout.user.pre_title') }} <span>{{ trans('settings.layout.user.suf_title') }}</span></h3>
    </div>
</div>
<!-- //banner -->
@endsection

@section('content')
    <div class="container">
        <div class="col-md-5 wthree_banner_bottom_left">
            <div class="video-img">
                <a class="play-icon popup-with-zoom-anim" href="#">
                    <span class="glyphicon glyphicon-expand" aria-hidden="true"></span>
                </a>
            </div>
        </div>
        <div class="col-md-7 wthree_banner_bottom_right">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                @if (isset($newCategories) && !empty($newCategories))
                    <ul id="myTab" class="nav nav-tabs" role="tablist">
                        @foreach($newCategories as $category)
                        <li role="presentation" class="active">
                            <a href="#category-{{ $category->id }}" class="select-category" data-id="{{ $category->id }}">{{ $category->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in">
                            <div class="agile_ecommerce_tabs" id="products_content">
                                @if (isset($firstProducts) && !empty($firstProducts))
                                    @foreach ($firstProducts as $product)
                                        <div class="col-md-4 agile_ecommerce_tab_left">
                                            <div class="hs-wrapper">
                                                <img src="{{ asset('images/home/5.jpg') }}" alt="" class="img-responsive" />
                                                <img src="{{ asset('images/home/5.jpg') }}" alt="" class="img-responsive" />
                                                <img src="{{ asset('images/home/5.jpg') }}" alt="" class="img-responsive" />
                                                <img src="{{ asset('images/home/5.jpg') }}" alt="" class="img-responsive" />
                                                <img src="{{ asset('images/home/5.jpg') }}" alt="" class="img-responsive" />
                                                <div class="w3_hs_bottom">
                                                    <ul>
                                                        <li>
                                                            <a href="#" data-toggle="modal" data-target="#">
                                                                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <h5><a href="{{ route('show_pdetail', ['product' => $product->id]) }}" class="item-name">{{ $product->name }}</a></h5>
                                            <div class="simpleCart_shelfItem">
                                                <p><span>{{ '$'.$product->price_out }}</span> <i class="item_price">{{ '$'.$product->price_out }}</i></p>
                                                <p>
                                                    <span class="item_add">
                                                        {!! Form::open([
                                                            'method' => 'POST',
                                                            'route' => 'storeCart',
                                                        ]) !!}
                                                        {!! Form::hidden('product_id',$product->id) !!}
                                                        {!! Form::submit(trans('settings.layout.homePage.btn_add_to_cart'))!!}
                                                        {!! Form::close() !!}
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="clearfix"></div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    </br></br>
    <div class="new-products">
        <div class="container">
        <h3>{{ trans('settings.layout.homePage.new_products') }}</h3>
            <div class="agileinfo_new_products_grids">
                @if (isset($newProducts) && !empty($newProducts))
                    @foreach($newProducts as $product)
                    <div class="col-md-3 agileinfo_new_products_grid">
                        <div class="agile_ecommerce_tab_left agileinfo_new_products_grid1">
                            <div class="hs-wrapper hs-wrapper1">
                                <img src="{{ asset('images/home/27.jpg') }}" alt=" " class="img-responsive" />
                                <img src="{{ asset('images/home/28.jpg') }}" alt=" " class="img-responsive" />
                                <img src="{{ asset('images/home/29.jpg') }}" alt=" " class="img-responsive" />
                                <img src="{{ asset('images/home/30.jpg') }}" alt=" " class="img-responsive" />
                                <img src="{{ asset('images/home/31.jpg') }}" alt=" " class="img-responsive" />
                                <div class="w3_hs_bottom w3_hs_bottom_sub">
                                    <ul>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#myModal6"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <h5><a href="{{ route('show_pdetail', ['product' => $product->id]) }}">{{ $product->name }}</a></h5>
                            <div class="simpleCart_shelfItem">
                                <p><span>{{ $product->price_out }}</span> <i class="item_price">{{ $product->price_out }}</i></p>
                                <p>
                                    {!! Form::open([
                                        'method' => 'POST',
                                        'route' => 'storeCart',
                                    ]) !!}
                                        {!! Form::hidden('product_id',$product->id) !!}
                                        {!! Form::submit(trans('settings.layout.homePage.btn_add_to_cart',['class' => 'item_add']))!!}
                                    {!! Form::close() !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    @if (Session::has('fail'))
            <div class="modal fade" id="notiLogin" tabindex="-1" role="dialog" aria-labelledby="myModal88"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;</button>
                        <h4 class="modal-title" id="myModalLabel">
                            {{ trans('custom.middleware.noti')}}
                        </h4>
                    </div>
                    <div class="modal-body modal-body-sub">
                        <div class="row">
                            <div class="alert alert-danger">
                                <strong>{{ Session::get('fail') }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
@endsection

@section('script')
    {{ Html::script('js/user/script.js') }}
@endsection
