@extends('mainTheme')

@section('title' , 'Manage Admin')

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
                <a href="/users">
                    <button type="button" class="btn btn-gradient-primary btn-rounded btn-icon-text float-right" style="margin-left:10px">
                        <i class="mdi mdi-account btn-icon-prepend"></i>
                        Pelanggan
                    </button>
                </a>
                <a href="admin/create">
                    <button type="button" class="btn btn-gradient-success btn-rounded btn-icon float-right">
                        <i class="mdi mdi-plus"></i>
                    </button>
                </a>
                <table class="table table-bordered" id="user_data_table">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Roles</th>
                        <th width="120px">Aksi</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Roles</th>
                        <th>Aksi</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @php $no = 1 @endphp
                    @foreach($getAdmin as $admin)
                        @php
                            $admin->alamat = json_decode($admin->alamat);
                        @endphp
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>
                                {{ $admin->alamat->address }}, {{ $admin->alamat->city }}, {{ $admin->alamat->state }}, {{ $admin->alamat->country }}, {{ $admin->alamat->postcode }}
                            </td>
                            <td>{{ $admin->roles->nama_role }}</td>
                            <td>
                                <form action="{{ route('admin.destroy' , $admin->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <a href="{{ route('admin.edit' , $admin->id) }}">
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