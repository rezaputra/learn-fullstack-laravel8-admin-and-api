<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductTransaction;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
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
        $datas = ProductTransaction::all('product_id','status')->where('status','=','1')->toArray();
        foreach ($datas as $data) {
            $income[] = $data['product_id'];
        }
        
        $incomes = Product::all()->whereIn('id', $income)->sum('price');
        $sales = ProductTransaction::all()->count();
        $success = ProductTransaction::all()->where('status', '=', '1')->count();
        $pending = ProductTransaction::all()->where('status', '=', '0')->count();
        $failed = ProductTransaction::all()->where('status', '=', '2')->count();
        $month = [
            'january' => ProductTransaction::whereMonth('created_at', '=', '01')->whereYear('created_at', '=', Date('Y'))->count(),
            'february' => ProductTransaction::whereMonth('created_at', '=', '02')->whereYear('created_at', '=', Date('Y'))->count(),
            'march' => ProductTransaction::whereMonth('created_at', '=', '03')->whereYear('created_at', '=', Date('Y'))->count(),
            'april' => ProductTransaction::whereMonth('created_at', '=', '04')->whereYear('created_at', '=', Date('Y'))->count(),
            'may' => ProductTransaction::whereMonth('created_at', '=', '05')->whereYear('created_at', '=', Date('Y'))->count(),
            'june' => ProductTransaction::whereMonth('created_at', '=', '06')->whereYear('created_at', '=', Date('Y'))->count(),
            'july' => ProductTransaction::whereMonth('created_at', '=', '07')->whereYear('created_at', '=', Date('Y'))->count(),
            'august' => ProductTransaction::whereMonth('created_at', '=', '08')->whereYear('created_at', '=', Date('Y'))->count(),
            'september' => ProductTransaction::whereMonth('created_at', '=', '09')->whereYear('created_at', '=', Date('Y'))->count(),
            'october' => ProductTransaction::whereMonth('created_at', '=', '10')->whereYear('created_at', '=', Date('Y'))->count(),
            'november' => ProductTransaction::whereMonth('created_at', '=', '11')->whereYear('created_at', '=', Date('Y'))->count(),
            'december' => ProductTransaction::whereMonth('created_at', '=', '12')->whereYear('created_at', '=', Date('Y'))->count(),
        ];

        // dd($month);
        return view('pages.dashboard')->with([
            'incomes' => $incomes,
            'sales' => $sales,
            'month' => $month,
            'success' => $success,
            'pending' => $pending,
            'failed' => $failed
        ]);
    }
}
