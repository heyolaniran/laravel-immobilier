<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.bootstrap4.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
<link rel="stylesheet" href="assets/css/style.css">
<title>@yield('title')</title>
</head>
<body>

@php 

$route = url()->current() ; 

@endphp
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li @class(['nav-item' ,  'active' === str_contains($route, 'properties')])>
        <a class="nav-link" href="{{ route('admin.properties.index') }}">Propriétés <span class="sr-only">(current)</span></a>
      </li>
      <li @class(['nav-item' ,  'active' === str_contains($route, 'options')])>
        <a class="nav-link" href="{{ route('admin.options.index') }}">Options</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container  ">

    @include('components.flash')

    @yield('content')
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

<script>
   new TomSelect('select[multiple]' , {plugins : {remove_button : {title :  'Supprimer '}}})
</script>
</body>
</html>