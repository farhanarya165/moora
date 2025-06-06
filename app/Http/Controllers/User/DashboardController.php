<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\HasilPerhitungan;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display user dashboard.
     */
    public function index()
    {
        // Count data for dashboard
        $totalAlternatifs = Alternatif::count();
        $totalKriterias = Kriteria::count();
        $userPerhitungans = HasilPerhitungan::where('user_id', Auth::id())->count();
        
        // Latest results
        $latestPerhitungans = HasilPerhitungan::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        // Get top 3 alternatifs from the latest calculation
        $topAlternatifs = collect();
        $latestCalculation = HasilPerhitungan::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->first();
            
        if ($latestCalculation) {
            $topAlternatifs = collect($latestCalculation->hasil_perangkingan)
                ->take(3);
        }
        
        return view('user.dashboard', compact(
            'totalAlternatifs',
            'totalKriterias',
            'userPerhitungans',
            'latestPerhitungans',
            'topAlternatifs'
        ));
    }
}