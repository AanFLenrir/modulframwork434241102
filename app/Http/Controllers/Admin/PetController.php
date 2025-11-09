<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Pemilik;
use App\Models\RasHewan;
use Exception;

class PetController extends Controller
{
    public function index()
    {
        $pet = Pet::with(['pemilik.user', 'rasHewan'])->get();
        return view('admin.pet.index', compact('pet'));
    }

    public function create()
    {
        $pemilik = Pemilik::with('user')->get();
        $rasHewan = RasHewan::all();

        return view('admin.pet.create', compact('pemilik', 'rasHewan'));
    }

    public function store(Request $request)
    {
        $validatedData = $this->validatePet($request);
        $pet = $this->createPet($validatedData);

        return redirect()->route('admin.pet.index')
                         ->with('success', 'Data hewan berhasil ditambahkan.');
    }

    protected function validatePet(Request $request, $id = null)
    {
        return $request->validate([
            'nama' => ['required', 'string', 'min:3', 'max:100'],
            'tanggal_lahir' => ['nullable', 'date'],
            'warna_tanda' => ['nullable', 'string', 'max:100'],
            'jenis_kelamin' => ['required', 'in:Jantan,Betina'],
            'idpemilik' => ['required', 'exists:pemilik,idpemilik'],
            'idras_hewan' => ['required', 'exists:ras_hewan,idras_hewan'],
        ], [
            'nama.required' => 'Nama hewan wajib diisi.',
            'nama.min' => 'Nama minimal 3 karakter.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'jenis_kelamin.in' => 'Jenis kelamin harus Jantan atau Betina.',
            'idpemilik.required' => 'Pemilik wajib dipilih.',
            'idras_hewan.required' => 'Ras hewan wajib dipilih.',
        ]);
    }

    protected function createPet(array $data)
    {
        try {
            return Pet::create([
                'nama' => $this->formatNamaPet($data['nama']),
                'tanggal_lahir' => $data['tanggal_lahir'] ?? null,
                'warna_tanda' => $data['warna_tanda'] ?? null,
                'jenis_kelamin' => $data['jenis_kelamin'],
                'idpemilik' => $data['idpemilik'],
                'idras_hewan' => $data['idras_hewan'],
            ]);
        } catch (Exception $e) {
            throw new \Exception('Gagal menyimpan data hewan: ' . $e->getMessage());
        }
    }

    protected function formatNamaPet($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }
}