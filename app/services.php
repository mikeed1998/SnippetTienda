<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class services extends Model
{
    public $timestamps = false;

	protected $fillable = [
			'icono','titulo','descripcion','image','inicio','activo','orden'
	];
}
