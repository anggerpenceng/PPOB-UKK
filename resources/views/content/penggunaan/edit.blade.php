@extends('mainTheme')

@section('title' , 'Manage Penggunaan')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataTable/dataTables.bootstrap4.min.css') }}"/>
@endsection

@section('content')

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Penggunaan {{ $getPenggunaan->name }}</h4>
                <p class="card-description">
                    kelola data<code> Penggunaan Aktif </code>
                </p>
                <table class="table table-bordered" id="user_data_table">
                    <thead>
                    <tr>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Meter Awal</th>
                        <th>Meter Akhir</th>
                        <th>Total Penggunaan</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Meter Awal</th>
                        <th>Meter Akhir</th>
                        <th>Total Penggunaan</th>
                        <th>Aksi</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($getPenggunaan->penggunaan as $penggunaan)
                        <tr>
                            <td>{{ $penggunaan->bulan }}</td>
                            <td>{{ $penggunaan->tahun }}</td>
                            <td>{{ $penggunaan->meter_awal }}</td>
                            <td>{{ $penggunaan->meter_akhir }}</td>
                            <td>{{ $penggunaan->jumlah_meter }}</td>
                            <td>
                                <form action="{{ route('penggunaan.destroy' , $penggunaan->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="hidden" name="id_user" value="{{ $getPenggunaan->id }}">
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