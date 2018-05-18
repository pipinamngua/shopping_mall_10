@extends('layouts.admin.layout')
@section('content')
<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i>{{ trans('custom.user_admin.edit_user') }} {{ $discount->name }}</h4>
            {!! Form::model($discount,
                [
                    'route' => ['discount.update', $discount->id],
                    'method' => 'PATCH',
                    'class' => 'form-horizontal style-form',
                    'enctype' => 'multipart/form-data',
                    'id' => 'add-discount',
                ]
            ) !!}
            {!! Form::hidden('formType', 'edit') !!}
            <div class="form-group">
                {!! Form::label(
                    'name',
                    trans('custom.user_admin.name_user'),
                    ['class' => 'col-sm-2 col-sm-2 control-label',]
                ) !!}
                <div class="col-sm-10">
                    {!! Form::text(
                        'name',
                        null,
                        [
                            'placeholder' => trans('custom.user_admin.name_text'),
                            'class' => 'form-control',
                        ]
                    ) !!}
                    <br>
                    {!! $errors->first('name', '<p style="color:red">:message</p>') !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label(
                    'start',
                    trans('custom.discountAdmin.start'),
                    ['class' => 'col-sm-2 col-sm-2 control-label',]
                ) !!}
                <div class="col-sm-10">
                    {!! Form::date(
                        'start',
                        null,
                        ['class' => 'form-control',]
                    ) !!}
                    <br>
                    {!! $errors->first('start', '<p style="color:red">:message</p>') !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label(
                    'end',
                    trans('custom.discountAdmin.start'),
                    ['class' => 'col-sm-2 col-sm-2 control-label',]
                ) !!}
                <div class="col-sm-10">
                    {!! Form::date(
                        'end',
                        null,
                        ['class' => 'form-control',]
                    ) !!}
                    <br>
                    {!! $errors->first('end', '<p style="color:red">:message</p>') !!}
                </div>
            </div>
            <div class="form-group" align="center">
                {!! Form::reset(
                    trans('custom.form.reset'),
                    ['class' => 'btn btn-warning',]
                ) !!}
                {!! Form::submit(
                    trans('custom.form.edit'),
                    ['class' => 'btn btn-round btn-success']
                ) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <!-- col-lg-12-->       
</div>
<!-- /row -->
@endsection
