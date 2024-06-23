@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark"><i class="fas fa-user-lock"></i> Role Pengguna</h1>
@stop

@section('preloader')
<i class="fab fa-4x fa-spin fa-cloudscale text-secondary"></i>
    <h4 class="mt-4 text-dark">Memuat</h4>
@stop

@section('content')
    <a class="btn btn-app bg-secondary elevation-4" href="{{ route('roles.index') }}"><i class="fa fa-angle-left"></i> Kembali</a>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <div class="col-md-8">
        <div class="card card-primary elevation-2">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-pencil-alt"></i> Edit</h3>
            </div>
        <form method="POST"  action="{{ route('roles.update', $role->id) }}" class="form-horizontal">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="name" id="name" placeholder="Nama Role" value="{{ $role->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Permission</label>
                    <div class="col-sm-10">
                        @foreach($permission as $value)
                            <label><input type="checkbox" name="permission[{{$value->id}}]" value="{{$value->id}}" class="name" {{ in_array($value->id, $rolePermissions) ? 'checked' : ''}}> {{ $value->name }}</label><br/>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-outline-primary float-right" type="submit"><i class="fas fa-pencil-alt"></i> Update</button>
            </div> 
        </form>
        </div>
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