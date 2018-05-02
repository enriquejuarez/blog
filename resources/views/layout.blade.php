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
   <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light ">
         <a class="navbar-brand" href="#">Blog</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item {{ activeMenu('/') }}">
                  <a class=" nav-link" href="{{ route('home') }}">Inicio<span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item {{ activeMenu('saludos/*') }}">
                  <a class="nav-link" href="{{ route('saludos', 'Carlos') }}">Saludos<span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item {{ activeMenu('mensajes/create') }}">
                  <a class="nav-link" href="{{ route('mensajes.create') }}">Contactos<span class="sr-only">(current)</span></a>
               </li>
               @if (auth()->check())
                  <li class="nav-item">
                     <a class="{{ activeMenu('mensajes*') }} nav-link" href="{{ route('mensajes.index') }}">Mensajes</a>
                  </li>
                  @if (auth()->user()->hasRole(['admin']))
                     <li class="nav-item">
                        <a class="{{ activeMenu('usuarios*') }} nav-link" href="{{ route('usuarios.index') }}">Usuarios</a>
                     </li>
                  @endif
               @endif
               @if (auth()->guest())
                  <li class="nav-item">
                     <a class="{{ activeMenu('login') }} nav-link" href="/login">Login</a>
                  </li>
               @else
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     {{ auth()->user()->name }}
                  </a> 
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <a class="dropdown-item" href="/logout">Cerrar sesión</a>
                     <a class="dropdown-item" href="/usuarios/{{ auth()->id() }}/edit">Mi cuenta</a>
                  </div>
               </li>
               @endif
            </ul>
         </div>
      </nav>
   </div>
   </header>
   <div class="container">
      @yield('contenido')
      <footer>Copyright {{ date('Y') }}</footer>
   </div>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
   <!-- <script src="/js/all.js"></script> -->
</body>
</html>