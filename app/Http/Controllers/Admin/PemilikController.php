<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\User;
use Exception;

class PemilikController extends Controller
{
    public function index()
    {
        $pemilik = Pemilik::with('user')->get();
        return view('admin.pemilik.index', compact('pemilik'));
    }

    public function create()
    {
        $user = User::all();
        return view('admin.pemilik.create', compact('user'));
    }

    public function store(Request $request)
    {
        $validatedData = $this->validatePemilik($request);
        $pemilik = $this->createPemilik($validatedData);

        return redirect()->route('admin.pemilik.index')
                         ->with('success', 'Data pemilik berhasil ditambahkan.');
    }

    protected function validatePemilik(Request $request, $id = null)
    {
        $uniqueNoWA = $id
            ? 'unique:pemilik,no_wa,' . $id . ',idpemilik'
            : 'unique:pemilik,no_wa';

        return $request->validate([
            'iduser' => ['required', 'exists:user,iduser'],
            'no_wa' => ['required', 'string', 'regex:/^[0-9+ ]{10,15}$/', $uniqueNoWA],
            'alamat' => ['required', 'string', 'min:5', 'max:255'],
        ], [
            'iduser.required' => 'User wajib dipilih.',
            'iduser.exists' => 'User tidak valid.',
            'no_wa.required' => 'Nomor WhatsApp wajib diisi.',
            'no_wa.regex' => 'Format nomor WhatsApp tidak valid.',
            'no_wa.unique' => 'Nomor WhatsApp sudah terdaftar.',
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.min' => 'Alamat minimal 5 karakter.',
        ]);
    }

    protected function createPemilik(array $data)
    {
        try {
            return Pemilik::create([
                'iduser' => $data['iduser'],
                'no_wa' => $this->formatNoWA($data['no_wa']),
                'alamat' => trim($data['alamat']),
            ]);
        } catch (Exception $e) {
            throw new \Exception('Gagal menyimpan data pemilik: ' . $e->getMessage());
        }
    }

    protected function formatNoWA($no_wa)
    {
        $no_wa = preg_replace('/[^0-9]/', '', $no_wa);
        if (substr($no_wa, 0, 1) === '0') {
            $no_wa = '62' . substr($no_wa, 1);
        }
        return '+' . $no_wa;
    }
}