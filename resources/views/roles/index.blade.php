@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('content_header')
    <h1 class="m-0 text-dark"><i class="fas fa-user-lock"></i> Role Pengguna</h1>
@stop

@section('preloader')
<i class="fab fa-4x fa-spin fa-cloudscale text-secondary"></i>
    <h4 class="mt-4 text-dark">Memuat</h4>
@stop

@section('content')

    @session('success')
        @section('js')
            <script>
                Swal.fire({
                    title: "OK!",
                    text: "{{ $value }}",
                    icon: "success",
                    timer: 1000,
                });
            </script>
        @stop
    @endsession

    @php
    $heads = [
        ['label' => '#', 'classes' => 'text-center'],
        ['label' => 'Role', 'classes' => 'text-center'],
        ['label' => 'Aksi', 'no-export' => true, 'classes' => 'text-center'],
    ];
    @endphp

    @can('role-create')
    <a class="btn btn-app bg-success elevation-4" href="{{ route('roles.create') }}"><i class="fa fa-plus"></i> Tambah</a>
    @endcan
    <div class="col-md-12">
        <div class="card card-info elevation-4">
            <div class="card-body">
                <x-adminlte-datatable id="role" :heads="$heads">
                    @foreach ($roles as $key => $role)
                    <tr>
                        <td class="text-center">{{ ++$i }}</td>
                        <td>{{ $role->name }}</td>
                        <td class="text-center">
                            <a class="btn btn-info btn-sm" href="{{ route('roles.show',$role->id) }}"><i class="fas fa-eye"></i> Detail</a>
                            <a class="btn btn-warning btn-sm" href="{{ route('roles.edit',$role->id) }}"><i class="fas fa-edit"></i> Edit</a>
                            <form method="POST" action="{{ route('roles.destroy', $role->id) }}" style="display:inline" id="formHapusRole{{$role->id}}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm" id="tombolHapusRole{{$role->id}}"><i class="fas fa-trash"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </x-adminlte-datatable>
            </div>
        </div>
    </div>

{!! $roles->links('pagination::bootstrap-5') !!}
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
@section('js')
@foreach ($roles as $key => $role)
    <script>
        // $(document).ready(function(){
        $("#tombolHapusRole{{$role->id}}").click(function(){
            Swal.fire({
                title: "Anda yakin?",
                text: "Role {{ $role->name}} akan dihapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus!"
                }).then((result) => {
                if (result.isConfirmed) {
                    $("#formHapusRole{{$role->id}}").submit();
                }
                });
        });
        // });
    </script>
@endforeach
@stop