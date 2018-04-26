<!DOCTYPE html>
<html>
<head>
   <title>Home</title>
   <meta charset="utf-8">
   <style>
      .active{
         text-decoration: none;
         color: green;
      }
      .error{
         color: red;
         font-size: 12px;
      }
   </style>
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
      <nav>
         <a class="{{ activeMenu('/') }}" href="{{ route('home') }}">Inicio</a>
         <a class="{{ activeMenu('saludos/*') }}" href="{{ route('saludos', 'carlos') }}">Saludos</a>
         <a class="{{ activeMenu('mensajes/create') }}" href="{{ route('mensajes.create') }}">Contactos</a>
         @if (auth()->check())
            <a class="{{ activeMenu('mensajes') }}" href="{{ route('mensajes.index') }}">Mensajes</a>
            <a href="/logout">Cerrar sesión de {{ auth()->user()->name }}</a>
         @endif
         @if (auth()->guest())
            <a class="{{ activeMenu('login') }}" href="/login">Login</a>
         @endif
      </nav>
   </header>
   @yield('contenido')
   <footer>Copyright {{ date('Y') }}</footer>
</body>
</html>