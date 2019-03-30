@extends('mainTheme')

@section('title' , 'Add Admin')

@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Admin Baru</h4>
                <form class="form-sample" action="{{ route('admin.store') }}" method="post">
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
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Roles</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="role" name="id_role">
                                        @foreach($getRoles as $role)
                                            <option value="{{ $role->id }}">{{ $role->nama_role }}</option>
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
                                <label class="col-sm-3 col-form-label">Negara</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="country" />
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