@extends('layouts.master')
@section('title', 'Data artikel Artikelku')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  @if (session('msg'))
      <p class="alert alert-info">{{session('msg')}}</p>
  @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data artikel</h6>
        <a href="/artikel/create" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i></a>

      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Tag</th>
                <th>Action</th>
              </tr>
            </thead>

            @php
                $angkaAwal = 1
            @endphp
            <tbody>
              @foreach ($artikels as $artikel)
              <tr>
                    <td>{{$angkaAwal}}</td>
                    <td>{{$artikel->title}}</td>
                    <td>{!! Str::limit($artikel->description, 80, '...')  !!}</td>
                    <td>{{$artikel->tag}}</td>
                    <td>
                        <a href="/artikel/{{$artikel->slug}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                        
                        <form action="/artikel/{{$artikel->id}}" method="POST" class="d-inline-flex">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Data {{$artikel->name}} dihapus permanen ?')"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
              </tr>
              @php
              $angkaAwal++
              @endphp
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
    
@endsection
    