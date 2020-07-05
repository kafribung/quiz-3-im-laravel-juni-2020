<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtikelRequest;
use Illuminate\Support\Str;
use App\Models\Artikel;
use Auth;

class ArtikelController extends Controller
{
    // READ
    public function index()
    {
        $user = Auth::user();
        $artikels = Artikel::with('user')->latest()->get();

        return view('dashboard.artikel', compact('artikels', 'user'));
    }

    // ARTIKEL
    public function create()
    {
        $user = Auth::user();

        return view('dashboard_create.artikel_create', compact('user'));
    }

    // STORE
    public function store(ArtikelRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->title);

        $request->user()->artikels()->create($data);

        return redirect('/artikel')->with('msg', 'Data Artikel Berhasil ditambahkan');
    }

    // SHOW
    public function show($id)
    {
        return abort('404');
    }

    // EDIT
    public function edit($slug)
    {
        $user = Auth::user();
        $artikel = Artikel::where('slug', $slug)->first();

        return view('dashboard_edit.artikel_edit', compact('user', 'artikel'));
    }

    // UPDATE
    public function update(ArtikelRequest $request, $id)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->title);

        Artikel::findOrFail($id)->update($data);

        return redirect('/artikel')->with('msg', 'Data Artikel Berhasil diedit');
    }

    // DELETE
    public function destroy($id)
    {
        Artikel::destroy($id);

        return redirect('/artikel')->with('msg', 'Data Artikel Berhasil dihapus');

    }
}
