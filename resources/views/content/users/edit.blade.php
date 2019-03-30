@extends('mainTheme')

@section('title' , 'Add Users')

@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Horizontal Two column</h4>
                <form class="form-sample" action="{{ route('users.update' , $getUser->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <p class="card-description">
                        Personal info
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" required value="{{ $getUser->name }}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="username" required value="{{ $getUser->username }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password" />
                                    <small>NB: Biarkan kosong jika tidak ingin mengubah</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No. KWH</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nomer_kwh" maxlength="9" value="{{ $getUser->nomor_kwh }}" />
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
                                            <option @if($tarif->id == $getUser->id_tarif) selected @endif value="{{ $tarif->id }}">{{ $tarif->daya }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="card-description">
                        Alamat
                    </p>
                    @php
                        $address = json_decode($getUser->alamat)
                    @endphp
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Alamat 1</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="address" value="{{ $address->address }}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Provinsi</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="state" value="{{ $address->state }}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Code Pos</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="postcode" value="{{ $address->postcode }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kota</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="city" value="{{ $address->city }}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Negara</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="country" value="{{ $address->country }}" />
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