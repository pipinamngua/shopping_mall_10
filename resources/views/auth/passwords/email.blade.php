@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ trans('custom.formLogin.reset') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    {!! Form::open([
                        'method' => 'POST',
                        'route' => 'password.email'
                    ]) !!}
                    <div class="form-group row">
                        {!! Form::label(
                            'email',
                            trans('custom.formLogin.email'),
                            ['class' => 'col-md-4 col-form-label text-md-right']
                        ) !!}
                        <div class="col-md-6">
                            {!! Form::email(
                                'email',
                                old('email'),
                                [
                                    'id' => 'email',
                                    'class' => 'form-control',
                                    'required'
                                ]
                            ) !!}
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            {!! Form::submit(
                                'submit',
                                ['class' => 'btn btn-primary']
                            ) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
