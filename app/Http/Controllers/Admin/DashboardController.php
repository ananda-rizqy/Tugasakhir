<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung statistik untuk dashboard
        $totalMahasiswa = User::where('role', 'mahasiswa')->count();
        $totalDosen = User::where('role', 'dosen')->count();
        $totalStaff = User::where('role', 'staff')->count();
        
        return view('admin.dashboard', compact(
            'totalMahasiswa',
            'totalDosen',
            'totalStaff'
        ));
    }
}