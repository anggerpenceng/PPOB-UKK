@extends('mainTheme')

@section('title' , 'Manage Users')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataTable/dataTables.bootstrap4.min.css') }}"/>
@endsection

@section('content')

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">User Data List</h4>
                <p class="card-description">
                    kelola data<code> Pengguna Aktif </code>
                </p>
                <button type="button" class="btn btn-gradient-danger btn-rounded btn-icon-text float-right" style="margin-left:10px">
                    <i class="mdi mdi-delete-sweep btn-icon-prepend"></i>
                    All
                </button>
                <a href="users/create">
                    <button type="button" class="btn btn-gradient-success btn-rounded btn-icon float-right">
                        <i class="mdi mdi-plus"></i>
                    </button>
                </a>
                <table class="table table-bordered" id="user_data_table">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Nomer KWH</th>
                        <th>Alamat</th>
                        <th>Tarif KWH</th>
                        <th width="140px">Aksi</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Nomer KWH</th>
                        <th>Alamat</th>
                        <th>Tarif KWH</th>
                        <th>Aksi</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @php $no = 1 @endphp
                    @foreach($getUser as $users)
                        @php
                            $users->alamat = json_decode($users->alamat);
                        @endphp
                        @if($users->id_role > 1)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $users->name }}</td>
                                <td>{{ $users->nomor_kwh }}</td>
                                <td>
                                    {{ $users->alamat->address }}, {{ $users->alamat->city }}, {{ $users->alamat->state }}, {{ $users->alamat->postcode }}
                                </td>
                                @if($users->tarif)
                                    <td>{{ $users->tarif->daya }}</td>
                                @else
                                    <td>Belum Di Tetapkan</td>
                                @endif
                                <td>
                                    <form action="{{ route('users.destroy' , $users->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <a href="{{ route('users.edit' , $users->id) }}">
                                            <button type="button" class="btn btn-rounded btn-sm btn-info btn-icon">
                                                <i class="mdi mdi-grease-pencil"></i>
                                            </button>
                                        </a>
                                        <button type="submit" class="btn btn-rounded btn-sm btn-danger btn-icon" onclick="return confirm('yakin ingin menghapus?')">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('assets/js/dataTable/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/dataTable/dataTables.bootstrap4.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#user_data_table').DataTable();
        });
    </script>
@endsection