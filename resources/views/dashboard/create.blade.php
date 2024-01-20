@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Create New Product</h1>
</div>

<form method="post" action="/dashboard" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 grid grid-cols-1">
      <label for="nama" class="form-label">Product Name</label>
      <input type="text" class="form-control @error('nama') is-invalid @enderror" 
      id="nama" name="nama" value="{{ old('nama') }}">

        @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>
    
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="harga_beli" class="form-label ">Price</label>
            <input type="number" class="form-control  @error('harga_beli') is-invalid @enderror" id="harga_beli" name="harga_beli"
            value="{{ old('harga_beli') }}">
           
            @error('harga_beli')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror

        </div>

        <div class="col-md-4 mb-3">
            <label for="harga_jual" class="form-label">Sale Price</label>
            <input type="number" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual" name="harga_jual"
            value="{{ old('harga_jual') }}">

            @error('harga_jual')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock"
            value="{{ old('stock') }}">
            
            @error('stock')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="inputImage" class="form-label">Image</label>
        <img class="img-preview img-fluid mb-3 col-sm-5">
        <input type="file" class="form-control @error('inputImage') is-invalid @enderror" id="inputImage" name="inputImage"
        onchange="previewImage()">
        
            @error('inputImage')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
            @enderror

        <div id="imageHelp" class="form-text">
            Image must be in jpg or png format and max 100 KB.</div>    
    </div>


    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary ">Submit</button>
    </div>

  </form>

  <script>
    function previewImage() {
        const image = document.querySelector('#inputImage');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const reader = new FileReader();
        reader.readAsDataURL(image.files[0]);

        reader.onload = function (e) {
            imgPreview.src = e.target.result;
        }
    }
</script>


@endsection