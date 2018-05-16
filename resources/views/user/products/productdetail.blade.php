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
                        @for ($i=1; $i < 5; $i++)
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
                        <p><span></span>$<i class="item_price">{{ $product->price_out }}</i></p>
                        <p><a class="item_add" href="#">{{ trans('product.title.btn_add_to_cart') }}</a></p>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <div class="w3l_related_products">
        <div class="container">
            <h3>{{ trans('product.title.related_products') }}</h3>
            <ul id="flexiselDemo2">   
                @if (isset($productlist) && !empty($productlist)) 
                @foreach($productlist as $item)     
                    <li>
                        <div class="w3l_related_products_grid">
                            <div class="agile_ecommerce_tab_left dresses_grid">
                                <div class="hs-wrapper hs-wrapper3">
                                    <img src={{ asset('assets/Hoang_library/user/images/ss1.jpg') }} alt=" " class="img-responsive">
                                    <img src={{ asset('assets/Hoang_library/user/images/ss2.jpg') }} alt=" " class="img-responsive">
                                    <img src={{ asset('assets/Hoang_library/user/images/ss3.jpg') }} alt=" " class="img-responsive">
                                    <img src={{ asset('assets/Hoang_library/user/images/ss4.jpg') }} alt=" " class="img-responsive">
                                    <img src={{ asset('assets/Hoang_library/user/images/ss5.jpg') }} alt=" " class="img-responsive">
                                    <img src={{ asset('assets/Hoang_library/user/images/ss6.jpg') }} alt=" " class="img-responsive">
                                    <img src={{ asset('assets/Hoang_library/user/images/ss7.jpg') }} alt=" " class="img-responsive">
                                    <img src={{ asset('assets/Hoang_library/user/images/ss8.jpg') }} alt=" " class="img-responsive">
                                    <div class="w3_hs_bottom">
                                        <div class="flex_ecommerce">
                                            <a href="#" data-toggle="modal" data-target="#myModal6"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                        </div>
                                    </div>
                                </div>
                                <h5><a href="{{ route('show_pdetail', ['product' => $item->id]) }}">{{ $item->name }}</a></h5>
                                <div class="simpleCart_shelfItem">
                                    <p class="flexisel_ecommerce_cart"><span></span> <i class="item_price">{{ $item->price_out }}</i></p>
                                    <p><a class="item_add" href="#">{{ trans('product.title.btn_add_to_cart') }}</a></p>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
                @endif
            </ul>
        </div>
    </div>
@endsection

@section('script')
    {{ Html::script('assets/Hoang_library/user/js/jquery.flexslider.js') }}
    {{ Html::script('assets/Hoang_library/user/js/jquery.flexisel.js') }}
    {{ Html::script('assets/Hoang_library/user/js/jquery.flexslider.js') }}
    {{ Html::script('assets/Hoang_library/user/js/imagezoom.js') }}
    {{ Html::script('js/user/images.js') }}
@endsection
