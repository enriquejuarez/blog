<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMessageResuest;

class PageController extends Controller
{
   /*//Inyectar Request al contructor, con lo cual se aplica para todos los metodos del controlador
   protected $request;

   public function __construct(Request $request)
   {
      $this->request = $request;
   }*/

   public function home()
   {
      return view('home');
   }

   public function contact()
   {
      return view('contactos');
   }

   public function saludo($nombre="CarlosEnrique")
   {
      $html = "<h2>Contenido HTML</h2>";
      $script = "<script>alert('Problema XSS')</script>";

      $consolas = [
         "Play Station 4",
         "Xbox One",
         "Wii U"
      ];
      return view('saludo', compact('nombre', 'html', 'script', 'consolas'));
   }

   public function mensajes(CreateMessageResuest $request)
   //Si el request solo se pasa como parametro, no aplicará para todos los métodos si no solo parra aquellos que pase el parámetro
   {
      $data = $request->all(); //Procesar los datos del formulario

      //redirección
      return back()->with('info', 'Tu mensaje ha enviado correctamente :)');
   }
}
