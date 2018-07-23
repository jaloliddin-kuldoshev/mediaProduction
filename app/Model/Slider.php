<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
	protected $table = 'sliders';
	protected $guarded = [];
	public $rules = [
		'title_ru' => 'required|max:190|string',
		'title_uz' => 'required|max:190|string',
		'text_ru' => 'required|max:190|string',
		'text_uz' => 'required|max:190|string',
		'img' => 'mimes:jpeg,bmp,png|max:1500',
		
	];
}
