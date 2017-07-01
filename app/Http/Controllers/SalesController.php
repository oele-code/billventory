<?php

namespace StockTaking\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use StockTaking\Sale;
use StockTaking\Product;
use Session;

use StockTaking\Http\Requests;
use StockTaking\Http\Controllers\Controller;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sales = Sale::all();
        $details = array();

        foreach($sales as $sale){
            foreach($sale->products as $prod){
                $detail = [
                        'customer'  => $sale->customer->fname,
                        'invoice'   => $sale->id,
                        'reference' => $prod->reference,
                        'qty'       => $prod->pivot->qty,
                        'cost'      => $prod->cost,
                        'value'     => $prod->cost * $prod->pivot->qty,
                        'price'     => $prod->price,
                        'desc'     => $prod->pivot->desc,
                        'total'     => $prod->pivot->total,
                        'profit'    => $prod->pivot->total - $prod->cost * $prod->pivot->qty,
                        'by'        => $sale->user->email,
                        'created_at'=> $sale->created_at->format('d/m/Y h:i a')
                        ];

                array_push($details,$detail);
            }
        }
        return view('sales.index',['sales' => $sales , 'details' => $details ]);
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
        $sale = Sale::create([
                    'customer_id' =>  $request->customer_id,
                    'total'       =>  $request->totalAll,
                    'user_id'     =>  \Auth::user()->id,
                ]);

        for ($i=0; $i < count($request->prod_id) ; $i++) { 
            # code...
            
            $product = Product::find($request->prod_id[$i]);
            $product->stock = $product->stock - $request->qty[$i];
            $product->save();

            $sale->products()->attach($request->prod_id[$i], [
                    'qty' => $request->qty[$i],
                    'desc' => $request->desc[$i],
                    'total' => $request->total[$i] 
                ]);
        }

        Session::flash('download.sale', '/sales/'.$sale->id.'/invoice');
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $sale = Sale::find($id);
        return view('sales.show',['sale' => $sale]);
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
    }

}
