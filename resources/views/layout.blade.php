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
      <h1>{{ request()->is('/') ? 'Estas en el home' : 'No estas en el home' }}</h1>
      <nav>
         <a class="{{ activeMenu('/') }}" href="{{ route('home') }}">Inicio</a>
         <a class="{{ activeMenu('saludos/*') }}" href="{{ route('saludos', 'carlos') }}">Saludos</a>
         <a class="{{ activeMenu('contactame') }}" href="{{ route('contactos') }}">Contactos</a>
      </nav>
   </header>
   @yield('contenido')
   <footer>Copyright {{ date('Y') }}</footer>
</body>
</html>