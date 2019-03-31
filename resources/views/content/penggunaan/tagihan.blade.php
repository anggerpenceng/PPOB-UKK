@extends('mainTheme')

@section('title' , 'Manage Penggunaan')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataTable/dataTables.bootstrap4.min.css') }}"/>
@endsection

@section('content')

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tagihan {{ $getPenggunaan->name }}</h4>
                <p class="card-description">
                    Status<code> Tagihan</code>
                </p>
                <table class="table table-bordered" id="user_data_table">
                    <thead>
                    <tr>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Total Penggunaan</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Total Penggunaan</th>
                        <th>Status</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($getPenggunaan->penggunaan as $penggunaan)
                        <tr>
                            <td>{{ $penggunaan->bulan }}</td>
                            <td>{{ $penggunaan->tahun }}</td>
                            <td>{{ $penggunaan->jumlah_meter }}</td>
                            @if($penggunaan->status > 0)
                                <td>Lunas</td>
                            @else
                                <td>Belum Bayar</td>
                            @endif
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