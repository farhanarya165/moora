<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\HasilPerhitungan;
use App\Models\Kriteria;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display admin dashboard.
     */
    public function index()
    {
        // Count data for dashboard
        $totalUsers = User::count();
        $totalAlternatifs = Alternatif::count();
        $totalKriterias = Kriteria::count();
        $totalPerhitungans = HasilPerhitungan::count();
        
        // Latest results
        $latestPerhitungans = HasilPerhitungan::with('user')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        return view('admin.dashboard', compact(
            'totalUsers',
            'totalAlternatifs',
            'totalKriterias',
            'totalPerhitungans',
            'latestPerhitungans'
        ));
    }
}