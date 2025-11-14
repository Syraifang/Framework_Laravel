<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Menampilkan form login kustom kita.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Menangani permintaan login (Override).
     */
    public function login(Request $request)
    {
        // 1. Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // 2. Cari user beserta role aktifnya
        $user = User::with(['roleUser' => function($query) {
            $query->where('status', 1); // Hanya ambil role yang statusnya 1
        }, 'roleUser.role'])
            ->where('email', $request->input('email'))
            ->first();

        // 3. Jika user tidak ada
        if (!$user) {
            return redirect()->back()
                ->withErrors(['email' => 'Email tidak ditemukan.'])
                ->withInput();
        }

        // 4. Cek password
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()
                ->withErrors(['password' => 'Password salah.'])
                ->withInput();
        }

        // 5. Cek jika user punya role aktif
        if ($user->roleUser->isEmpty()) {
             return redirect()->back()
                ->withErrors(['email' => 'Akun ini tidak memiliki role aktif.'])
                ->withInput();
        }

        // 6. Dapatkan data role
        $activeRoleUser = $user->roleUser[0];
        $namaRole = $activeRoleUser->role->nama_role ?? 'User';

        // 7. Login user ke session Laravel
        Auth::login($user);

        // 8. Simpan data kustom kita ke session
        $request->session()->put([
            'user_id' => $user->iduser,
            'user_name' => $user->nama,
            'user_email' => $user->email,
            'user_role' => $activeRoleUser->idrole ?? 'user',
            'user_role_name' => $namaRole,
            'user_status' => $activeRoleUser->status ?? 'active'
        ]);

        // 9. Arahkan berdasarkan role
        $userRole = $activeRoleUser->idrole ?? null;
        switch ($userRole) {
            case 1: // Administrator
                // --- INI ADALAH BARIS YANG DIPERBAIKI ---
                return redirect()->route('home')->with('success', 'Login berhasil!');
            case 4: // Resepsionis
                return redirect()->route('site.home')->with('success', 'Login berhasil!'); // Mengarah ke Beranda
            // Tambahkan case untuk role lain (Dokter, Perawat, Pemilik) di sini
            default:
                return redirect()->route('home')->with('success', 'Login berhasil!');
        }
    }

    /**
     * Menangani proses logout (Override).
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Logout berhasil!');
    }
}