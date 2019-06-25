@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.makanan.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.makanan.fields.makanan')</th>
                            <td field-key='makanan'>@if($makanan->makanan)<a href="{{ asset(env('UPLOAD_PATH').'/' . $makanan->makanan) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $makanan->makanan) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.makanan.fields.stok')</th>
                            <td field-key='stok'>{{ $makanan->stok }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.makanan.fields.deskripsi')</th>
                            <td field-key='deskripsi'>{!! $makanan->deskripsi !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.makanans.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


