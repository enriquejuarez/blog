<!DOCTYPE html>
<html>
<head>
   <title>Home</title>
   <meta charset="utf-8">
   <link rel="stylesheet" href="/css/app.css">
</head>
<body>
   <header>
      <?php 
         function activeMenu($url)
         {
            return request()->is($url) ? 'active' : '';
         }
      ?>
      <!-- <h1>{{ request()->is('/') ? 'Estas en el home' : 'No estas en el home' }}</h1> -->






   <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
         <a class="navbar-brand" href="#">Navbar</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item {{ activeMenu('/') }}">
                  <a class=" nav-link" href="{{ route('home') }}">Inicio<span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item {{ activeMenu('saludos/*') }}">
                  <a class="nav-link" href="{{ route('saludos', 'carlos') }}">Saludos<span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item {{ activeMenu('mensajes/create') }}">
                  <a class="nav-link" href="{{ route('mensajes.create') }}">Contactos<span class="sr-only">(current)</span></a>
               </li>
               <!-- <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Dropdown
               </a> -->
               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
               </div>
               </li>
               @if (auth()->check())
                  <li class="nav-item">
                     <a class="{{ activeMenu('mensajes*') }} nav-link" href="{{ route('mensajes.index') }}">Mensajes</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/logout">Cerrar sesión de {{ auth()->user()->name }}</a>
                  </li>
               @else (auth()->guest())
                  <li class="nav-item">
                     <a class="{{ activeMenu('login') }} nav-link" href="/login">Login</a>
                  </li>
               @endif
            </ul>
         </div>
      </div>
   </nav>
   </header>
   <div class="container">
      @yield('contenido')
      <footer>Copyright {{ date('Y') }}</footer>
   </div>
</body>
</html>