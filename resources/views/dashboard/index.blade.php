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

<div class="d-flex mb-3">
  <form action="/dashboard" class="d-flex col-md-6">
    <input class="form-control form-control-dark" type="text" name="search" placeholder="Search product name..." value="{{ request('search') }}"  style="width: 100%;">
    <button class="btn btn-success" type="submit">Search</button>
  </form>
  
  <div class="ms-auto">
    <a href="dashboard/create" class="btn btn-primary ms-2">Add Product</a> 
  </div>
</div>

<div class="d-flex justify-content-end mb-3 mt-4">
</div>

@if(count($products) > 0)
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

    {{ $products->links() }}

    <script src="https://unpkg.com/feather-icons"></script>

@else
    <p class="text-center fs-4">Sorry, product name not found!!</p>
@endif

<script>
    feather.replace();
</script>

@endsection
