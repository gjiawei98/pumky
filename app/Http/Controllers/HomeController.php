<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\Product;
use App\Models\Sales;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $merchants = Merchant::all();
        $products = Product::all();
     
        $sales = Sales::get()->groupby('month','year');
        $total = Sales::sum('total_profit');
        $data = null; 
        $month = [
            '1' => 0,
            '2' => 0,
            '3' => 0,
            '4' => 0,
            '5' => 0,
            '6' => 0,
            '7' => 0,
            '8' => 0,
            '9' => 0,
            '10' => 0,
            '11' => 0,
            '12' => 0,
        ];

        foreach($sales as $key => $sale){
            $month[$key] = $sale->count();
        }
       
        foreach ($month as $m_key => $m) {
            $data .=  $m.',';
        }
        $data = substr_replace($data, "", -1);
        return view('dashboard.index',compact('products','merchants','month','data','total'));
    }
}
