@extends('layouts.user.layout')
@section('content')
<!-- mail -->
<div class="mail">
    <div class="container">
        <h3>{{ trans('custom.myAccount') }}</h3>
        <div class="agile_mail_grids">
            <div class="col-md-3 contact-left">
                <h4>{{ trans('custom.myAccount') }}</h4>
                {!! Html::image(config('custom.image.path_avatar') . '/' . $user->avatar, 'avatar',
                    ['id' => 'imageAvatar']
                )!!}
                <ul>
                    <li><li>{!! Html::linkRoute('profile.index', trans('custom.myAccount')) !!}</li></li>
                    <li>{!! Html::linkRoute('changePass', trans('custom.formLogin.changePassword')) !!}</li>
                    <li>{!! Html::link('#',trans('custom.order.myOrder')) !!}</li>
                </ul>
                <img src="" alt="">
            </div>
            <div class="col-md-9 contact-left">
                <h4>{{ trans('custom.formLogin.changePassword') }}</h4>
                @if(Session::has('success'))
                <div class="alert alert-success">
                    <i>
                        <p>{{ Session::get('success')}}</p>
                    </i>
                </div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger">
                    <i>
                        <p>{{ Session::get('fail')}}</p>
                    </i>
                </div>
                @endif
                {!! Form::open([
                    'method' => 'POST',
                    'route' => 'storePass'
                ]) !!}
                <div class="form-group row">
                    {!! Form::label(
                        'old_password',
                        trans('custom.old_password'),
                        ['class' => 'col-md-4 col-form-label text-md-right']
                    ) !!}
                    <div class="col-md-6">
                        {!! Form::password(
                            'old_password',
                            [
                                'id' => 'inputEmail',
                                'class' => 'form-control',
                                'required autofocus'
                            ]
                        ) !!}
                        @if ($errors->has('old_password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('old_password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label(
                        'password',
                        trans('custom.formLogin.passwordNew'),
                        ['class' => 'col-md-4 col-form-label text-md-right']
                    ) !!}
                    <div class="col-md-6">
                        {!! Form::password(
                            'password',
                            [
                                'id' => 'password',
                                'class' => 'form-control',
                                'required'
                            ]
                        ) !!}
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label(
                        'password-confirm',
                        trans('custom.register.confirm_password'),
                        ['class' => 'col-md-4 col-form-label text-md-right']
                    ) !!}
                    <div class="col-md-6">
                        {{ Form::password('password_confirmation',
                            [
                                'id' => 'password-confirm',
                                'class' => 'form-control',
                                'required'
                            ]
                        ) }}
                    </div>
                </div>
                <div class="form-group row" align="center">
                    {!! Form::submit(
                        trans('custom.formLogin.reset'),
                        ['class' => 'btn btn-primary']
                    ) !!}
                </div>
                {!! Form::close() !!}
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //mail -->
@endsection
