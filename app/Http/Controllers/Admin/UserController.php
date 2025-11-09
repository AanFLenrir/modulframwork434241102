<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        // Menampilkan form tambah user
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $this->validateUser($request);

        // Simpan data
        $user = $this->createUser($validatedData);

        return redirect()->route('admin.user.index')
                         ->with('success', 'User berhasil ditambahkan.');
    }

    protected function validateUser(Request $request, $id = null)
    {
        $uniqueEmailRule = $id
            ? 'unique:user,email,' . $id . ',iduser'
            : 'unique:user,email';

        return $request->validate([
            'nama' => 'required|string|min:3|max:255',
            'email' => ['required', 'email', $uniqueEmailRule],
            'password' => $id ? 'nullable|min:6' : 'required|min:6',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.min' => 'Nama minimal 3 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
        ]);
    }

    protected function createUser(array $data)
    {
        try {
            return User::create([
                'nama' => $this->formatNama($data['nama']),
                'email' => strtolower($data['email']),
                'password' => bcrypt($data['password']),
            ]);
        } catch (Exception $e) {
            throw new \Exception('Gagal menyimpan data user: ' . $e->getMessage());
        }
    }

    protected function formatNama($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }
}