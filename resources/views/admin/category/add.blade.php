@extends('layouts.admin.layout')

@section('title')
{{ trans('custom.category.title', ['action' => 'Add a']) }}
@endsection

@section('content')
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right">{{ trans('custom.category.title', ['action' => 'Add a']) }}</i></h4>
                {!! Form::open(
                    [
                        'route' => 'category.store',
                        'class' => 'form-horizontal style-form',
                        'enctype' => 'multipart/form-data',
                        'id' => 'add-category',
                    ]
                ) !!}
                {!! Form::hidden('formType', 'create') !!}
                <div class="form-group">
                {!! Form::label(
                        'name',
                        trans('custom.category.name'),
                        ['class' => 'col-sm-2 col-sm-2 control-label',]
                    ) !!}
                    <div class="col-sm-10">
                        {!! Form::text(
                            'name',
                            null,
                            [
                                'placeholder' => trans('custom.category.name_text'),
                                'class' => 'form-control',
                            ]
                        ) !!}
                        <br>
                        {!! $errors->first('name', '<p style="color:red">:message</p>') !!}
                    </div>
                 </div>

                <div class="form-group">
                    {!! Form::label(
                        'parent_id',
                        trans('custom.category.parent'),
                        [
                            'class' => 'col-sm-2 col-sm-2 control-label',
                        ]
                    ) !!}
                    <div class="col-sm-10">
                        {!! Form::select(
                            'parent_id',
                            $parent,
                            null
                            ,
                            [
                                'placeholder' => trans('custom.category.select_parent'),
                                'class' => 'form-control',
                            ]
                        ) !!}
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
