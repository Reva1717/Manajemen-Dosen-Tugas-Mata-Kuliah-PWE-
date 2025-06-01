<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalDosen = \App\Models\Dosen::count();
        $totalProdi = \App\Models\Dosen::distinct('prodi')->count('prodi');
        return view('home', compact('totalDosen', 'totalProdi'));
    }
}
