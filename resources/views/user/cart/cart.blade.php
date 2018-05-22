@extends('layouts.user.layout')
@section('content')
<!-- breadcrumbs -->
<div class="breadcrumb_dress">
    <div class="container">
        <ul>
            <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span> {{ Html::linkRoute('home', trans('settings.layout.user.home')) }}</a> <i>/</i></li>
            <li>{{ trans('custom.cart.checkout') }}</li>
        </ul>
    </div>
</div>
<!-- //breadcrumbs -->
<!-- checkout -->
<div class="checkout">
    <div class="container">
        <h3>{{ trans('custom.cart.contain') }} <span>{{ Cart::count() }} {{ trans('custom.cart.product') }}</span></h3>
        @if(Session::has('fail'))
        <div class="alert alert-danger">
            <i>
                <p>{{ Session::get('fail')}}</p>
            </i>
        </div>
        @endif

        @if(Session::has('success'))
        <div class="alert alert-success">
            <i>
                <p>{{ Session::get('success')}}</p>
            </i>
        </div>
        @endif
        <div class="checkout-right">
            <table class="timetable_sub">
                <thead>
                    <tr>
                        <th>{{ trans('custom.cart.number') }}</th>
                        <th>{{ trans('custom.cart.image') }}</th>
                        <th>{{ trans('custom.cart.quantity') }}</th>
                        <th>{{ trans('custom.cart.name') }}</th>
                        <th>{{ trans('custom.cart.price') }}</th>
                        <th>{{ trans('custom.cart.remove') }}</th>
                    </tr>
                </thead>
                @if (count($cart))
                    @foreach ($cart as $item)
                        <tr class="rem1">
                            <td class="invert">{{ $count + 1 }}</td>
                            <td class="invert-image"><a href="#"><img src="{{ asset('storage/images/product/'.$item->options->image) }}" alt=" " class="img-responsive" /></a></td>
                            <td class="invert">
                                <div class="quantity">
                                    <div class="quantity-select">
                                        <div class="entry value-minus">
                                            {!! Form::open([
                                                'method' => 'POST',
                                                'route' => ['decrementQty', $item->id]
                                            ]) !!}
                                                {{ Form::hidden('rowId',$item->rowId) }}
                                                {{ Form::hidden('qty', $item->qty )}}
                                                {!! Form::submit('-',
                                                    [
                                                        'class' => 'entry value-minus',
                                                        'id' => 'minusInput'
                                                    ]
                                                ) !!}
                                            {!! Form::close() !!}
                                        </div>
                                        <div class="entry value">
                                            <span>{{ $item->qty }}</span>
                                        </div>
                                        <div class="entry value-plus active">
                                            {!! Form::open([
                                                'method' => 'POST',
                                                'route' => ['incrementQty', $item->id]
                                            ]) !!}
                                                {{ Form::hidden('rowId',$item->rowId) }}
                                                {{ Form::hidden('qty', $item->qty )}}
                                                {!! Form::submit('+',
                                                    [
                                                        'class' => 'entry value-plus active',
                                                        'id' => 'plusInput'
                                                    ]
                                                ) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="invert">{{ $item->name }}</td>
                            <td class="invert">{{ $item->price }}</td>
                            <td class="invert">
                                <div class="rem">
                                    {!! Form::open([
                                        'method' => 'POST',
                                        'route' => 'destroyItemCart'
                                    ]) !!}
                                        {!! Form::hidden('rowId',$item->rowId) !!}
                                        {!! Form::submit('x', 
                                            [
                                                'class' => 'close1',
                                                'id' => 'closeSubmit'
                                            ]
                                        )!!}
                                    {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
        <div class="checkout-left">
            <div class="checkout-left-basket">
                <h4>{{ trans('custom.cart.bill') }}</h4>
                <ul>
                    @if(count($cart))
                        @foreach($cart as $item)
                            <li>{{ $item->name }}<i>-</i> <span>{{ number_format($item->price*$item->qty, 2, ".", ",") }}</span></li>
                        @endforeach
                    @endif
                    <li>{{ trans('custom.cart.total')}} <i>-</i> <span>{{ number_format(Cart::total(), 2, '.', ',') }}</span></li>
                </ul>
            </div>
            <div class="checkout-right-basket">
                <a href="{{ route('createOrder') }}"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>{{ trans('custom.cart.order') }}</a>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //checkout -->
@endsection
