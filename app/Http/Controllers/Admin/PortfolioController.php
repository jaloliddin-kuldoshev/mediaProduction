<?php

namespace App\Http\Controllers\Admin;

use App\Model\Portfolio;
use App\Model\Service;
use App\Model\Client;
use App\Model\Category;
use App\Model\PortImages;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use File;

class PortfolioController extends Controller
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
        $news = Portfolio::all();
        return view('admin.portfolio.index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ser = Service::all();
        $cli = Client::all();
        $cats = Category::all();
        return view('admin.portfolio.create', ['ser' => $ser, 'cli' => $cli, 'cats' => $cats]);
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
        $obj = new Portfolio();

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
        $obj->clients_id = $request->input('clients_id');
        $obj->services_id = $request->input('services_id');
        $obj->categories_id = $request->input('categories_id');
        $obj->save();
        
        if($request->hasfile('img'))
        {
            foreach($request->file('img') as $image)
            {
                $pro = new PortImages();
                $unique = mt_rand(100000, 999999);
                $name = $unique . '.' . $image->getClientOriginalExtension();
                $dir = '/site/photo/portfolio/';
                $destinationPath = public_path('/site/photo/portfolio/');
                $image->move($destinationPath, $name); 
                $pro->img = $dir . $name; 
                $pro->portfolios_id = $obj->id;
                $pro->save();
            }
        }

        return redirect()->route('portfolio.index')->with('message', 'Успешно добавлено');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $ser = Service::all();
        $cli = Client::all();
        $cats = Category::all();
        $news = Portfolio::find($id);
        $img = PortImages::where([
            ['portfolios_id', '=', $id]
        ])->get();
        return view('admin.portfolio.edit', [
            'ser' => $ser,
            'cli' => $cli,
            'news' => $news,
            'img' => $img,
            'cats' => $cats,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
       $input = $request->all();

       $obj = Portfolio::find($id);

       $val = $obj->rules;

       $validator = Validator::make($input, $val);

       if ($validator->fails()) {

        return back()->withErrors($validator)->withInput();

    }
    $obj->title_ru = $request->input('title_ru');
    $obj->title_uz = $request->input('title_uz');
    $obj->text_uz = $request->input('text_uz');
    $obj->text_ru = $request->input('text_ru');
    $obj->clients_id = $request->input('clients_id');
    $obj->services_id = $request->input('services_id');
    $obj->categories_id = $request->input('categories_id');
    $obj->show_on_main = $request->input('show_on_main');
    $obj->save();
    if($request->hasfile('img'))
    {
        foreach($request->file('img') as $image)
        {
            $pro = new PortImages();
            $unique = mt_rand(100000, 999999);
            $name = $unique . '.' . $image->getClientOriginalExtension();
            $dir = '/site/photo/portfolio/';
            $destinationPath = public_path('/site/photo/portfolio/');
            $image->move($destinationPath, $name); 
            $pro->img = $dir . $name; 
            $pro->portfolios_id = $obj->id;
            $pro->save();

                // echo "<pre>";
                // print_r($pro);
                // echo "</pre>";
                // die();
        }
    }

    if (!empty($request->input('oldimg'))) {
        $img = $request->input('oldimg');
        PortImages::destroy($img);
        File::delete($img);
    }






    return redirect()->route('portfolio.index')->with('message', 'Успешно обновлено');

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Portfolio::find($id);

        if ($data->delete()){

            return redirect()->route('portfolio.index')->with('message', 'Успешно удалено');
        }
    }
}
