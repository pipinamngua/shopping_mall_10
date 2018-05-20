@extends('layouts.user.layout')

@section('title')
    {{ trans('settings.title.homepage') }}
@endsection

@section('content')
    <div class="new-products">
        <div class="container">
        <h3>{{ trans('settings.layout.homePage.category_name', ['name' => $category->name]) }}</h3>
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
