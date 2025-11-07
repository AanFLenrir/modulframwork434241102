<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardResepsionisController extends Controller
{
    public function index()
    {
        // arahkan ke tampilan dashboard resepsionis
        return view('resepsionis.dashboard-resepsionis');
    }
}