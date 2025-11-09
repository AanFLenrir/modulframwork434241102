<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\Role;
use Exception;

class RoleUserController extends Controller
{
    public function index()
    {
        $roleUsers = RoleUser::with(['user', 'role'])->get();
        return view('admin.role-user.index', compact('roleUsers'));
    }

    public function create()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.role-user.create', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateRoleUser($request);
        $roleUser = $this->createRoleUser($validated);

        return redirect()->route('admin.role-user.index')
                         ->with('success', 'Role user berhasil ditambahkan.');
    }

    protected function validateRoleUser(Request $request)
    {
        return $request->validate([
            'iduser' => 'required|exists:user,iduser',
            'idrole' => 'required|exists:role,idrole',
            'status' => 'nullable|in:0,1',
        ], [
            'iduser.required' => 'User wajib dipilih.',
            'iduser.exists'   => 'User tidak valid.',
            'idrole.required' => 'Role wajib dipilih.',
            'idrole.exists'   => 'Role tidak valid.',
        ]);
    }

    protected function createRoleUser(array $data)
    {
        try {
            // Cek duplikasi
            $exists = RoleUser::where('iduser', $data['iduser'])
                ->where('idrole', $data['idrole'])
                ->first();

            if ($exists) {
                throw new Exception('Role tersebut sudah terdaftar untuk user ini.');
            }

            $roleUser = RoleUser::create([
                'iduser' => $data['iduser'],
                'idrole' => $data['idrole'],
                'status' => $data['status'],
            ]);

            // Jika role yang dipilih adalah pemilik (misal idrole = 2)
            if ($data['idrole'] == 2) {  // ganti 2 dengan ID role pemilik
                \App\Models\Pemilik::create([
                    'iduser' => $data['iduser'],
                    'nama_pemilik' => $data['nama_pemilik'] ?? 'Default Nama',
                    'no_wa' => $data['no_wa'] ?? '-',
                    'alamat' => $data['alamat'] ?? '-',
                ]);
            }

            return $roleUser;

        } catch (Exception $e) {
            throw new Exception('Gagal menyimpan data role user: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $roleUser = RoleUser::findOrFail($id);
            $roleUser->delete();

            return redirect()->route('admin.role-user.index')
                             ->with('success', 'Data role user berhasil dihapus.');
        } catch (Exception $e) {
            return redirect()->route('admin.role-user.index')
                             ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

        protected function formatNamaRole($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }
}