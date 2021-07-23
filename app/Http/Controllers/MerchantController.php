<?php

namespace App\Http\Controllers;

use App\Http\Requests\MerchantRequest;
use App\Models\Merchant;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merchants = Merchant::paginate(10);
        return view('merchant.index', compact('merchants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        return view('merchant.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MerchantRequest $request)
    {
        try {
            $merchant = Merchant::where('name', $request->name)->first();

            if ($merchant) {
                return back()->with('error', 'Merchant Name Exist');
            }

            Merchant::create([
                'name' => $request->name,
                "status" => $request->status,
                "shipping_rate" => $request->shipping_rate,
                "type" => $request->type,
                "add_on" => $request->add_on,
                'remark' => $request->remark,
                "state" => $request->state,
                "website_url" => $request->website,
                "facebook" => $request->facebook,
                "instagram" => $request->instagram,
                "telegram" => $request->telegram,
                'created_by' => Auth::id(),
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Something Wrong');
        }
        return redirect('/merchant')->with('success', 'Merchant ' . $request->name . ' Created !!');
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
        $merchant = Merchant::findOrFail($id);
        $states = State::all();
        return view('merchant.edit', compact('states', 'merchant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MerchantRequest $request, $id)
    {
        try {
            $merchant = Merchant::findOrFail($id);

            $merchant->update([
                'name' => $request->name,
                "status" => $request->status,
                "shipping_rate" => $request->shipping_rate,
                "type" => $request->type,
                "add_on" => $request->add_on,
                'remark' => $request->remark,
                "state" => $request->state,
                "website_url" => $request->website,
                "facebook" => $request->facebook,
                "instagram" => $request->instagram,
                "telegram" => $request->telegram,
                'updated_by' => Auth::id(),
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Something Wrong');
        }
        return redirect('/merchant')->with('success', 'Merchant ' . $request->name . ' Updated !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $merchant = Merchant::where('id',$id)->first();

        if(!$merchant) {
             return '2';
        }

        $merchant->delete();

        return '1';
    }
}
