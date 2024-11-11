<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Sale;
use App\Models\Product;
use Session;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        $details = [];

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function invoice($id)
    {
        //
        $sale = Sale::find($id);

        $data = [];

        foreach($sale->products as $prod){
            # code...
            $item = ['qty'     =>  $prod->pivot->qty, 'ref'     =>  $prod->reference, 'name'    =>  $prod->name, 'price'   =>  $prod->price, 'total'   =>  $prod->pivot->total];

            array_push($data, $item);
        }

        $customer = [
            'name'    => $sale->customer->fname.' '.$sale->customer->lname,
            'address' => $sale->customer->address,
            'mobile'  => $sale->customer->mobile,
            'email'   => $sale->customer->email,
            ];

        $company = [
            'name'    => 'MOTOREPUESTOS CASA BLANCA',
            'nit'     => 'NIT 13472340-1',
            'address' => 'Carrera 6 n 17-42 Agua Clara',
            'mobile'  => '(317) 890-8505',
            'email'   => 'gemelas-85@hotmail .com',
            ];

        $date     = date('d/m/Y');
        $invoice  = $sale->id ;
        $totalAll = $sale->total;
        $view =  \View::make('pdf.invoice', compact('customer','company','date','invoice','totalAll','data'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        $file = $pdf->download('invoice');

        return (new Response($file, 200))
           ->header('Content-Type','application/pdf');
    }

}
