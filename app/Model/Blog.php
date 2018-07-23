<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Blog extends Model
{
	use Sluggable;
    //
	protected $table = 'blogs';
	protected $guarded = [];
	public $rules = [
		'title_ru' => 'required|max:190|string',
		'title_uz' => 'required|max:190|string',
		'text_ru' => 'required|string',
		'text_uz' => 'required|string',
		'img' => 'mimes:jpeg,bmp,png|max:1500',
		
	];
	public function sluggable()
	{
		return [
			'slug' => [
				'source' => 'title_ru'
			]
		];
	}
}
