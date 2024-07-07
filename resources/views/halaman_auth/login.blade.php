<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/halaman_auth/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap-5.2.0-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/halaman_auth/style.css') }}">
    <title>MentalBot Login</title>
</head>
<body>

    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center min-vh-100">


    <!----------------------- Login Container -------------------------->

    <div class="row border rounded-5 p-3 bg-white shadow box-area">



    <!--------------------------- Left Box ----------------------------->

    <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #37517e ">
        <dive class="featured-image mb--3">
            <img src="{{ asset('assets/halaman_auth/images/1.png') }}" class="img-fluid" style="width:250px;">
        </dive>
        <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weihgt: 600;">Mental Bot</p>
        <h6 class="text-white tet-warp text-center" style="width: 17rem; font-family: 'Courier New', Courier, monospace">Kamu tidak perlu mengendalikan pikiranmu. Kamu hanya harus berhenti membiarkan mereka mengendalikanmu.</h6>
    </div>

    <!-------------------- ------ Right Box ---------------------------->

    <div class="col-md-6 right-box">
        <div class="row align-items-center"></div>
            <a href="/"> << back</a>
            <div class="header-text mb-4">
                <h2>Hallo again</h2>
                <p>Konsultasikan tentang kesehatan mental anda dengan kami</p>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item )
                    <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (Session::get ('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <ul>
                        <li>{{session::get ('success') }}</li>
                    </ul>
                </div>
            @endif

            <form action="{{ route('auth.login') }}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control form-control-lg bg-light fs-6" placeholder="email" value="{{ old('email') }}">
            </div>
            <div class="input-group mb-1">
                <input type="password" name="password" class="form-control form-control-lg bg-light fs-6" placeholder="password">
            </div>
            <div class="input-group mb-5 d-flex justify-content-between">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="formCheck">
                    <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                </div>
                <div class="forgot">
                    <small><a href="#">Forgot Password</a></small>
                </div>
            </div>
            <div class="input-group mb-3">
                <button class="btn btn-lg btn-primary w-100 fs-6 align-item-center" type="submit">login</button>
            </div>
            <div class="input-group mb-3">
                <button class="btn btn-lg btn-light w-100 fs-6 "><img src="{{ asset('/assets/halaman_auth/images/google.png') }}" style="width:20px" class="me-2"><small>sign with google</small></button>
            </div>
            <div class="row">
                <small>Don't have any account? <a href="{{ route('register') }}">Sign Up</a></small>
            </div>
            </div>
        </form>
        </div>
    </div>
    </div>
</body>
</html>
