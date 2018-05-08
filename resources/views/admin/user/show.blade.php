@extends('layouts.admin.layout')

@section('content')
<div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i>{{ trans('custom.user_admin.edit_user') }} {{ $user->name }}</h4>
                      
                      {!! Form::model(
                          $user,
                          [
                              'route' => ['user.update',$user->id],
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
                                  [
                                      'class' => 'col-sm-2 col-sm-2 control-label',
                                  ]
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
                              {!! $errors->first('name','<p style="color:red">:message</p>') !!}
                              </div>
                              
                          </div>

                          <div class="form-group">
                              {!! Form::label(
                                  'email',
                                  trans('custom.user_admin.email'),
                                  [
                                      'class' => 'col-sm-2 col-sm-2 control-label',
                                  ]
                               ) !!}
                              <div class="col-sm-10">
                              {!! Form::text(
                                  'email',
                                  null,
                                  [
                                      'placeholder' => trans('custom.user_admin.email_text'),
                                      'class' => 'form-control',
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
                                  [
                                      'class' => 'col-sm-2 col-sm-2 control-label',
                                  ]
                               ) !!}
                              <div class="col-sm-10">
                              {!! Form::text(
                                  'phone',
                                  null,
                                  [
                                      'placeholder' => trans('custom.user_admin.email_text'),
                                      'class' => 'form-control',
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
                                  [
                                      'class' => 'col-sm-2 col-sm-2 control-label',
                                  ]
                               ) !!}
                              <div class="col-sm-10">
                              {!! Form::text(
                                  'credit_card',
                                  null,
                                  [
                                      'placeholder' => trans('custom.user_admin.credit_card_text'),
                                      'class' => 'form-control',
                                  ]
                              ) !!}
                              </div>
                          </div>
                          
                          <div class="form-group">
                              {!! Form::label(
                                  'avatar',
                                  trans('custom.user_admin.avatar'),
                                  [
                                      'class' => 'col-sm-2 col-sm-2 control-label',
                                  ]
                               ) !!}
                              <div class="col-sm-10">
                              {!! Form::file('avatar') !!}
                              </div>
                          </div>

                          <div class="form-group">
                              {!! Form::label(
                                  'gender',
                                  trans('custom.user_admin.gender'),
                                  [
                                      'class' => 'col-sm-2 col-sm-2 control-label',
                                  ]
                               ) !!}
                              <div class="col-sm-10">
                              {!! Form::select(
                                  'gender',
                                  [
                                      "Male" => 'Male',
                                      "Female" => 'Female',
                                  ],
                                  null
                                  ,
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
                                  [
                                      'class' => 'col-sm-2 col-sm-2 control-label',
                                  ]
                               ) !!}
                              <div class="col-sm-10">
                              {!! Form::date(
                                  'dob',
                                  null,
                                  [
                                      'class' => 'form-control',
                                  ]
                              ) !!}
                              <br>
                              {!! $errors->first('dob','<p style="color:red">:message</p>') !!}
                              </div>
                              
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
              </div><!-- col-lg-12-->       
            </div><!-- /row -->
@endsection
