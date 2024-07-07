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
        ], [
            'email.required' => 'email wajib diisi',
            'password.required' => 'password wajib diisi',
        ]);

        /* $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ]; */

        $user = User::where('email', $request->email)->first();
        // dd($user->toArray());
        /* $credentials = $request->only('email', 'password'); */

        if ($user){
            if (Hash::check($request->password, $user->password)) {
            if ($user->email_verified_at != null) {
                Auth::login($user);
                if ($user->role === 'admin') {
                    return redirect()->route('dashboard')->with('success', 'Halo Admin, Anda Berhasil Login');
                } elseif ($user->role === 'client') {
                    return redirect()->route('dashboard.client')->with('success', 'Halo Client, Anda Berhasil Login');
                } else {
                    Auth::logout();
                    return redirect()->route('auth')->withErrors(['Akun Anda belum aktif. Harap verifikasi terlebih dahulu']);
                }
            } else {
                return redirect()->route('auth')->withErrors(['Email belum diverifikasi. Silakan cek email untuk verifikasi']);
            }
        } else {
            return redirect()->route('auth')->withErrors(['Email atau password salah']);
        }
        }
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
            'alamat' => 'required|string|max:255',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6|confirmed',
            'usia' => 'required|integer',
            'jenis_kelamin' => 'required|string',
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
            'role' => 'client',
            'datetime' => date('Y-m-d H:i:s'),
            'website' => 'Mentalbot',
            'url' => 'http://' . request()->getHttpHost() . "/" . "verify/" . $inforegister['verify_key'],
        ];

        Mail::to($inforegister['email'])->send(new AuthMail($details));

        return redirect()->route('auth')->with('success', 'Link verifikasi telah dikirim ke email anda. Cek email untuk melakukan verifikasi');
    }
    function verify($verify_key)
    {
        $keyCheck = User::select('verify_key')
            ->where('verify_key', $verify_key)
            ->exists();


        if ($keyCheck) {
            $user = user::where('verify_key', $verify_key)->update(['email_verified_at' => date('Y-m-d H:i:s')]);
            return redirect()->route('auth')->with('success', 'verifikasi berhasil. akun anda sudah aktif.');
        } else {
            return redirect()->route('auth')->withErrors('Keys tidak valid. Pastikan telah melakukan register')->withInput();
        }
    }
}
