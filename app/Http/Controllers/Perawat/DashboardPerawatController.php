<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RekamMedis;
use App\Models\TemuDokter;

class DashboardPerawatController extends Controller
{
    public function index()
    {
        // Ambil semua rekam medis dengan data hewan dan temu dokter
        $rekammedis = RekamMedis::with(['temuDokter.pet'])->get();

        return view('perawat.dashboard-perawat', compact('rekammedis'));
    }
}