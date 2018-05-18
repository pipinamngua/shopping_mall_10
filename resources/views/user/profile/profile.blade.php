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
                    <li>{!! Html::linkRoute('profile.index', trans('custom.myAccount')) !!}</li>
                    <li>{!! Html::linkRoute('changePass', trans('custom.formLogin.changePassword')) !!}</li>
                    <li>{!! Html::linkRoute('indexOrderUser', trans('custom.order.myOrder')) !!}</li>
                </ul>
                <img src="" alt="">
            </div>
            <div class="col-md-9 contact-left">
                <h4>{{ trans('custom.editUser') }}</h4>
                @if(Session::has('success'))
                <div class="alert alert-success">
                    <i>
                        <p>{{ Session::get('success')}}</p>
                    </i>
                </div>
                @endif
                {!! Form::model(
                    $user,
                    [
                        'route' => ['profile.update',$user->id],
                        'method' => 'PATCH',
                        'class' => 'form-horizontal style-form',
                        'enctype' => 'multipart/form-data',
                        'id' => 'edit-user',
                    ]
                )!!}
                {!! Form::hidden('formType','edit') !!}
                <div class="form-group">
                    {!! Form::label(
                        'name',
                        trans('custom.user_admin.name_user'),
                        ['class' => 'col-sm-2 col-sm-2 control-label']
                    ) !!}
                    <div class="col-sm-10">
                        {!! Form::text(
                            'name',
                            null,
                            [
                                'placeholder' => trans('custom.user_admin.name_text'),
                                'class' => 'form-control',
                                'id' => 'nameUser'
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
                            null,
                            [
                                'placeholder' => trans('custom.user_admin.email_text'),
                                'class' => 'form-control',
                                'id' => 'emailUser'
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
                            null,
                            [
                                'placeholder' => trans('custom.user_admin.email_text'),
                                'class' => 'form-control',
                                'id' => 'phoneUser'
                            ]
                        ) !!}
                        <br>
                        {!! $errors->first('phone','<p style="color:red">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label(
                        'credit_card',
                        trans('custom.user_admin.credit_card'),
                        ['class' => 'col-sm-2 col-sm-2 control-label']
                    ) !!}
                    <div class="col-sm-10">
                        {!! Form::text(
                            'credit_card',
                            null,
                            [
                                'placeholder' => trans('custom.user_admin.credit_card_text'),
                                'class' => 'form-control',
                                'id' => 'creditUser'
                            ]
                        ) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label(
                        'avatar',
                        trans('custom.user_admin.avatar'),
                        ['class' => 'col-sm-2 col-sm-2 control-label']
                    ) !!}
                    <div class="col-sm-10">
                        {!! Form::file('avatar') !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label(
                        'gender',
                        trans('custom.user_admin.gender'),
                        ['class' => 'col-sm-2 col-sm-2 control-label']
                    ) !!}
                    <div class="col-sm-10">
                        {!! Form::select(
                            'gender',
                            [
                                "Male" => 'Male',
                                "Female" => 'Female',
                            ],
                            null,
                            [
                                'placeholder' => trans('custom.form.select_gender'),
                                'class' => 'form-control',
                            ]
                        ) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label(
                        'dob',
                        trans('custom.user_admin.dob'),
                        ['class' => 'col-sm-2 col-sm-2 control-label']
                    ) !!}
                    <div class="col-sm-10">
                        {!! Form::date(
                            'dob',
                            null,
                            ['class' => 'form-control']
                        ) !!}
                        <br>
                        {!! $errors->first('dob','<p style="color:red">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group" align="center">
                    {!! Form::submit(
                        trans('custom.form.edit'),
                        ['class' => 'btn btn-round btn-success']
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
