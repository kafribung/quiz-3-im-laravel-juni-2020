@extends('layouts.master')
@section('title', 'Edit Data Admin Artikelku')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Admin</h6>
      </div>
      <div class="card-body">
        <form action="/admin/{{$admin->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label for="name">Nama</label>
              <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukan nama" value="{{old('name') ? old('name') : $admin->name}}">
              
              @if ($errors->has('name'))
                <p class="alert alert-danger">{{$errors->first('name')}}</p>
              @endif
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Masukkan email" aria-describedby="emailHelp" value="{{old('email') ? old('email') : $admin->email}}">
                <small id="emailHelp" class="form-text text-muted">Dijamin aman kok.</small>

                @error('email')
                    <p class="alert alert-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" name="password" class="form-control @error('passwors') is-invalid @enderror" id="exampleInputPassword1" placeholder="Masukkan Password">
             
              @error('password') 
                <p class="alert alert-danger">{{$message}}</p>
              @enderror
            </div>
           
            <button type="submit" class="btn btn-warning">Edit</button>
          </form>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
    
@endsection
    