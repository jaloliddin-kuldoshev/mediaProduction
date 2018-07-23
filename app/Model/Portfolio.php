<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Portfolio extends Model
{
	use Sluggable;
    // 
	protected $table = 'portfolios';
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
	public function portfolio()
	{
		return $this->belongsTo('App\Model\Client', 'clients_id');
	}
	public function ser()
	{
		return $this->belongsTo('App\Model\Service', 'services_id');
	}
	public function img()
	{
		return $this->hasMany('App\Model\PortImages', 'portfolios_id');
	}
	public function imgOne()
	{
		return $this->hasOne('App\Model\PortImages', 'portfolios_id');
	}
	public function cat()
	{
		return $this->belongsTo('App\Model\Category', 'categories_id');
	}
}
