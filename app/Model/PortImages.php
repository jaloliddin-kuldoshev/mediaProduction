<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PortImages extends Model
{
    //
	protected $table = 'port_images';
	protected $guarded = [];

	public $rules = [
		'img' => 'mimes:jpeg,bmp,png|max:1500',
		
	];
	public function img()
	{
		return $this->belongsTo('App\Model\Portfolio', 'portfolios_id');
	}
}
