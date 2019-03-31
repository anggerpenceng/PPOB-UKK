@extends('mainTheme')

@section('title' , 'Manage Users')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataTable/dataTables.bootstrap4.min.css') }}"/>
@endsection

@section('content')

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Penggunaan Data List</h4>
                <p class="card-description">
                    kelola data<code> Penggunaan Aktif </code>
                </p>
                <table class="table table-bordered" id="user_data_table">
                    <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Nomer KWH</th>
                        <th>Daya</th>
                        <th width="440px">Aksi</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Nomer KWH</th>
                        <th>Daya</th>
                        <th>Aksi</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($getUser as $users)
                        @php
                            $users->alamat = json_decode($users->alamat);
                        @endphp
                        @if($users->id_role > 1)
                            <tr>
                                <td>{{ $users->name }}</td>
                                <td>{{ $users->nomor_kwh }}</td>
                                @if($users->tarif)
                                    <td>{{ $users->tarif->daya }}</td>
                                @else
                                    <td>Belum Di Tetapkan</td>
                                @endif
                                <td>
                                    <a href="{{ route('penggunaan.show' , $users->id) }}">
                                        <button class="btn btn-primary btn-sm">Tambah Penggunaan</button>
                                    </a>
                                    <a href="{{ route('penggunaan.edit' , $users->id) }}">
                                        <button class="btn btn-info btn-sm">Lihat Penggunaan</button>
                                    </a>
                                    <a href="/penggunaan/tagihan/{{ $users->id }}">
                                        <button class="btn btn-success btn-sm">Tagihan</button>
                                    </a>
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