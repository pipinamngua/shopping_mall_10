@extends('layouts.admin.layout')

@section('title')
{{ trans('custom.supplier.title', ['action' => 'Add a']) }}
@endsection

@section('content')
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i>{{ trans('custom.supplier.title', ['action' => 'Add a']) }}</h4>
                {!! Form::open(
                   [
                       'route' => 'supplier.store',
                       'class' => 'form-horizontal style-form',
                       'enctype' => 'multipart/form-data',
                       'id' => 'add-supplier',
                   ]
                ) !!}
                {!! Form::hidden('formType', 'create') !!}
                <div class="form-group">
                    {!! Form::label(
                        'name',
                        trans('custom.supplier.name'),
                        ['class' => 'col-sm-2 col-sm-2 control-label',]
                    ) !!}
                    <div class="col-sm-10">
                    {!! Form::text(
                        'name',
                        null,
                        [
                            'placeholder' => trans('custom.supplier.name_text'),
                            'class' => 'form-control',
                        ]
                        ) !!}
                        <br>
                        {!! $errors->first('name', '<p style="color:red">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label(
                        'address',
                        trans('custom.supplier.address'),
                        ['class' => 'col-sm-2 col-sm-2 control-label',]
                    ) !!}
                    <div class="col-sm-10">
                        {!! Form::text(
                            'address',
                            null,
                            [
                                'placeholder' => trans('custom.supplier.address_text'),
                                'class' => 'form-control',
                            ]
                        ) !!}
                        <br>
                        {!! $errors->first('address', '<p style="color:red">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label(
                        'phone',
                        trans('custom.supplier.phone'),
                        ['class' => 'col-sm-2 col-sm-2 control-label',]
                    ) !!}
                   <div class="col-sm-10">
                        {!! Form::text(
                            'phone',
                            null,
                            [
                                'placeholder' => trans('custom.supplier.phone_text'),
                                'class' => 'form-control',
                            ]
                        ) !!}
                        <br>
                        {!! $errors->first('phone', '<p style="color:red">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label(
                        'email',
                        trans('custom.supplier.email'),
                        ['class' => 'col-sm-2 col-sm-2 control-label',]
                    ) !!}
                   <div class="col-sm-10">
                        {!! Form::text(
                            'email',
                            null,
                            [
                                'placeholder' => trans('custom.supplier.email_text'),
                                'class' => 'form-control',
                            ]
                        ) !!}
                        <br>
                        {!! $errors->first('email', '<p style="color:red">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group" align="center">
                    {!! Form::reset(
                        trans('custom.form.reset'),
                        ['class' => 'btn btn-warning',]
                    ) !!}
                    {!! Form::submit(
                        trans('custom.form.create'),
                        ['class' => 'btn btn-round btn-success',]
                    ) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>     
    </div>
@endsection
