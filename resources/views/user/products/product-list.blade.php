@extends('layouts.user.layout')
@section('title')
{{ trans('settings.title.homepage') }}
@endsection
@section('content')
<!-- dresses -->
<div class="dresses">
    <div class="container">
        <h3>{{ $category->name }}</h3>
        <div class="w3ls_dresses_grids">
            <div class="col-md-12 w3ls_dresses_grid_right">
                <div class="w3ls_dresses_grid_right_grid2">
                    <div class="w3ls_dresses_grid_right_grid2_left">
                        <h3>Showing Results: 0-1</h3>
                    </div>
                    <div class="w3ls_dresses_grid_right_grid2_right">
                        <select name="select_item" class="select_item" id ="select_item" data-id={{ $category->
                            id }}>
                            <option selected="selected">{{ trans('custom.sort.default') }}</option>
                            <option value="1">{{ trans('custom.sort.lowToHigh') }}</option>
                            <option value="2">{{ trans('custom.sort.highToLow') }}</option>
                        </select>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div id="product_list">
                    @foreach ($products as $product)
                    <div class="col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_dresses">
                        <div class="agile_ecommerce_tab_left dresses_grid">
                            <div class="hs-wrapper hs-wrapper2">
                                <img src="{{ asset('assets/Hoang_library/user/images/27.jpg') }}" alt=" " class="img-responsive" />
                                <img src="{{ asset('assets/Hoang_library/user/images/28.jpg') }}" alt=" " class="img-responsive" />
                                <img src="{{ asset('assets/Hoang_library/user/images/29.jpg') }}" alt=" " class="img-responsive" />
                                <img src="{{ asset('assets/Hoang_library/user/images/30.jpg') }}" alt=" " class="img-responsive" />
                                <img src="{{ asset('assets/Hoang_library/user/images/31.jpg') }}" alt=" " class="img-responsive" />
                                <div class="w3_hs_bottom w3_hs_bottom_sub1">
                                    <ul>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#myModal6"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <h5><a href="{{ route('show_pdetail', ['product' => $product->id]) }}">{{ $product->name }}</a></h5>
                            <div class="simpleCart_shelfItem">
                                <p><span></span> <i class="item_price">{{ number_format($product->price_out, 2, '.', ',') }}</i></p>
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
                            <div class="dresses_grid_pos">
                                <h6>{{ trans('custom.product.new') }}</h6>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<div class="w3l_related_products">
    <div class="container">
        <h3>Related Products</h3>
        <ul id="flexiselDemo2">
            @foreach ($products as $product)
            <li>
                <div class="w3l_related_products_grid">
                    <div class="agile_ecommerce_tab_left dresses_grid">
                        <div class="hs-wrapper hs-wrapper3">
                            <img src="{{ asset('assets/Hoang_library/user/images/27.jpg') }}" alt=" " class="img-responsive" />
                            <img src="{{ asset('assets/Hoang_library/user/images/28.jpg') }}" alt=" " class="img-responsive" />
                            <img src="{{ asset('assets/Hoang_library/user/images/29.jpg') }}" alt=" " class="img-responsive" />
                            <img src="{{ asset('assets/Hoang_library/user/images/30.jpg') }}" alt=" " class="img-responsive" />
                            <img src="{{ asset('assets/Hoang_library/user/images/31.jpg') }}" alt=" " class="img-responsive" />
                            <div class="w3_hs_bottom">
                                <div class="flex_ecommerce">
                                    <a href="#" data-toggle="modal" data-target="#myModal6"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                </div>
                            </div>
                        </div>
                        <h5><a href="{{ route('show_pdetail', ['product' => $product->id]) }}">{{ $product->name }}</a></h5>
                        <div class="simpleCart_shelfItem">
                            <p class="flexisel_ecommerce_cart"><span>$312</span> <i class="item_price">{{ number_format($product->price_out, 2, '.', ',') }}</i></p>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<!-- //dresses -->
@endsection
