@extends('layouts.admin.layout')

@section('title')
    {{ trans('custom.product.title', ['action' => 'Show']) }}
@endsection

@section('content')
<div class="row mt">
    <div class="col-7 col-lg-8">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i>{{ trans('custom.product.title', ['action' => 'Show']) }}</h4>
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <i>
                        <p>{{ Session::get('success')}}</p>
                    </i>
                </div>
            @endif
            @if (Session::has('unsuccess'))
                <div class="alert alert-success">
                    <i>
                        <p>{{ Session::get('unsuccess')}}</p>
                    </i>
                </div>
            @endif
            {!! Form::model(
                $product,
                [
                    'route' => ['product.update', $product->id],
                    'method' => 'PATCH',
                    'class' => 'form-horizontal style-form',
                    'enctype' => 'multipart/form-data',
                    'id' => 'edit-product',
                ]
            )!!}

            {!! Form::hidden('formType', 'edit') !!} 
            
            <div class="form-group">
                {!! Form::label(
                    'name',
                    trans('custom.product.name'),
                    [
                        'class' => 'col-sm-2 col-sm-2 control-label',
                    ]
                 ) !!}
                <div class="col-sm-8">
                {!! Form::text(
                    'name',
                    null,
                    [
                        'placeholder' => trans('custom.product.name_placeholder'),
                        'class' => 'form-control',
                    ]
                ) !!}
                <br>
                {!! $errors->first('name','<p style="color:red">:message</p>') !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label(
                    'category_id',
                    trans('custom.product.category'),
                    [
                        'class' => 'col-sm-2 col-sm-2 control-label',
                    ]
                 ) !!}
                <div class="col-sm-8">
                    {!! Form::select(
                        'category_id',
                        $categories,
                        null
                        ,
                        [
                            'placeholder' => trans('custom.product.select_category'),
                            'class' => 'form-control',
                        ]
                    ) !!} 
                </div>                             
            </div>

            <div class="form-group">
                {!! Form::label(
                    'supplier_id',
                    trans('custom.product.supplier'),
                    [
                        'class' => 'col-sm-2 col-sm-2 control-label',
                    ]
                 ) !!}
                <div class="col-sm-8">
                {!! Form::select(
                    'supplier_id',
                    $suppliers,
                    null
                    ,
                    [
                        'placeholder' => trans('custom.product.select_supplier'),
                        'class' => 'form-control',
                    ]
                ) !!} 
                </div>
            </div>                          

            <div class="form-group">
                {!! Form::label(
                    'price_in',
                    trans('custom.product.price_in'),
                    [
                        'class' => 'col-sm-2 col-sm-2 control-label',
                    ]
                 ) !!}
                <div class="col-sm-8">
                {!! Form::text(
                    'price_in',
                    null,
                    [
                        'placeholder' => trans('custom.product.price_placeholder'),
                        'class' => 'form-control',
                    ]
                ) !!}
                <br>
                {!! $errors->first('price_in','<p style="color:red">:message</p>') !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label(
                    'price_out',
                    trans('custom.product.price_out'),
                    [
                        'class' => 'col-sm-2 col-sm-2 control-label',
                    ]
                 ) !!}
                <div class="col-sm-8">
                {!! Form::text(
                    'price_out',
                    null,
                    [
                        'placeholder' => trans('custom.product.price_placeholder'),
                        'class' => 'form-control',
                    ]
                ) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label(
                    'description',
                    trans('custom.product.description'),
                    [
                        'class' => 'col-sm-2 col-sm-2 control-label',
                    ]
                 ) !!}
                <div class="col-sm-8">
                {!! Form::text(
                    'description',
                    null,
                    [
                        'placeholder' => trans('custom.product.description_placeholder'),
                        'class' => 'form-control',
                    ]
                ) !!}
                <br>
                {!! $errors->first('description','<p style="color:red">:message</p>') !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label(
                    'status',
                    trans('custom.product.status'),
                    [
                        'class' => 'col-sm-2 col-sm-2 control-label',
                    ]
                 ) !!}
                <div class="col-sm-8">
                {!! Form::select(
                    'status',
                    [
                        '3' => 'Hot',
                        '1' => 'New',
                        '2' => 'Old',
                    ],
                    null
                    ,
                    [
                        'placeholder' => trans('custom.product.select_status'),
                        'class' => 'form-control',
                    ]
                ) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label(
                    'quantity',
                    trans('custom.product.quantity'),
                    [
                        'class' => 'col-sm-2 col-sm-2 control-label',
                    ]
                 ) !!}
                <div class="col-sm-8">
                {!! Form::text(
                    'quantity',
                    null,
                    [
                        'placeholder' => trans('custom.product.quantity_placeholder'),
                        'class' => 'form-control',
                    ]
                ) !!}
                <br>
                {!! $errors->first('quantity','<p style="color:red">:message</p>') !!}
                </div>
            </div>                          

            <div class="form-group">
                {!! Form::label(
                    'images',
                    trans('custom.product.images'),
                    [
                        'class' => 'col-sm-2 col-sm-2 control-label',
                    ]
                 ) !!}
                <div class="col-sm-8" id="input_img">
                {{ Form::file('images[]', ['multiple' => true, 'id' => 'images']) }}
                </div>
                <br><br>
                {!! $errors->first('url','<p style="color:red">:message</p>') !!}
            </div>

            <div class="form-group" align="center">
                {!! Form::reset(
                    trans('custom.form.reset'),
                    [
                        'class' => 'btn btn-warning',
                    ]
                ) !!}
                {!! Form::submit(
                    trans('custom.form.edit'),
                    [
                        'class' => 'btn btn-round btn-success'
                    ]
                ) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>    
    @if (isset($images) && $images->count() != 0)
        <div class="col-5 col-lg-4" id="div_img">
            <div class="form-panel">     
                @foreach($images as $image)
                    <img src="{{ asset('storage/images/product/' . $image->url) }}" alt="" class="img-responsive" />
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
