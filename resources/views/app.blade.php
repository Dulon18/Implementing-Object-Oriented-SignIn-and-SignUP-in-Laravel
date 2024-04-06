<!DOCTYPE html>
<html lang="en">
<head>
  <title>OOP Sign Up& Sign In</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

 <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="javascript:void(0)">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a href="{{ route('home') }}" class="nav-link">Home</a>
        </li>
      </ul>
        @if (!Auth::user())
          <a href="{{ route('shaw.login.form') }}" class="btn btn-primary" type="button">Sign In</a>
        @else
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-primary" type="submit">Logout</button>
          </form>
       @endif
    </div>
  </div>
</nav>

<div class="container mt-3">
  {{-- <div><h2> Sign UP & Sign In using Laravel OOP Concept</h2></div> --}}
  @yield('content')
</div>
</body>
</html>
