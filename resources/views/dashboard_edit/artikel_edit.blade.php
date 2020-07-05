@extends('layouts.master')
@section('title', 'Edit Data Artikel Artikelku')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Artikel</h6>
      </div>
      <div class="card-body">
        <form action="/artikel/{{$artikel->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label for="title">Judul</label>
              <input type="title" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Masukan Judul" value="{{old('title') ? old('title') : $artikel->title}}">
              
              @if ($errors->has('title'))
                <p class="alert alert-danger">{{$errors->first('title')}}</p>
              @endif
            </div>

            <div class="form-group">
              <label for="tag">Tag</label>
              <select name="tag" id="tag" class="form-control @error('tag') is-invalid @enderror" id="description">
                  <option value="" selected disabled>~Pilih Tag~</option>
                  <option {{$artikel->tag == 'Cinta' ? 'selected' : ''}} value="Cinta">Cinta</option>
                  <option {{$artikel->tag == 'Agama' ? 'selected' : ''}} value="Agama">Agama</option>
                  <option {{$artikel->tag == 'Budaya' ? 'selected' : ''}} value="Budaya">Budaya</option>
                  <option {{$artikel->tag == 'Ekonomi' ? 'selected' : ''}} value="Ekonomi">Ekonomi</option>
                  <option {{$artikel->tag == 'Sosial' ? 'selected' : ''}} value="Sosial">Sosial</option>
              </select>
             
              @error('tag') 
                <p class="alert alert-danger">{{$message}}</p>
              @enderror
            </div>

            <div class="form-group">
                <label for="description">Deskrpsi</label>

                <textarea name="description" class="form-control ckeditor @error('description') is-invalid @enderror" id="description" placeholder="Masukan Deskripsi">{{old('description') ? old('description') : $artikel->description}}</textarea>
                
                @error('description') 
                    <p class="alert alert-danger">{{$message}}</p>
                @enderror
              </div>
           
            <button type="submit" class="btn btn-warning">Edit</button>
          </form>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->

  @push('after-script')
  <script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>
  <script>
    ClassicEditor
            .create( document.querySelector( '.ckeditor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>
  @endpush
@endsection
    