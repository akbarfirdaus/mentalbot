<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/halaman_auth/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap-5.2.0-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/halaman_auth/style.css') }}">
    <title>MentalBot Register</title>
</head>
<body>

    <!----------------------- Main Container -------------------------->

    <section class="container d-flex justify-content-center align-items-center min-vh-100">


    <!----------------------- Register Container -------------------------->

    <div class="row border rounded-5 p-3 bg-white shadow box-area">



    <!--------------------------- Left Box ----------------------------->

    <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #37517e ">
        <dive class="featured-image mb--3">
            <img src="{{ asset('assets/halaman_auth/images/1.png') }}" class="img-fluid" style="width:250px;">
        </dive>
        <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weihgt: 600;">Mental Bot</p>
        <h6 class="text-white tet-warp text-center" style="width: 17rem; font-family: 'Courier New', Courier, monospace">Konsultasi tentang kesehatan mental anda dengan kami</h6>
    </div>

    <!-------------------- ------ Right Box ---------------------------->

    <div class="col-md-6 right-box">
        <div class="row align-items-center">
        <form action="{{ route('auth.registrasi') }}" class="login100-form validate-form" method="POST">
            @csrf

            <div class="header-text mb-4">
                <h2>Form Registrasi</h2>
                <p>Isi dengan benar sebelum di submit</p>
            </div>

            <div class="input-group mb-3">
                <input type="text" name="fullname" class="form-control form-control-lg bg-light fs-6" id="fullname" placeholder="fullname" required="">
                @error('fullname')
                <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="text" name="alamat" class="form-control form-control-lg bg-light fs-6" id="alamat" placeholder="alamat" required="">
                @error('alamat')
                <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="text" name="email" class="form-control form-control-lg bg-light fs-6" id="email" placeholder="email" required="">
                @error('email')
                <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <input type="number" name="usia" min="0" max="200" class="form-control form-control-lg bg-light fs-6" id="usia" placeholder="usia" required="">
                @error('usia')
                <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-group mb-3">
				<select name="jenis_kelamin" class="form-control">
				<option value="Laki-Laki">Laki-Laki</option>
				<option value="Perempuan">Perempuan</option>
				</select>
                @error('jenis_kelamin')
                <span class="text-red-600">{{ $message }}</span>
                @enderror
			</div>

            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control form-control-lg bg-light fs-6" id="password" placeholder="password" required="">
                @error('password')
                <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="password" name="password_confirmation" class="form-control form-control-lg bg-light fs-6" id="password_confirmation" placeholder="Konfirmasi Password" required="">
                @error('password_confirmation')
                <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <button class="btn btn-lg btn-primary w-100 fs-6 align-item-center" type="submit">Register</button>
            </div>
            <div class="row">
                <small>Account Allready? <a href="{{ route('auth') }}">Sign In</a></small>
            </div>
        </form>
        </div>
    </div>
    </div>
    </section>
</body>
</html>
