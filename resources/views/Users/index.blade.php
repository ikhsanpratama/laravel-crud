@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('content_header')
    <h1 class="m-0 text-dark"><i class="fas fa-users"></i> Pengguna</h1>
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
        ['label' => 'Nama', 'classes' => 'text-center'],
        ['label' => 'Email', 'classes' => 'text-center'],
        ['label' => 'Role', 'no-export' => true, 'classes' => 'text-center','width' => 10],
        ['label' => 'Aksi', 'no-export' => true, 'classes' => 'text-center'],
    ];
    @endphp

    <a class="btn btn-app bg-success elevation-4" href="{{ route('users.create') }}"><i class="fa fa-plus"></i> Tambah</a>
    <div class="col-md-12">
        <div class="card card-info elevation-4">
            <div class="card-body">
                <x-adminlte-datatable id="pengguna" :heads="$heads">
                    @foreach ($data as $key => $user)
                    <tr>
                        <td class="text-center">{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                        @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                                @switch($v)
                                    @case("Administrator")
                                        <label class="badge bg-danger">{{ $v }}</label>
                                        @break
                                    @case("Kontributor")
                                        <label class="badge bg-warning">{{ $v }}</label>
                                        @break
                                    @default
                                    <label class="badge bg-success">{{ $v }}</label>
                                @endswitch
                            @endforeach
                        @endif
                        </td>
                        <td class="text-left">
                            <a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}"><i class="fas fa-eye"></i> Detail</a>
                            <a class="btn btn-warning btn-sm" href="{{ route('users.edit',$user->id) }}"><i class="fas fa-edit"></i> Edit</a>
                            @if(Auth::user()->id != $user->id)
                                <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display:inline" id="formHapus{{$user->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm" id="tombolHapus{{$user->id}}"><i class="fas fa-trash"></i> Hapus</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </x-adminlte-datatable>
            </div>
        </div>
    </div>


    {!! $data->links('pagination::bootstrap-5') !!}

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
@foreach ($data as $key => $user)
    <script>
        $(document).ready(function(){
        $("#tombolHapus{{$user->id}}").click(function(){
            Swal.fire({
                title: "Anda yakin?",
                text: "{{ $user->name}} akan dihapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "green",
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Batal",
                backdrop: `
                    rgba(10, 10, 10, 0.9)
                    no-repeat
                `
                }).then((result) => {
                if (result.isConfirmed) {
                    $("#formHapus{{$user->id}}").submit();
                }
                });
        });
        });
    </script>
@endforeach
@stop
