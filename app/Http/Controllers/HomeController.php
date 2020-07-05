<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Artikel;

class HomeController extends Controller
{
    
    // READ
    public function index()
    {
        $artikels = Artikel::with('user')->latest()->get();

        return view('pages.home', compact('artikels'));
    }

    public function show($slug)
    {
        $artikel = Artikel::where('slug', $slug)->first();

        return view('pages.home_single', compact('artikel'));
    }
}
