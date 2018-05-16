@extends('layouts.user.layout')

@section('title')
    {{ trans('settings.title.homepage') }}
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
                @if (isset($categories) && !empty($categories))
                    <ul id="myTab" class="nav nav-tabs" role="tablist">
                        @foreach($categories[0]->take(4) as $category)
                        <li role="presentation" class="active">
                            <a href="#category-{{ $category->id }}" class="select-category" data-id="{{ $category->id }}">{{ $category->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in">
                            <div class="agile_ecommerce_tabs" id="products_content">
                                @if (isset($firstProduct) && !empty($firstProduct))
                                    @foreach ($firstProduct as $product)
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
                                            <h5><a href="{{ route('productdetail', ['product' => $product->id]) }}" class="item-name">{{ $product->name }}</a></h5>
                                            <div class="simpleCart_shelfItem">
                                                <p><span>{{ '$'.$product->price_out }}</span> <i class="item_price">{{ '$'.$product->price_out }}</i></p>
                                                <p><a class="item_add" href="#">{{ trans('settings.layout.homePage.btn_add_to_cart') }}</a></p>
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
                @if (isset($products) && !empty($products))
                    @foreach($products as $product)
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
                            <h5><a href="">{{ $product->name }}</a></h5>
                            <div class="simpleCart_shelfItem">
                                <p><span>{{ $product->price_out }}</span> <i class="item_price">{{ $product->price_out }}/i></p>
                                <p><a class="item_add" href="#">{{ trans('settings.layout.homePage.btn_add_to_cart') }}</a></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{ Html::script('js/user/script.js') }}
@endsection
