@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('preloader')
    <i class="fab fa-4x fa-spin fa-cloudscale text-secondary"></i>
    <h4 class="mt-4 text-dark">Memuat</h4>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">Selamat Datang, {{Auth::user()->getRoleNames()[0]}}! <i class="far fa-grin-beam"></i> </p>
                    <div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('footer')
    <div class="float-right text-xs">
        <cite title="Source Title">Version: {{ config('app.version', '1.0.0') }}</cite></small>
        
    </div>

    <strong>
        <a href="{{ config('app.company_url', '#') }}" class="text-sm">
            {{ config('app.company_name', 'Pemrograman Web 2') }}
        </a>
    </strong>
@stop