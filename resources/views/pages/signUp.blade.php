@extends('app')
@section('content')
          @if ($errors->any())
          <div class="alert alert-danger">
               <ul>
                    @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                    @endforeach
               </ul>
          </div>
          @endif
    <div class="d-flex justify-content-center">
        <div class="card w-25">
          <div class="card-header bg-primary"><h3 class="text-center text-light">Sign Up</h3></div>
            <div class="card-body">
                <form action="{{ route('store.signUp.data') }}" method="POST">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter Password"
                            name="password">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>
                <div class="text-center my-2">
                    <a href="{{ route('shaw.login.form') }}">Already Have Account ? Sign In Here!</a>
               </div>
            </div>
        </div>
    </div>
@endsection
