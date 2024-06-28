<?php

namespace App\Http\Controllers;

use App\Models\otp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\NamaEmailAnda;


class UserController extends Controller
{
    function create()
    {
        return view('halaman_auth.register');
    }

    function register(Request $request)
    {
        $validation = $request->validate([
            'fullname' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|6',
        ]);

        //generate token
        $randomString = strtoupper(Str::random(6));
        $otp = Otp::create([
            'email' => $validation['email'],
            'otp' => $randomString
        ]);

        //token simpan ke databse
        $tokenModel = new otp();
        $tokenModel->email = $request->email;
        $tokenModel->otp = $otp;
        $tokenModel->save();

        return response()->json(['otp' => $otp], 201);

        //simpan data user ke database
        $user = new User();
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'User berhasil registerasi');
    }

    //kirim token email ke user
    function getotp($email)
    {
        $otp = otp::where('email', $email)->first();

        if ($otp) {
            return response()->json(['otp' => $otp->otp]);
        } else {
            return response()->json(['message' => 'Otp not found'], 404);
        }
    }

    public function kirimEmail()
    {
        $details = [
            'title' => 'Judul Email',
            'body' => 'Ini adalah konten email Anda'
        ];

        Mail::to('alamat_email_penerima@example.com')->send(new NamaEmailAnda($details));

        return 'Email telah terkirim';

        try {
            Mail::to('alamat_email_penerima@example.com')->send(new NamaEmailAnda($details));
            return 'Email telah terkirim';
        } catch (\Exception $e) {
            return 'Gagal mengirim email: ' . $e->getMessage();
        }
    }

    public function index()
    {
        return view('halaman_auth.login');
    }
}
