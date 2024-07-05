@extends('layouts.auth.auth')

@section('title', 'Register')

@section('content')
    <form method="POST" action="/user/register/store">
        @csrf

        <h1 class="h3 mb-3 fw-normal">Register</h1>
        <div class="form-floating">
            <input type="text" class="form-control mb-3" name='name' placeholder="Nama">
            <label for="floatingInput">Name</label>
        </div>
        <div class="form-floating">
            <input type="email" class="form-control mb-3" name='email' placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control mb-3" name='password' placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
    </form>
@endsection
