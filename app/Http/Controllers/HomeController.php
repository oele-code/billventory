<?php

namespace StockTaking\Http\Controllers;

use Illuminate\Http\Request;

use StockTaking\Customer;
use StockTaking\Product;
use StockTaking\Sale;

use StockTaking\Http\Requests;
use StockTaking\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers = Customer::all();
        $products  = Product::all();

        return view('home',[
                'customers' => $customers,
                'products'  => $products,
            ]);
    }

}
