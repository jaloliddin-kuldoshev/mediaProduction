<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    //
	use Sluggable;

	protected $table = 'categories';
	protected $guarded = [];

	public $rules = [
		'title_ru' => 'required|max:190|string',
		'title_uz' => 'required|max:190|string',		
	];
	public function sluggable()
	{
		return [
			'slug' => [
				'source' => 'title_ru'
			]
		];
	}
	public function cat()
	{
		return $this->hasMany('App\Model\Portfolio', 'categories_id')->orderBy('id','DESC')->limit(16);
	}
}
