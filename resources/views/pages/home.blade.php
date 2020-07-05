@extends('layouts.app')
@section('title', 'Blog Artikel')
@section('content')
<div class="container">
    <div class="row justify-content-center">


        @forelse ($artikels as $artikel)
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">{{$artikel->title}}</h5>
                  <div class="card-text">
                    {!! Str::limit($artikel->description, 200, '...')  !!}
                  </div>
                  <a href="/home/{{$artikel->slug}}">Selengkpanya..</a>
                
                </div>

                <div class="card-footer">
                    <p><b>Ditulis oleh : {{$artikel->user->name}}</b></p>
                    <p><i>Tgl : {{$artikel->created_at->format('d-m-Y')}}</i></p>
                </div>
            </div>
        </div>
        
        @empty
            <h1>Silahkan login dan tambah data didashboard</h1>
        @endforelse
            
        
    </div>
</div>
@endsection
