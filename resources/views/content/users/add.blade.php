@extends('mainTheme')

@section('title' , 'Add Users')

@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Horizontal Two column</h4>
                <form class="form-sample" action="{{ route('users.store') }}" method="post">
                    {{ csrf_field() }}
                    <p class="card-description">
                        Personal info
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="username" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No. KWH</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nomer_kwh" maxlength="9" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Daya</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="daya" name="id_tarif">
                                        @foreach($getTarif as $tarif)
                                            <option value="{{ $tarif->id }}">{{ $tarif->daya }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="card-description">
                        Alamat
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Alamat 1</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="address" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Provinsi</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="state" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Code Pos</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="postcode" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kota</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="city" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kota</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="country">
                                        <option>America</option>
                                        <option>Italy</option>
                                        <option>Russia</option>
                                        <option>Britain</option>
                                        <option>Indonesia</option>
                                    </select>
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