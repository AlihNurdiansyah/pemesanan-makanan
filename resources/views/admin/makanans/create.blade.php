@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.makanan.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.makanans.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('makanan', trans('quickadmin.makanan.fields.makanan').'*', ['class' => 'control-label']) !!}
                    {!! Form::file('makanan', ['class' => 'form-control', 'style' => 'margin-top: 4px;', 'required' => '']) !!}
                    {!! Form::hidden('makanan_max_size', 2) !!}
                    {!! Form::hidden('makanan_max_width', 4096) !!}
                    {!! Form::hidden('makanan_max_height', 4096) !!}
                    <p class="help-block"></p>
                    @if($errors->has('makanan'))
                        <p class="help-block">
                            {{ $errors->first('makanan') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('stok', trans('quickadmin.makanan.fields.stok').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('stok', old('stok'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('stok'))
                        <p class="help-block">
                            {{ $errors->first('stok') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('deskripsi', trans('quickadmin.makanan.fields.deskripsi').'*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('deskripsi', old('deskripsi'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('deskripsi'))
                        <p class="help-block">
                            {{ $errors->first('deskripsi') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

