<x-layout>

{{-- @vite(['resources/css/app.css']) --}}
<form class="container mt-5" style="max-width: 500px;" method="POST" 
{{-- action="{{ route('login') }}" --}}
action="{{ url('/login') }}"
>
<h1 class="text-center fs-2">LOGIN FORM</h1>
    @csrf
 
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('email') }}">
    @error('email')
        <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" value="{{ old('password') }}">
    @error('password')
    <div class="text-danger">{{ $message }}</div>
@enderror
    
  </div>

<div class="d-flex justify-content-between">
  <button type="submit" class="btn btn-primary">Login</button>
  <a href="{{route('register')}}">Register</a>
</div>

@error('custom_error')
    <div class="text-danger text-center">{{ $message }}</div>
@enderror
</form>
</x-layout>
