<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Service extends Model
{
	use Sluggable;
    //
	protected $table = 'services';
	protected $guarded = []; 

	public $rules = [
		'title_ru' => 'required|max:190|string',
		'title_uz' => 'required|max:190|string',
		'text_ru' => 'required|string',
		'text_uz' => 'required|string',
		
	];
	public function sluggable()
	{
		return [
			'slug' => [
				'source' => 'title_ru'
			]
		];
	}
	public function ser()
	{
		return $this->hasMany('App\Model\Portfolio', 'services_id');
	}
	public function img()
	{
		return $this->hasMany('App\Model\SerImages', 'services_id');
	}
	public function imgOne()
	{
		return $this->hasOne('App\Model\SerImages', 'services_id');
	}
}
