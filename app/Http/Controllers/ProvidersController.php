<?php

namespace StockTaking\Http\Controllers;

use Illuminate\Http\Request;

use StockTaking\Provider;

use StockTaking\Http\Requests;
use StockTaking\Http\Controllers\Controller;

class ProvidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $providers = Provider::all();
        return view('providers.index',['providers' => $providers]);
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
        $provider  = Provider::create($request->all());
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $providers = Provider::all();
        $provider  = Provider::find($id);
        return view('providers.index',['providers' => $providers ,'providerEdit' => $provider ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $provider = Provider::find($id);
        $provider->update($request->all());
        return redirect('providers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $provider = Provider::find($id);
        $provider->delete();
        return back();
    }
}
