<?php

namespace App\Http\Controllers\Admin;

use App\Model\Service;
use App\Model\SerImages;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ServiceController extends Controller
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
        $news = Service::all();
        return view('admin.service.index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.service.create');
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
        $obj = new Service();

        $val = $obj->rules;

        $validator = Validator::make($input, $val);

        if ($validator->fails()) {

            return back()->withErrors($validator)->withInput();

        }

        $obj->title_ru = $request->input('title_ru');
        $obj->title_uz = $request->input('title_uz');
        $obj->text_uz = $request->input('text_uz');
        $obj->text_ru = $request->input('text_ru');
        $obj->show_on_main = $request->input('show_on_main');
        $obj->save();
        
        if($request->hasfile('img'))
        {
            foreach($request->file('img') as $image)
            {
                $pro = new SerImages();
                $unique = mt_rand(100000, 999999);
                $name = $unique . '.' . $image->getClientOriginalExtension();
                $dir = '/site/photo/service/';
                $destinationPath = public_path('/site/photo/service/');
                $image->move($destinationPath, $name); 
                $pro->img = $dir . $name; 
                $pro->services_id = $obj->id;
                $pro->save();
            }
        }

        return redirect()->route('service.index')->with('message', 'Успешно добавлено');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $news = Service::find($id);
        $img = SerImages::where([
            ['services_id', '=', $id]
        ])->get();

        return view('admin.service.edit', ['news' => $news, 'img' => $img]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input = $request->all();

        $obj = Service::find($id);

        $val = $obj->rules;

        $validator = Validator::make($input, $val);

        if ($validator->fails()) {

            return back()->withErrors($validator)->withInput();

        }
        $obj->title_ru = $request->input('title_ru');
        $obj->title_uz = $request->input('title_uz');
        $obj->text_uz = $request->input('text_uz');
        $obj->text_ru = $request->input('text_ru');
        $obj->show_on_main = $request->input('show_on_main');
        $obj->save();
        if($request->hasfile('img'))
        {
            foreach($request->file('img') as $image)
            {
                $pro = new SerImages();
                $unique = mt_rand(100000, 999999);
                $name = $unique . '.' . $image->getClientOriginalExtension();
                $dir = '/site/photo/service/';
                $destinationPath = public_path('/site/photo/service/');
                $image->move($destinationPath, $name); 
                $pro->img = $dir . $name; 
                $pro->services_id = $obj->id;
                $pro->save();

                // echo "<pre>";
                // print_r($pro);
                // echo "</pre>";
                // die();
            }
        }

        if (!empty($request->input('oldimg'))) {
            $img = $request->input('oldimg');
            SerImages::destroy($img);
        }


        



        return redirect()->route('service.index')->with('message', 'Успешно обновлено');
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Service::find($id);

        if ($data->delete()){

            return redirect()->route('service.index')->with('message', 'Успешно удалено');
        }

    }
}
