@extends('layouts.app')
@section('title', 'Blog Singel Artikel')
@section('content')
<div class="container">
    <div class="row justify-content-center">


        <div class="col-md-12">
            <a href="/">Kemali ke home</a>

            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">{{$artikel->title}}</h5>
                  <div class="card-text">
                    {!! Str::limit($artikel->description, 200, '...')  !!}
                    <p class="btn btn-success btn-sm">Tag : {{$artikel->tag}}</p>
                  </div>
                
                </div>

                <div class="card-footer">
                    <p><b>Ditulis oleh : {{$artikel->user->name}}</b></p>
                    <p><i>Tgl : {{$artikel->created_at->format('d-m-Y')}}</i></p>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
