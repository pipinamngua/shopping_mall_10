@extends('layouts.user.layout')

@section('title')
    {{ trans('settings.title.homepage') }}
@endsection

@section('style')
    {{ Html::style('assets/Hoang_library/user/css/flexslider.css') }}
@endsection

@section('content')
    <div class="single">
        <div class="container">
            <div class="col-md-4 single-left">
                <div class="flexslider">
                    <ul class="slides">
                        <li data-thumb="{{ asset('assets/Hoang_library/user/images/a.jpg') }}">
                            <div class="thumb-image"> <img src="{{ asset('assets/Hoang_library/user/images/a.jpg') }}" data-imagezoom="true" class="img-responsive"> </div>
                        </li>
                        <li data-thumb="{{ asset('assets/Hoang_library/user/images/b.jpg') }}">
                            <div class="thumb-image"> <img src="{{ asset('assets/Hoang_library/user/images/b.jpg') }}" data-imagezoom="true" class="img-responsive"> </div>
                        </li>
                        <li data-thumb="{{ asset('assets/Hoang_library/user/images/c.jpg') }}">
                            <div class="thumb-image"> <img src="{{ asset('assets/Hoang_library/user/images/c.jpg') }}" data-imagezoom="true" class="img-responsive"> </div>
                        </li> 
                    </ul>
                </div>
            </div>
            <div class="col-md-8 single-right">
                <h3>{{ $product->name }}</h3>
                <div class="rating1">
                    <span class="starRating">
                        @for ($i = 1; $i <= 5; $i++)
                        <input id="rating{{ $i }}" type="radio" name="rating" value="{{ $i }}">
                        <label for="rating{{ $i }}">{{ $i }}</label>
                        @endfor
                    </span>
                </div>
                <div class="description">
                    <h5><i>{{ trans('product.title.description') }}</i></h5>
                    <p>{{ $product->description }}</p>
                    </div>
                    <div class="color-quality">
                        <div class="color-quality-left">
                            <h5>{{ trans('product.title.color') }}</h5>
                            <ul>
                                <li><a href="#" class="red"><span></span>{{ trans('product.color.red') }}</a></li>
                                <li><a href="#" class="brown"><span></span>{{ trans('product.color.brown') }}</a></li>
                                <li><a href="#" class="purple"><span></span><a>{{ trans('product.color.purple') }}</a></li>
                                <li><a href="#" class="gray"><span></span>{{ trans('product.color.gray') }}</a></li>
                            </ul>
                        </div>
                        <div class="color-quality-right">
                            <h5>{{ trans('product.title.quantity') }}</h5>
                            <div class="quantity"> 
                                <div class="quantity-select">                           
                                    <div class="entry value-minus1">&nbsp;</div>
                                    <div class="entry value1"><span>1</span></div>
                                    <div class="entry value-plus1 active">&nbsp;</div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="occasional">
                        <h5>{{ trans('product.title.ocasion') }}</h5>
                        <div class="colr ert">
                            <div class="check">
                                <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i></label>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="simpleCart_shelfItem">
                        <p><span>{{ $product->price_out }}</span> <i class="item_price">{{ $product->price_out }}</i></p>
                            {!! Form::open([
                                'method' => 'POST',
                                'route' => 'storeCart',
                            ]) !!}
                                {!! Form::hidden('product_id', $product->id) !!}
                                {!! Form::submit(trans('settings.layout.homePage.btn_add_to_cart',['class' => 'item_add']))!!}
                            {!! Form::close() !!}
                        </p>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    @include('user.products.suggestion')
    @include('user.products.review')
@endsection

@section('script')
    {{ Html::script('assets/Hoang_library/user/js/jquery.flexslider.js') }}
    {{ Html::script('assets/Hoang_library/user/js/jquery.flexisel.js') }}
    {{ Html::script('assets/Hoang_library/user/js/jquery.flexslider.js') }}
    {{ Html::script('assets/Hoang_library/user/js/imagezoom.js') }}
    {{ Html::script('js/user/images.js') }}
@endsection
