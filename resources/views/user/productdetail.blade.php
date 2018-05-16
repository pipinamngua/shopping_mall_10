@extends('layouts.user.layout')

@section('title')
    {{ trans('settings.title.homepage') }}
@endsection

@section('content')
    <div class="single">
        <div class="container">
            <div class="col-md-4 single-left">
                <div class="flexslider">
                    <ul class="slides">
                        <li data-thumb="{{ asset('images/home/a.jpg') }}">
                            <div class="thumb-image"> <img src="{{ asset('images/home/a.jpg') }}" data-imagezoom="true" class="img-responsive"> </div>
                        </li>
                        <li data-thumb="{{ asset('images/home/b.jpg') }}">
                            <div class="thumb-image"> <img src="{{ asset('images/home/b.jpg') }}" data-imagezoom="true" class="img-responsive"> </div>
                        </li>
                        <li data-thumb="{{ asset('images/home/c.jpg') }}">
                            <div class="thumb-image"> <img src="{{ asset('images/home/c.jpg') }}" data-imagezoom="true" class="img-responsive"> </div>
                        </li> 
                    </ul>
                </div>
            </div>
            <div class="col-md-8 single-right">
                <h3>{{-- {{ $product->name }} --}}</h3>
                <div class="rating1">
                    <span class="starRating">
                        <input id="rating5" type="radio" name="rating" value="5">
                        <label for="rating5">5</label>
                        <input id="rating4" type="radio" name="rating" value="4">
                        <label for="rating4">4</label>
                        <input id="rating3" type="radio" name="rating" value="3" checked>
                        <label for="rating3">3</label>
                        <input id="rating2" type="radio" name="rating" value="2">
                        <label for="rating2">2</label>
                        <input id="rating1" type="radio" name="rating" value="1">
                        <label for="rating1">1</label>
                    </span>
                </div>
                <div class="description">
                    <h5><i>{{ trans('settings.layout.user.description') }}</i></h5>
                    <p>{{-- {{ $product->description }} --}}</p>
                    </div>
                    <div class="color-quality">
                        <div class="color-quality-left">
                            <h5>{{ trans('settings.layout.user.color') }}</h5>
                            <ul>
                                <li><a href="#"><span></span>{{ trans('settings.layout.color.red') }}</a></li>
                                <li><a href="#" class="brown"><span>{{ trans('settings.layout.color.yellow') }}</span></a></li>
                                <li><a href="#" class="purple"><span>{{ trans('settings.layout.color.white') }}</span></a></li>
                                <li><a href="#" class="gray"><span>{{ trans('settings.layout.color.pink') }}</span></a></li>
                            </ul>
                        </div>
                        <div class="color-quality-right">
                            <h5>{{ trans('settings.layout.user.cart.quantity') }}</h5>
                            <div class="quantity"> 
                                <div class="quantity-select">                           
                                    <div class="entry value-minus1"></div>
                                    <div class="entry value1"><span>1</span></div>
                                    <div class="entry value-plus1 active"></div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="occasional">
                        <h5>{{ trans('settings.layout.user.ocasion') }}/h5>
                        <div class="colr ert">
                            <div class="check">
                                <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i></label>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="simpleCart_shelfItem">
                        <p><span></span> <i class="item_price"></i></p>
                        <p><a class="item_add" href="#"></a></p>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
@endsection
