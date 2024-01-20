@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-5 border border-radius mx-auto p-3">

        <main class="form-registraion">
            <h1 class="h3 mt-2 mb-3 fw-normal text-center">Registration Form</h1>
          
            {{-- mengasih action untuk ke route register  dengan method POST--}}
            <form action="/register" method="post">
                {{-- csrf untuk pengaman dan akan mengirimkan token --}}
                @csrf
              {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
          
              <div class="form-floating">
                <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" id="name" placeholder="name" required value="{{ old('name') }}">
                <label for="name">Name</label>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>

              <div class="form-floating">
                <input type="text" name="username" class="form-control @error('username')is-invalid @enderror" id="name" placeholder="username" required value="{{ old('username') }}"> 
                <label for="username">username</label>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>

              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              
              <div class="form-floating">
                <input 
                type="password" 
                name="password" 
                class="form-control @error('password')is-invalid @enderror" 
                id="password" 
                placeholder="Password" 
                required 
                >
                <label for="password">Password</label>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
          
             
              <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3 ">Already registered ? <a href="/login">Login!</a></small>
        </main>
        
    </div>
</div>

@endsection