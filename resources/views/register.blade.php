
<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/linearicons/style.css') }}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicon.png') }}">
</head>

<body>
<!-- WRAPPER -->
<div id="wrapper">
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle">
            <div class="auth-box">
                <div class="content">
                    <div class="header">
                        <div class="logo text-center"><img src="{{ asset('assets/img/logo-dark.png') }}" alt="Klorofil Logo"></div>
                        <p class="lead">Daftar pengguna Baru</p>
                    </div>
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="error">{{ $error }}</div>
                            <br>
                        @endforeach
                    @endif
                    <form class="form-auth-small" action="{{ route('register') }}">
                        <div class="form-group">
                            <label for="signin-email" class="control-label sr-only">Nama</label>
                            <input type="text" class="form-control" id="signin-email" name="name" placeholder="Nama" required>
                        </div>
                        <div class="form-group">
                            <label for="signin-email" class="control-label sr-only">Username</label>
                            <input type="text" class="form-control" id="signin-email" name="username" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label for="signin-password" class="control-label sr-only">Password</label>
                            <input type="password" class="form-control" id="signin-password" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="signin-password" class="control-label sr-only">Alamat</label>
                            <textarea class="form-control" placeholder="Alamat" rows="5" name="alamat"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Daftar</button>
                        <div class="bottom">
                            <span class="helper-text"><i class="fa fa-backward"></i> <a href="/login">Kembali ke Login</a></span>
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!-- END WRAPPER -->
</body>

</html>
