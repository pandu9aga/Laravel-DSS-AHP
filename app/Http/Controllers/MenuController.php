<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kategori;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index()
    {
        $judul = 'Main Menu';
        $subKriteria = SubKriteria::with(['kriteria', 'kategori'])
                    ->orderBy('kriteria_id')
                    ->orderBy('kategori_id')
                    ->get();
        $alternatif = Alternatif::all();
        return view('menu.layouts.main', compact('judul','subKriteria','alternatif'));
    }

    public function profile(Request $request)
    {
        $judul = 'Profile';
        return view('dashboard.profile', [
            'judul' => $judul,
            'user' => auth()->user(),
        ]);
    }
}
