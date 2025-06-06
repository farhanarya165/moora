<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();
        
        return view('user.alternatif.index', compact('alternatifs', 'kriterias'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Alternatif $alternatif)
    {
        $kriterias = Kriteria::all();
        return view('user.alternatif.show', compact('alternatif', 'kriterias'));
    }
}