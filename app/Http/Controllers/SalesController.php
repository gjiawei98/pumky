<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sales;
use App\Models\SalesDetail;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
   
      
        $search = $request->query('search',null);
        $start = $request->query('start',null);
        $end = $request->query('end',null);

        $sales = Sales::where(function ($q) use ($search) {
            return $q->orWhere('sales.tracking_number', 'like', '%' . $search . '%')
                ->orWhere('sales.customer_first_name', 'like', '%' . $search . '%')
                ->orWhere('sales.customer_last_name', 'like', '%' . $search . '%')
                ->orWhere('sales.contact_number', 'like', '%' . $search . '%');
        })
        ->when(($start != null && $end != null), function ($q) use ($start, $end) {
            return $q->whereBetween('sales.sales_date', [Carbon::parse($start)->format('Y-m-d'), Carbon::parse($end)->format('Y-m-d')]);
        })
        ->paginate(10);
        return view('sales.index',compact('sales','search','start','end'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        $products = Product::where('status',1)->get();

        if($products->isEmpty()){
            return back()->with('error','No Product Found !!');
        }
        return view('sales.create',compact('states','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            $total_profit = 0;

            $sales_id = Sales::create([
                "customer_first_name" =>$request->first_name,
                "customer_last_name" => $request->last_name,
                "email" => $request->email,
                "contact_number" => $request->contact_number,
                "sales_date" => Carbon::parse($request->sales_date)->format('Y-m-d'),
                'month' => Carbon::parse($request->sales_date)->format('m'),
                'year' => Carbon::parse($request->sales_date)->format('Y'),
                "tracking_number" => $request->tracking_number,
                "street_no" => $request->street_no,
                "city" => $request->city,
                'status' => 1,
                'created_by' => Auth::id(),
            ]);
    
            foreach($request->product_id as $p_key => $pi) {
                $product_id = $pi;
                $agent_price = $request->agent_price[$p_key];
                $selling_price = $request->selling_price[$p_key];
                $quantity = $request->quantity[$p_key];
    
                $profit = $selling_price - $agent_price;
    
                SalesDetail::create([
                    'sales_id' => $sales_id->id,
                    'product_id' => $product_id,
                    'selling_price' => $selling_price,
                    'agent_price' => $agent_price,
                    'quantity' => $quantity,
                    'profit' => $profit,
                    'status' => 1,
                    'created_by' => Auth::id(),
                ]);
                
                $total_profit += $profit;
            }

            $sales_id->update([
                'total_profit' => $total_profit,
            ]);
        } catch (\Throwable $th) {
            dd($th);
            return back()->with('error','Something Wrong !! ');
        }

        return redirect('/sales')->with('success','New Sales Created');  
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

    public function get_product($id) {
        $product = Product::where('id',$id)->first();
        $agent_price = null;
        $selling_price = null;
        if(!$product){
            return array(
                'status' => 'error',
                'msg' => 'Product Not Found ? Please Reload',
                'agent_price' => $agent_price,
                'selling_price' => $selling_price,
            );
        }

        $agent_price = $product->agent_price;
        $selling_price = $product->selling_price;

        return array(
            'status' => 'success',
            'msg' => 'Ok',
            'agent_price' => $agent_price,
            'selling_price' => $selling_price,
        );
    }
}
