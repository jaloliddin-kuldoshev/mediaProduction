<?php

namespace App\Http\Controllers\Admin;

use App\Model\Benefits;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BenefitsController extends Controller
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
        $news = Benefits::all();
        return view('admin.about.index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Benefits  $benefits
     * @return \Illuminate\Http\Response
     */
    public function show(Benefits $benefits)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Benefits  $benefits
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $news = Benefits::find($id);
        return view('admin.about.edit', ['new' => $news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Benefits  $benefits
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input = $request->all();

        $obj = Benefits::find($id);

        $val = $obj->rules;

        $validator = Validator::make($input, $val);

        if ($validator->fails()) {

            return back()->withErrors($validator)->withInput();

        }
        if ($request->hasFile('img')){

            $unique = mt_rand(100000, 99999999);

            $image = $request->file('img');

            $name = $unique . '.' . $image->getClientOriginalExtension();

            $dir = '/site/photo/benefits/';

            $destinationPath = public_path('/site/photo/benefits/');

            $image->move($destinationPath,$name);

            $input['img'] = $dir . $name;
        }else{
            $obj->img = Benefits::find($id)->img;
        }
        if ($request->hasFile('icon')){

            $unique = mt_rand(100000, 99999999);

            $image = $request->file('icon');

            $name = $unique . '.' . $image->getClientOriginalExtension();

            $dir = '/site/photo/benefits/';

            $destinationPath = public_path('/site/photo/benefits/');

            $image->move($destinationPath,$name);

            $input['icon'] = $dir . $name;
        }else{
            $obj->icon = Benefits::find($id)->icon;
        }
        $obj->update($input);

        if ($obj->save()){

            return redirect()->route('benefits.index')->with('message', 'Успешно обновлено');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Benefits  $benefits
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
