<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Warehouses;
use App\Model\Contacts;

class AdminController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function ware(Request $request)
	{

		if ($request->isMethod('post')){

			$input = $request->all();

			$obj = Warehouses::find($input['id']);

			$obj->update($input);
			
			if ($obj->save()){

				return back()->with('message', 'Успешно обновлено');
			}

		}else{

			$news = Warehouses::find(1);

			return view('admin.pages.ware', ['news' => $news]);
		}
		
	}
	public function contacts(Request $request)
	{

		if ($request->isMethod('post')){

			$input = $request->all();

			$obj = Contacts::find($input['id']);

			$obj->update($input);
			
			if ($obj->save()){

				return back()->with('message', 'Успешно обновлено');
			}

		}else{

			$news = Contacts::find(1);

			return view('admin.pages.contacts', ['news' => $news]);
		}
		
	}
}
