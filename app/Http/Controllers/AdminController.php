<?php

namespace App\Http\Controllers;

// Impoer Class AdminRequest
use App\Http\Requests\AdminRequest;

// Import DB Hash
use Illuminate\Support\Facades\Hash;

// Import Class yg login
use Auth;

// Import Model User
use App\Models\User;

class AdminController extends Controller
{
    // READ
    public function index()
    {
        $user  = Auth::user();
        $admins = User::latest()->get();

        return view('dashboard.admin', compact('user', 'admins'));
    }

    // CREATE
    public function create()
    {
        $user  = Auth::user();

        return view('dashboard_create.admin_create', compact('user'));
    }

    // STORE
    public function store(AdminRequest $request)
    {
        $data = $request->all();

        $data['password'] = Hash::make($request->passwrod);

        User::create($data);

        return redirect('/admin')->with('msg', 'Data admin berhasil ditambahkan');
    }

    // SHOW
    public function show($id)
    {
        return abort('404');
    }

    // EDIT
    public function edit($id)
    {
        $user  = Auth::user();
        $admin = User::findOrFail($id);

        return view('dashboard_edit.admin_edit', compact('user', 'admin'));
    }

    // UPDATE
    public function update(AdminRequest $request, $id)
    {
        $data = $request->all();

        $data['password'] = Hash::make($request->passwrod);

        User::findOrFail($id)->update($data);

        return redirect('/admin')->with('msg', 'Data admin berhasil diedit');
    }

    // DELETE
    public function destroy($id)
    {
        if(User::count() >=1 ){
            return redirect('/admin')->with('msg', 'Data admin tidak boleh kosong');
        }

        User::destroy($id);

        return redirect('/admin')->with('msg', 'Data admin berhasil diedit');

    }
}
