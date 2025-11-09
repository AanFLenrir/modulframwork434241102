<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RasHewan;
use App\Models\JenisHewan;
use Exception;

class RasHewanController extends Controller
{
    public function index()
    {
        $rasHewan = RasHewan::with('jenisHewan')->get();
        return view('admin.ras-hewan.index', compact('rasHewan'));
    }

    public function create()
    {
        $jenisHewan = JenisHewan::all(); // untuk dropdown
        return view('admin.ras-hewan.create', compact('jenisHewan'));
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateRasHewan($request);
        $rasHewan = $this->createRasHewan($validatedData);

        return redirect()->route('admin.ras-hewan.index')
                         ->with('success', 'Ras hewan berhasil ditambahkan.');
    }

    protected function validateRasHewan(Request $request, $id = null)
    {
        $uniqueRule = $id
            ? 'unique:ras_hewan,nama_ras,' . $id . ',idras_hewan'
            : 'unique:ras_hewan,nama_ras';

        return $request->validate([
            'idjenis_hewan' => ['required', 'exists:jenis_hewan,idjenis_hewan'],
            'nama_ras_hewan' => ['required', 'string', 'min:3', 'max:255', $uniqueRule],
        ], [
            'idjenis_hewan.required' => 'Jenis hewan wajib dipilih.',
            'idjenis_hewan.exists' => 'Jenis hewan tidak valid.',
            'nama_ras.required' => 'Nama ras hewan wajib diisi.',
            'nama_ras.string' => 'Nama ras harus berupa teks.',
            'nama_ras.min' => 'Nama ras minimal 3 karakter.',
            'nama_ras.max' => 'Nama ras maksimal 255 karakter.',
            'nama_ras.unique' => 'Nama ras hewan sudah ada.',
        ]);
    }

    protected function createRasHewan(array $data)
    {
        try {
            return RasHewan::create([
                'idjenis_hewan' => $data['idjenis_hewan'],
                'nama_ras_hewan' => $this->formatNamaRasHewan($data['nama_ras_hewan']),
            ]);
        } catch (Exception $e) {
            throw new \Exception('Gagal menyimpan data ras hewan: ' . $e->getMessage());
        }
    }

    protected function formatNamaRasHewan($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }
}