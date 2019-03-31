@extends('mainTheme')

@section('title' , 'Tambah Tagihan')

@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Penggunaan Pelanggan</h4>
                <form class="form-sample" action="{{ route('penggunaan.store') }}" method="post">
                    {{ csrf_field() }}
                    <p class="card-description">
                        {{ $getUser->name }}
                    </p>
                    <input type="hidden" name="id_user" value="{{ $getUser->id }}">
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="error">{{ $error }}</div>
                            <br>
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Bulan</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="month" name="month">
                                        @for($i = 0 ; $i < count($month) ; $i++)
                                            <option value="{{ $month[$i] }}">{{ $month[$i] }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tahun</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="year" name="year">
                                        @for($x = 2000 ; $x <= $yearNow ; $x++)
                                            <option value="{{ $x }}">{{ $x }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Meter Awal</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="meter_awal" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Meter Akhir</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="meter_akhir" required/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>

@endsection