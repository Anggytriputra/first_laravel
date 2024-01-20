@extends('layouts.main')
    
@section('container')

<script src="https://unpkg.com/feather-icons"></script>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1>List Product</h1>
</div>

@if (session()->has('success'))
    <div class="alert alert-success" role="alert" id="success-alert">
        {{ session('success') }}
    </div>
    <script>
        // Menutup alert setelah 2 detik
        setTimeout(function() {
            document.getElementById('success-alert').style.display = 'none';
        }, 2000);
    </script>
@endif


<div class="d-flex justify-content-end mb-3">
  <a href="dashboard/create" class="btn btn-primary">Add Product</a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Product Name</th>
          <th scope="col">Price</th>
          <th scope="col">Sale Price</th>
          <th scope="col">Stock</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($products as $product)           
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>
            <img src="{{ asset('storage/' . $product->image_url) }}" alt="" style="height: 40px; width: 40px;">
            {{ $product->nama }}
        </td>
          <td>{{ number_format($product->harga_beli, 0, ',', '.') }}</td>
                <td>{{ number_format($product->harga_jual, 0, ',', '.') }}</td>
          <td>{{ $product->stock }}</td>
          <td>
            {{-- <a href="/dashboard/{{ $product->id }}" class="badge bg-info">
                <span data-feather="eye"></span>
            </a> --}}

            <a href="/dashboard/{{ $product->id }}/edit" class="badge bg-warning">
              <span data-feather="edit"></span>
            </a>

            <form action="/dashboard/{{ $product->id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"> 
                <span data-feather="x-circle"></span>
              </button>
            </form>

            
           
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace();

    
</script>

@endsection