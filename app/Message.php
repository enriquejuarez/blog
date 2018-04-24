<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	//Se definen los campos que sera posible guardar (create or/and update) y evitar asignación masiva
   protected $fillable = ['nombre', 'email', 'mensaje'];
}
