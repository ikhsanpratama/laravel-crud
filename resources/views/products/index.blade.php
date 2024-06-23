@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('content_header')
    <h1 class="m-0 text-dark">Produk</h1>
@stop

@section('preloader')
<i class="fab fa-4x fa-spin fa-cloudscale text-secondary"></i>
    <h4 class="mt-4 text-dark">Memuat</h4>
@stop

@php
$heads = [
    ['label' => 'Produk', 'classes' => 'text-center'],
    ['label' => 'Deskripsi', 'classes' => 'text-center', 'width' => 60],
    ['label' => 'Harga (Rp)', 'classes' => 'text-center','width' => 10],
    ['label' => 'Aksi', 'no-export' => true, 'classes' => 'text-center','width' => 10],
];
@endphp

@section('content')
    <a href="{{ route('products.create') }}" class="btn btn-app bg-success elevation-4"> <i class="fas fa-plus-square"></i> produk</a>
    <div class="col-md-12">
        <div class="card card-info elevation-4">
            <div class="card-body">
                <x-adminlte-datatable id="produk" :heads="$heads">
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td class="text-right">{{ number_format($product->price,0,0,".") }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm bg-warning"><i class="fas fa-lg fa-fw fa-edit"></i></a>
                                    &nbsp;
                                    <form method="POST" action="{{ route('products.destroy', $product) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm bg-danger" title="Delete" type="submit"><i class="fa fa-lg fa-fw fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </x-adminlte-datatable>
            </div>
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