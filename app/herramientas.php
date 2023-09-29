<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class herramientas extends Model
{
    public $timestamps = false;

	protected $fillable = [
			'icono','titulo','descripcion','pdf','inicio','activo','orden'
	];
}
