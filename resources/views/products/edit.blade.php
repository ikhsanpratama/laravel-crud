@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Produk</h1>
@stop

@section('preloader')
<i class="fab fa-4x fa-spin fa-cloudscale text-secondary"></i>
    <h4 class="mt-4 text-dark">Memuat</h4>
@stop

@section('content')

    <div class="col-md-6">
        <div class="card card-primary elevation-2">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-plus"></i> Tambah</h3>
            </div>
        <form method="POST" action="{{ route('products.update', $product) }}" class="form-horizontal">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Produk</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description" id="description" required>{{ old('description', $product->description) }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" name="price" id="price" value="{{ old('price', $product->price) }}" step="0.01" required>
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