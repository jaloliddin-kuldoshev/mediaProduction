<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request; 

class CategoryController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
		$cat =Category::all();
		return view('admin.category.index', [
			'cat' => $cat,
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
		return view('admin.category.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
		$input = $request->all();

		$obj = new Category();

		$val = $obj->rules;

		$validator = Validator::make($input, $val);

		if ($validator->fails()) {

			return back()->withErrors($validator)->withInput();

		}
		$obj->fill($input);

		if ($obj->save()){

			return redirect()->route('category.index')->with('message', 'Успешно добавлено');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function show(Category $category)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
		$news = Category::find($id);
		return view('admin.category.edit', ['news' => $news]);

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
		$input = $request->all();

		$obj = Category::find($id);

		$val = $obj->rules;

		$validator = Validator::make($input, $val);

		if ($validator->fails()) {

			return back()->withErrors($validator)->withInput();
		}
		$obj->update($input);

		if ($obj->save()){

			return redirect()->route('category.index')->with('message', 'Успешно обновлено');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
		$data = Category::find($id);

		if ($data->delete()){

			return redirect()->route('category.index')->with('message', 'Успешно удалено');
		}
	}
}
