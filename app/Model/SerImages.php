<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SerImages extends Model
{
    //
	protected $table = 'ser_images';
	protected $guarded = [];

	public $rules = [
		'img' => 'mimes:jpeg,bmp,png|max:1500',
		
	];
	public function img()
	{
		return $this->belongsTo('App\Model\Service', 'services_id');
	}
	public function imgOne()
	{
		return $this->belongsTo('App\Model\Service', 'services_id');
	}
}
