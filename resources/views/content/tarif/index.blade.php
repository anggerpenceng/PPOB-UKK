@extends('mainTheme')

@section('title' , 'Tarif')

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
                    <form action="{{route('tarif.store')}}" method="POST" class="form-group">
                        {{ csrf_field() }}
                        <div>
                            <label>Daya</label>
                            <input type="number" name="daya" class="form-control">
                        </div>
                        <br>
                        <div>
                            <label>Tarif Per KWH</label>
                            <input type="number" name="tarifperkwh" class="form-control">
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

    @foreach($getTarif as $modalTarif)
        <div id="edit-{{$modalTarif->id}}" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Data Aturan Pengguna</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('tarif.update' , $modalTarif->id)}}" method="POST" class="form-group">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <input type="hidden" name="id" value="{{$modalTarif->id}}">
                            <div>
                                <label>Daya</label>
                                <input type="number" name="daya" class="form-control" value="{{$modalTarif->daya}}">
                            </div>
                            <br>
                            <div>
                                <label>Tarif Per KWH</label>
                                <input type="number" name="tarifperkwh" class="form-control" value="{{$modalTarif->tarifperkwh}}">
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
                <h4 class="card-title">Tarif Data List</h4>
                <p class="card-description">
                    Manage <code> Tarif </code>
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
                <button type="button" class="btn btn-gradient-success btn-rounded btn-icon float-right" data-toggle="modal" data-target="#myModal">
                    <i class="mdi mdi-plus"></i>
                </button>
                <table class="table table-bordered" id="role_data_table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Daya</th>
                        <th>Tarif /KWH</th>
                        <th>Dibuat Pada</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Daya</th>
                        <th>Tarif /KWH</th>
                        <th>Dibuat Pada</th>
                        <th>Aksi</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($getTarif as $tarif)
                        <tr>
                            <td>{{ $tarif->id }}</td>
                            <td>{{ $tarif->daya }}</td>
                            <td>Rp. {{ number_format($tarif->tarifperkwh) }}.-</td>
                            <td>{{ date('l , d F Y' , strtotime($tarif->created_at)) }}</td>
                            <td>
                                <form action="{{ route('tarif.destroy' , $tarif->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="button" class="btn btn-rounded btn-sm btn-info btn-icon" data-toggle="modal" data-target="#edit-{{ $tarif->id }}">
                                        <i class="mdi mdi-grease-pencil"></i>
                                    </button>
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
            $('#role_data_table').DataTable();
        });
    </script>
@endsection