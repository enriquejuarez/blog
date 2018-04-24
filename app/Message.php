<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	//Se definen los campos que sera posible guardar (create or/and update)
   protected $fillable = ['nombre', 'email', 'mensaje'];
}
