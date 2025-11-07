<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Pet;

class DashboardPemilikController extends Controller
{
    public function index()
    {
        // Ambil id user dari session
        $iduser = session('user_id');

        // Ambil semua hewan milik user (relasi lewat idpemilik → iduser)
        $pets = Pet::whereHas('pemilik', function ($query) use ($iduser) {
            $query->where('iduser', $iduser);
        })->with('jenisHewan', 'rasHewan')->get();

        return view('pemilik.dashboard-pemilik', compact('pets'));
    }
}