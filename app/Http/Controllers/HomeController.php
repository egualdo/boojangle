<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // $this->middleware('visit');
        // $this->middleware('cliente');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd("en el index");
        if(Auth::user()->role_id==3){
             $orders = Order::orderBy('avgtotal','desc')->get();
            $aux=[];
            foreach ($orders as  $value) {
                
                $value->weeks_element=json_decode($value->weeks_element);
               

                if(count($value->weeks_element)>0){
                    foreach ($value->weeks_element as  $val) {
                        $val->average=number_format($val->average, 1);
                        
                        $val->quantity=(int)$val->quantity;

                        if($val->name != ""){
                            array_push($aux,$val->name);
                        }
                }
                }

                $value->average=number_format($value->average, 1);
                $value->quantity=(int)$value->quantity;
            }

            $semanas = array_unique($aux);
            sort($semanas);
            // dd($semanas);
            return view('panel.dashboard.welcome',compact('orders','semanas'));
        }else{

            return view('panel.dashboard.index');  
        }
    }

    // public function welcome(){
    //     $orders=Order::all();
    //     foreach ($orders as  $value) {
    //         $value->weeks_element=json_decode($value->weeks_element);
    //     }
    //    return view('panel.dashboard.welcome',compact('orders'));

    // }
}
