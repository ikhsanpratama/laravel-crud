@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark"><i class="fas fa-users"></i> Pengguna</h1>
@stop

@section('preloader')
<i class="fab fa-4x fa-spin fa-cloudscale text-secondary"></i>
    <h4 class="mt-4 text-dark">Memuat</h4>
@stop

@section('content')
    <a class="btn btn-app bg-secondary elevation-4" href="{{ route('users.index') }}"><i class="fa fa-angle-left"></i> Kembali</a>
    <div class="col-md-4">
        
        <x-adminlte-profile-widget name="{{ $user->name }}" theme="lightblue" img="https://picsum.photos/300/300" cover="https://picsum.photos/id/9/550/200" class="elevation-4" footer-class="bg-gradient-dark">
            <x-adminlte-profile-row-item icon="fas fa-fw fa-envelope" title="Email" text="{{ $user->email }}" url="#"/>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <x-adminlte-profile-row-item icon="fas fa-fw fa-user-tag" title="Role" text="{{ $v }}" url="#"/>
                @endforeach
            @endif
            <x-adminlte-profile-row-item icon="fas fa-fw fa-user-clock" title="Akun Dibuat" text="{{ date_format($user->created_at, 'd F Y H:i:s') }}" url="#"/>
            <x-adminlte-profile-row-item icon="fas fa-fw fa-user-clock" title="Akun Diubah" text="{{ date_format($user->updated_at, 'd F Y H:i:s') }}" url="#"/>
        </x-adminlte-profile-widget>
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