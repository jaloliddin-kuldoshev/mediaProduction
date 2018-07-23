<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    //
	protected $table = 'contacts';
	protected $guarded = [];

	public $rules = [
		'worktime' => 'required|max:190|string',
		'address_ru' => 'required|max:190|string',
		'address_uz' => 'required|max:190|string',
		'near_uz' => 'required|max:190|string',
		'near_ru' => 'required|max:190|string',
		'tel' => 'required|max:190|string',
		'email' => 'required|max:190|string',
		'map' => 'required|max:190|string',
		'face' => 'required|max:190|string',
		'twit' => 'required|max:190|string',
		'ins' => 'required|max:190|string',
		'tele' => 'required|max:190|string',
		'ok' => 'required|max:190|string',
		'vk' => 'required|max:190|string',
		
	];
}
