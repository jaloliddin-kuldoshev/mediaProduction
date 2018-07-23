<?php

namespace App\Http\Controllers\Admin;

use App\Model\Slider;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
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
        $news = Slider::all();
        return view('admin.sliders.index', ['slider' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.sliders.create');
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

        $obj = new Slider();

        $val = $obj->rules;

        $validator = Validator::make($input, $val);

        if ($validator->fails()) {

            return back()->withErrors($validator)->withInput();

        }
        if ($request->hasFile('img')) {

            $unique = mt_rand(100000, 999999);

            $image = $request->file('img');

            $name = $unique . '.' . $image->getClientOriginalExtension();

            $dir = '/site/photo/sliders/';

            $destinationPath = public_path('/site/photo/sliders/');

            $image->move($destinationPath, $name);

            $input['img'] = $dir . $name;
        }
        $obj->fill($input);

        if ($obj->save()){

            return redirect()->route('sliders.index')->with('message', 'Успешно добавлено');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $news = Slider::find($id);
        return view('admin.sliders.edit', ['news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input = $request->all();

        $obj = Slider::find($id);

        $val = $obj->rules;

        $validator = Validator::make($input, $val);

        if ($validator->fails()) {

            return back()->withErrors($validator)->withInput();

        }
        if ($request->hasFile('img')){

            $unique = mt_rand(100000, 99999999);

            $image = $request->file('img');

            $name = $unique . '.' . $image->getClientOriginalExtension();

            $dir = '/site/photo/sliders/';

            $destinationPath = public_path('/site/photo/sliders/');

            $image->move($destinationPath,$name);

            $input['img'] = $dir . $name;
        }else{
            $obj->img = Slider::find($id)->img;
        }
        $obj->update($input);

        if ($obj->save()){

            return redirect()->route('sliders.index')->with('message', 'Успешно обновлено');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Slider::find($id);

        if ($data->delete()){

            return redirect()->route('sliders.index')->with('message', 'Успешно удалено');
        }
    }
}
