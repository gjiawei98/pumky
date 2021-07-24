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
     
        // BAR CHART
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


        // SALE CHART
        $days = array();
        $sales_arr = array();
        $sales_per_day = Sales::whereDate('sales.sales_date', '>', Carbon::now()->subDays(30))
            ->get();

        for($i = 29; $i >= 0; $i--)
        {
            $days[$i] =  date("Y-m-d", strtotime("-$i days"));
        }
 
        $day_profit = 0; 

        foreach ($days as $key =>$d) {

            $sales_arr[Carbon::parse($d)->getPreciseTimestamp(3)] = 0;
            foreach ($sales_per_day as $spd) {
              
                if(Carbon::parse($spd->sales_date)->format('m-d') == Carbon::parse($d)->format('m-d')){
                    $sales_arr[Carbon::parse($d)->getPreciseTimestamp(3)] += $spd->total_profit;
                }
            }
        }   

        $sales_array = null;
        $i = 0;
        foreach ($sales_arr as $key => $sa) {
            $sales_array[$i] = [$key,$sa];
            $i++;
        }

        $data = substr_replace($data, "", -1);
        return view('dashboard.index',compact('products','merchants','month','data','total','sales_array','sales_arr'));
    }
}
