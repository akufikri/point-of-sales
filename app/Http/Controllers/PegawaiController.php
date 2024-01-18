<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\NotificationService;

class PegawaiController extends Controller
{
    protected $notify;
    public function __construct(NotificationService $notify)
    {
        $this->notify = $notify;
    }
    public function index()
    {
        $data = User::with("role")->get();
        return view("page.pengaturan-sistem.pegawai.index", compact("data"));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email|max:255',
                'password' => 'required|string|min:8', // Sesuaikan panjang minimum sesuai kebutuhan
            ], [
                'name.required' => 'Kolom nama wajib diisi.',
                'email.required' => 'Kolom email wajib diisi.',
                'email.email' => 'Masukkan alamat email yang valid.',
                'email.unique' => 'Alamat email ini sudah digunakan.',
                'password.required' => 'Kolom password wajib diisi.',
                'password.min' => 'Password harus memiliki setidaknya :min karakter.',
            ]);

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role_id = 2;
            $user->password = bcrypt($request->password);
            $user->save();

            $this->notify->success('Sukses membuat pelanggan baru');
        } catch (\Exception $ex) {
            $this->notify->error('Terjadi kesalahan: ' . $ex->getMessage());
        }

        return redirect()->back();
    }
}
