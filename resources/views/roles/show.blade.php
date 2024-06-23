@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark"><i class="fas fa-user-tag"></i> Role</h1>
@stop

@section('preloader')
<i class="fab fa-4x fa-spin fa-cloudscale text-secondary"></i>
    <h4 class="mt-4 text-dark">Memuat</h4>
@stop

@section('content')

    <a class="btn btn-app bg-secondary elevation-4" href="{{ route('roles.index') }}"><i class="fa fa-angle-left"></i> Kembali</a>
    <div class="col-md-4">
        <x-adminlte-card title="Role : {{ $role->name }}" theme="info" icon="fas fa-lg fa-tasks">
            <span class="bold">AKSES : </span><br/>
            @if(!empty($rolePermissions))
            <ul>
                @foreach($rolePermissions as $v)
                    <li>{{ $v->name }}</li>
                @endforeach
            </ul>
            @endif
        </x-adminlte-card>
    </div>
@endsection
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