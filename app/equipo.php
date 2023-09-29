<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class equipo extends Model
{
    public $timestamps = false;

	protected $fillable = [
			'imagen','titulo','subtitulo','descripcion','whatsapp','facebook','instagram','inicio','activo','orden'
	];
}
