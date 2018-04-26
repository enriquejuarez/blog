<!DOCTYPE html>
<html>
<head>
   <title>Error</title>
   <meta charset="utf-8">
</head>
<body>
	<h1>No pudimos encontrar esta pagina</h1>
	<a href="{{ route('home') }}">Regresar al home</a>
	{{ $errors }}
 </body>	
</html>