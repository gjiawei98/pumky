<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Merchant;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        $merchants = Merchant::where('status', 1)->get();

        if ($merchants->isEmpty()) {
            return redirect('/product')->with('error', 'Please add merchant before proceed');
        }

        if ($categories->isEmpty()) {
            return redirect('/product')->with('error', 'Please add category before proceed');
        }

        return view('product.create', compact('categories', 'merchants'));
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
            $request->validate([
                'product_name' => 'required',
                'status' => 'required',
            ]);

            Product::create([
                "product_name" => $request->product_name,
                "type_of_stock" => $request->type_of_stock,
                "weightage" => $request->weightage,
                "status" => $request->status,
                "remark" => $request->remark,
                "agent_price" => $request->agent_price,
                "agent_quantity" => $request->agent_quantity,
                "agent_quantity_type" => $request->agent_quantity_type,
                "selling_price" => $request->selling_price,
                "selling_quantity" => $request->selling_quantity,
                "selling_quantity_type" => $request->selling_quantity_type,
                'merchant_id' => $request->merchant,
                'category_id' => $request->category,
                'created_by' => Auth::id(),
            ]);
        } catch (\Throwable $th) {
            dd($th);
            return back()->with('error', 'Something Wrong!! ');
        }
        return redirect('/product')->with('success', 'Product ' . $request->product_name . ' Created !!');
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
        $product = Product::findOrFail($id);
        $categories = Category::where('status', 1)->get();
        $merchants = Merchant::where('status', 1)->get();

        if ($merchants->isEmpty()) {
            return redirect('/product')->with('error', 'Please add merchant before proceed');
        }

        if ($categories->isEmpty()) {
            return redirect('/product')->with('error', 'Please add category before proceed');
        }

        return view('product.edit', compact('categories', 'merchants', 'product'));
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

        $product = Product::findOrFail($id);
        try {
            $request->validate([
                'product_name' => 'required',
                'status' => 'required',
            ]);

            $product->update([
                "product_name" => $request->product_name,
                "type_of_stock" => $request->type_of_stock,
                "weightage" => $request->weightage,
                "status" => $request->status,
                "remark" => $request->remark,
                "agent_price" => $request->agent_price,
                "agent_quantity" => $request->agent_quantity,
                "agent_quantity_type" => $request->agent_quantity_type,
                "selling_price" => $request->selling_price,
                "selling_quantity" => $request->selling_quantity,
                "selling_quantity_type" => $request->selling_quantity_type,
                'merchant_id' => $request->merchant,
                'category_id' => $request->category,
                'updated_by' => Auth::id(),
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Something Wrong!! ');
        }
        return redirect('/product')->with('success', 'Product ' . $request->product_name . ' Updated !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id',$id)->first();
        
        if(!$product){
            return '2';
        }

        $product->delete();
        
        return '1';
    }
}
