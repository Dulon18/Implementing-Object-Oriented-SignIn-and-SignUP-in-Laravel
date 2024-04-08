@extends('app')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card w-25">
            <div class="card-header bg-primary">
                <h3 class="text-center text-light">Sign In</h3>
            </div>
            @if (session('error'))
                <div class="mx-3 mt-1 text-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('signIn') }}" method="POST">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password"
                            name="password">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>
                <div class="text-center">
                    <a href="{{ route('signup.form') }}">Create New Account</a>
                </div>
            </div>
        </div>
    </div>
@endsection
