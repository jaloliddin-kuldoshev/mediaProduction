<?php

namespace App\Http\Controllers\Admin;

use App\Model\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ClientController extends Controller
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
        $news = Client::all();
        return view('admin.client.index', ['news' => $news]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.client.create');
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

        $obj = new Client();

        $val = $obj->rules;

        $validator = Validator::make($input, $val);

        if ($validator->fails()) {

            return back()->withErrors($validator)->withInput();

        }
        if ($request->hasFile('img')) {

            $unique = mt_rand(100000, 999999);

            $image = $request->file('img');

            $name = $unique . '.' . $image->getClientOriginalExtension();

            $dir = '/site/photo/client/';

            $destinationPath = public_path('/site/photo/client/');

            $image->move($destinationPath, $name);

            $input['img'] = $dir . $name;
        }
        $obj->fill($input);

        if ($obj->save()){

            return redirect()->route('client.index')->with('message', 'Успешно добавлено');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $news = Client::find($id);
        return view('admin.client.edit', ['news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input = $request->all();

        $obj = Client::find($id);

        $val = $obj->rules;

        $validator = Validator::make($input, $val);

        if ($validator->fails()) {

            return back()->withErrors($validator)->withInput();

        }
        if ($request->hasFile('img')){

            $unique = mt_rand(100000, 99999999);

            $image = $request->file('img');

            $name = $unique . '.' . $image->getClientOriginalExtension();

            $dir = '/site/photo/client/';

            $destinationPath = public_path('/site/photo/client/');

            $image->move($destinationPath,$name);

            $input['img'] = $dir . $name;
        }else{
            $obj->img = Client::find($id)->img;
        }
        $obj->update($input);

        if ($obj->save()){

            return redirect()->route('client.index')->with('message', 'Успешно обновлено');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Client::find($id);

        if ($data->delete()){

            return redirect()->route('client.index')->with('message', 'Успешно удалено');
        }

    }
}
