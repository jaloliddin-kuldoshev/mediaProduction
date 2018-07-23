<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Warehouses extends Model
{
    //
	protected $table = 'warehouses';
	protected $guarded = [];

	public $rules = [
		'text_ru' => 'required|string',
		'text_uz' => 'required|string',
		
	];
}
