<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\TemuDokter;
use Illuminate\Http\Request;

class DashboardDokterController extends Controller
{
    public function index()
    {
        // Ambil semua temu_dokter, lengkap dengan pet dan rekam medis
        $temuDokter = TemuDokter::with(['pet', 'rekamMedis'])->get();

        return view('dokter.dashboard-dokter', compact('temuDokter'));
    }
}