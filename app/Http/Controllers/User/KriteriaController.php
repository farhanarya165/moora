<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriterias = Kriteria::with('subKriterias')->get();
        return view('user.kriteria.index', compact('kriterias'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Kriteria $kriteria)
    {
        $kriteria->load('subKriterias');
        return view('user.kriteria.show', compact('kriteria'));
    }
}