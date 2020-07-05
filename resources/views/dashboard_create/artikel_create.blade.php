@extends('layouts.master')
@section('title', 'Tambah Data Artikel Artikelku')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Artikel</h6>
      </div>
      <div class="card-body">
        <form action="/artikel" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <label for="title">Judul</label>
              <input type="title" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Masukan Judul" value="{{old('title')}}">
              
              @if ($errors->has('title'))
                <p class="alert alert-danger">{{$errors->first('title')}}</p>
              @endif
            </div>

            <div class="form-group">
              <label for="tag">Tag</label>
              <select name="tag" id="tag" class="form-control @error('tag') is-invalid @enderror" id="description">
                  <option value="" selected disabled>~Pilih Tag~</option>
                  <option value="Cinta">Cinta</option>
                  <option value="Agama">Agama</option>
                  <option value="Budaya">Budaya</option>
                  <option value="Ekonomi">Ekonomi</option>
                  <option value="Sosial">Sosial</option>
              </select>
             
              @error('tag') 
                <p class="alert alert-danger">{{$message}}</p>
              @enderror
            </div>

            <div class="form-group">
                <label for="description">Deskrpsi</label>

                <textarea name="description" class="form-control ckeditor @error('description') is-invalid @enderror" id="description" placeholder="Masukan Deskripsi">{{old('description')}}</textarea>
                
                @error('description') 
                    <p class="alert alert-danger">{{$message}}</p>
                @enderror
              </div>
           
            <button type="submit" class="btn btn-primary">Tambah</button>
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
    