@extends('layouts.user.layout')
@section('content')
<div class="mail">
    <div class="container">
        <h3>{{ trans('custom.myOrder') }}</h3>
        <div class="agile_mail_grids">
            <div class="col-md-3 contact-left">
                <h4>{{ trans('custom.myAccount') }}</h4>
                @if(Auth::check())
                	{!! Html::image(config('custom.image.path_avatar') . '/' . Auth::user()->avatar, 'avatar',
                    ['id' => 'imageAvatar']
                    )!!}
                @else
                    {!! Html::image(config('custom.image.path_avatar') . '/unknown.png' , 'avatar',
                    ['id' => 'imageAvatar']
                    )!!}
                @endif
            </div>
            <div class="col-md-9 contact-left">
                <h4>{{ trans('custom.myBill') }}</h4>
                @if(Session::has('success'))
                <div class="alert alert-success">
                    <i>
                        <p>{{ Session::get('success')}}</p>
                    </i>
                </div>
                @endif
                {!! Form::open(
                    [
                        'route' => ['orderStore'],
                        'method' => 'POST',
                        'class' => 'form-horizontal style-form',
                        'enctype' => 'multipart/form-data',
                        'id' => 'edit-user',
                    ]
                )!!}
              
                <div class="form-group">
                    {!! Form::label(
                        'fullname',
                        trans('custom.order.fullname'),
                        ['class' => 'col-sm-2 col-sm-2 control-label']
                    ) !!}
                    <div class="col-sm-10">
                        {!! Form::text(
                            'fullname',
                            Auth::check() ? Auth::user()->name : '',
                            [
                                'placeholder' => trans('custom.order.fullname'),
                                'class' => 'form-control',
                                'id' => 'nameUser',
                                'required'
                            ]
                        ) !!}
                        <br>
                        {!! $errors->first('name','<p style="color:red">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label(
                        'email',
                        trans('custom.user_admin.email'),
                        ['class' => 'col-sm-2 col-sm-2 control-label']
                    ) !!}
                    <div class="col-sm-10">
                        {!! Form::text(
                            'email',
                            Auth::check() ? Auth::user()->email : '',
                            [
                                'placeholder' => trans('custom.user_admin.email_text'),
                                'class' => 'form-control',
                                'id' => 'emailUser',
                                'required'
                            ]
                        ) !!}
                        <br>
                        {!! $errors->first('email','<p style="color:red">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label(
                        'phone',
                        trans('custom.user_admin.phone'),
                        ['class' => 'col-sm-2 col-sm-2 control-label']
                    ) !!}
                    <div class="col-sm-10">
                        {!! Form::text(
                            'phone',
                            Auth::check() ? Auth::user()->phone : '',
                            [
                                'placeholder' => trans('custom.user_admin.phone_text'),
                                'class' => 'form-control',
                                'id' => 'phoneUser',
                                'required'
                            ]
                        ) !!}
                        <br>
                        {!! $errors->first('phone','<p style="color:red">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group" id="formPayment">
                    {!! Form::label(
                        'payment',
                        trans('custom.order.payment'),
                        ['class' => 'col-sm-2 col-sm-2 control-label']
                    )!!}
                    <div class="col-sm-10">
                        {!! Form::select(
                           'payment',
                           [
                               "homepayment" => trans('custom.order.homepayment'),
                               "creditcard" => trans('custom.order.creditcard'),
                           ],
                           "homepayment",
                           [
                                'class' => 'form-control',
                                'id' => 'formPayment1'
                            ]
                       ) !!}
                    </div>
                </div>
                <div class="form-group" id="formCredit">
                    {!! Form::label(
                        'credit_card',
                        trans('custom.user_admin.credit_card'),
                        ['class' => 'col-sm-2 col-sm-2 control-label']
                    ) !!}
                    <div class="col-sm-10">
                        {!! Form::text(
                            'credit_card',
                            Auth::check() ? Auth::user()->credit_card : '',
                            [
                                'placeholder' => trans('custom.user_admin.credit_card_text'),
                                'class' => 'form-control',
                                'id' => 'creditUser',
                            ]
                        ) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label(
                        'address',
                        trans('custom.order.address'),
                        ['class' => 'col-sm-2 col-sm-2 control-label']
                    ) !!}
                    <div class="col-sm-10">
                        {!! Form::text(
                            'address',
                            null,
                            [
                                'class' => 'form-control',
                                'id' => 'inputAddress',
                                'required'
                            ]
                        ) !!}
                        <br>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label(
                        'subtotal',
                        trans('custom.order.total'),
                        ['class' => 'col-sm-2 col-sm-2 control-label']
                    ) !!}
                    <div class="col-sm-10">
                        {!! Form::text(
                            'subtotal',
                            Cart::total(),
                            [
                                'class' => 'form-control',
                                'id' => 'totalInput',
                                'readonly'
                            ]
                        ) !!}
                        <br>
                    </div>
                </div>
                
                <div class="form-group">
                    {!! Form::label(
                        'discount',
                        trans('custom.order.discount'),
                        ['class' => 'col-sm-2 col-sm-2 control-label']
                    ) !!}
                    <div class="col-sm-10">
                        {!! Form::text(
                            'discount',
                            '20%',
                            [
                                'class' => 'form-control',
                                'id' => 'discountInput',
                                'readonly'
                            ]
                        ) !!}
                        <br>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label(
                        'endtotal',
                        trans('custom.order.endtotal'),
                        ['class' => 'col-sm-2 col-sm-2 control-label']
                    ) !!}
                    <div class="col-sm-10">
                        {!! Form::text(
                            'endtotal',
                            Cart::total(),
                            [
                                'class' => 'form-control',
                                'id' => 'endTotalInput',
                                'readonly'
                            ]
                        ) !!}
                        <br>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label(
                        'message',
                        trans('custom.order.message'),
                        ['class' => 'col-sm-2 col-sm-2 control-label']
                    ) !!}
                    <div class="col-sm-10">
                        {!! Form::textarea(
                            'message'
                        ) !!}
                        <br>
                    </div>
                </div>

                <div class="form-group" align="center">
                    {!! Form::submit(
                        trans('custom.cart.order'),
                        ['class' => 'btn btn-round btn-success']
                    ) !!}
                </div>
                {!! Form::close() !!}
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
@endsection
