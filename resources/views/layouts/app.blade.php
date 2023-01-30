<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name')}} : @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">
</head>

 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand p-2" href="{{ route('blog.index')}}">BLOG</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
    <a href="{{ route('blog.index')}}" class="nav-item nav-link active">Accueil</a>
        <a href="{{ route('user.create')}}" class="nav-item nav-link">Registration</a>
    </div>
  </div>
</nav>

<body>
    @yield('content')
    
</body>
<script src="{{ asset('js/bootstrap.min.js')}}"></script>
</html>


