<?php

namespace StockTaking\Http\Controllers;

use Illuminate\Http\Request;

use StockTaking\Product;
use StockTaking\Provider;
use StockTaking\Category;

use Datatables;
use DB;
use StockTaking\Http\Requests;
use StockTaking\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products       = Product::all();
        $providers      = Provider::select(DB::raw("CONCAT(number,' ',fname,' ',lname) AS user, id"))->lists('user','id');
        $categories     = Category::all();
        $listCategories = Category::lists('name','id');
        return view('products.index',[
            'products'       => $products,
            'providers'      => $providers,
            'listCategories' => $listCategories,
            'categories'     => $categories,
            ]);
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
        $product = Product::create($request->all());
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
        $product        = Product::find($id);
        $products       = Product::all();
        $providers      = Provider::select(DB::raw("CONCAT(number,' ',fname,' ',lname) AS user, id"))->lists('user','id');
        $categories     = Category::all();
        $listCategories = Category::lists('name','id');

        return view('products.index',[
            'products'       => $products,
            'providers'      => $providers,
            'listCategories' => $listCategories,
            'categories'     => $categories,
            'productEdit'    => $product,
            ]);
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
        $product = Product::find($id);
        $product->update($request->all());
        return redirect('products');
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
        $product = Product::find($id);
        $product->delete();
        return back();
    }

}
