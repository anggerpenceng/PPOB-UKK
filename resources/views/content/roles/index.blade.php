@extends('mainTheme')

@section('title' , 'Manage Roles')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataTable/dataTables.bootstrap4.min.css') }}"/>
@endsection

@section('content')

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Aturan Pengguna</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{route('roles.store')}}" method="POST" class="form-group">
                        {{ csrf_field() }}
                        <div>
                            <label>Name Aturan</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <br>
                        <div>
                            <button type="submit" class="btn btn-gradient-primary btn-rounded">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    @foreach($getRole as $modalRole)
        <div id="edit-{{$modalRole->id}}" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Data Aturan Pengguna</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('roles.update' , $modalRole->id)}}" method="POST" class="form-group">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <input type="hidden" name="id" value="{{$modalRole->id}}">
                            <div>
                                <label>Nama Aturan</label>
                                <input type="text" name="name" class="form-control" value="{{$modalRole->nama_role}}">
                            </div>
                            <br>
                            <div>
                                <button type="submit" class="btn btn-gradient-primary btn-rounded">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    @endforeach

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">User Data List</h4>
                <p class="card-description">
                    Manage <code> Users Access Roles </code>
                </p>
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="error">{{ $error }}</div>
                        <br>
                    @endforeach
                @endif
                @if(Session::has('info'))
                    <div class="success">{{ Session::get('info') }}</div>
                    <br>
                @endif
                <button type="button" class="btn btn-gradient-danger btn-rounded btn-icon-text float-right" style="margin-left:10px">
                    <i class="mdi mdi-delete-sweep btn-icon-prepend"></i>
                    All
                </button>
                <button type="button" class="btn btn-gradient-success btn-rounded btn-icon float-right" data-toggle="modal" data-target="#myModal">
                    <i class="mdi mdi-plus"></i>
                </button>
                <table class="table table-bordered" id="role_data_table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Role</th>
                        <th>Dibuat Pada</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nama Role</th>
                        <th>Dibuat Pada</th>
                        <th>Aksi</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($getRole as $roles)
                        <tr>
                            <td>{{ $roles->id }}</td>
                            <td>{{ $roles->nama_role }}</td>
                            <td>{{ date('l , d F Y' , strtotime($roles->created_at)) }}</td>
                            <td>
                                <form action="{{ route('roles.destroy' , $roles->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="button" class="btn btn-rounded btn-sm btn-info btn-icon" data-toggle="modal" data-target="#edit-{{ $roles->id }}">
                                        <i class="mdi mdi-grease-pencil"></i>
                                    </button>
                                    <button type="submit" class="btn btn-rounded btn-sm btn-danger btn-icon" onclick="return confirm('yakin ingin menghapus? Semua data yang berhubungan dengan role ini akan hilang')">
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
            $('#role_data_table').DataTable();
        });
    </script>
@endsection