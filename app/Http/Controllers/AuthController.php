<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\AuthMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use MongoDB\Client as Mongo;
use Illuminate\Support\Facades\Log;

use function PHPSTORM_META\type;

class AuthController extends Controller
{
    protected $db;
    public function __construct()
    {
        $this->db = (new Mongo)->{env('DB_DATABASE')};
    }
    function index()
    {
        return view('halaman_auth/login');
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Cek peran pengguna dan arahkan sesuai dengan peran
            if ($user->role == 'admin') {
                return redirect()->route('dashboard')
                    ->with('success', 'Anda berhasil login sebagai admin');
            } elseif ($user->role == 'client') {
                return redirect()->route('dashboard.client')
                    ->with('success', 'Anda berhasil login sebagai client');
            }

            return redirect()->route('auth')
                ->withErrors('Email atau password salah')
                ->withInput($request->except('password'));
        }

        return redirect()->route('auth')
            ->withErrors('Email atau password salah')
            ->withInput($request->except('password'));
    }

    function create()
    {
        return view('halaman_auth/register');
    }

    function registrasi(Request $request)
    {
        $str = Str::random(100);
        $request->validate([
            'fullname' => 'required|min:3',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6',
        ], [
            'fullname.required' => 'fullname wajib diisi',
            'fullname.min' => 'Fullname minimal 3 karakter',
            'email.required' => 'email wajib diisi',
            'email.unique' => 'email sudah terdaftar',
            'password.required' => 'password wajib diisi',
        ]);

        $inforegister = [
            'fullname' => $request->fullname,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'usia' => $request->usia,
            'jenis_kelamin' => $request->jenis_kelamin,
            'password' => Hash::make($request->password),
            'role' => 'client',
            'verify_key' => $str,
        ];

        User::create($inforegister);

        $details = [
            'nama' => $inforegister['fullname'],
            'role' => 'user',
            'datetime' => date('Y-m-d H:i:s'),
            'website' => 'Mentalbot',
            'url' => route('verify', ['verify_key' => $str]),
        ];

        Mail::to($inforegister['email'])->send(new AuthMail($details));

        return redirect()->route('auth')->with('success', 'Link verifikasi telah dikirim ke email anda. Cek email untuk melakukan verifikasi');
    }
    function verify($verify_key)
    {
        $user = User::where('verify_key', $verify_key)->first();

        if ($user) {

            $user->email_verified_at = now();
            $user->verify_key = $verify_key; // Optional: Set null to prevent reuse
            $user->save();

            return redirect()->route('auth')->with('success', 'Verifikasi berhasil');
        } else {
            return redirect()->route('auth')->withErrors('Keys tidak valid. Pastikan telah melakukan register')->withInput();
        }
    }
}
