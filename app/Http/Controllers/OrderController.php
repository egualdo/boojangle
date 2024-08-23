<?php

namespace App\Http\Controllers;

use App\Exports\ProfitabilityBusinessExport;
use App\Imports\OrdersImport;
use App\Imports\SuppliersImport;
use App\Models\Order;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('avgtotal','desc')->get();
        // $aux=[];
        // foreach ($orders as  $value) {
            
        //     $value->weeks_element=json_decode($value->weeks_element);
        //     foreach ($value->weeks_element as  $val) {
        //         if($val->name != ""){
        //             array_push($aux,$val->name);
        //         }
        //     }
        // }

        // dd($aux);
        return view('panel.orders.index', compact('orders'));
    }

    public function filtering(Request $request)
    {

        // if ($request->ajax() ) {
        // dd($request->all());
            
            $orders=new Order();
            $arraux=[];

            

            if($request->filled('week') && $request->week !== "0") {
                $orderfind=Order::all();

                foreach ($orderfind as  $value) {
                    $value->weeks_element=json_decode($value->weeks_element);
                    foreach ($value->weeks_element as $val) {
                        $val->average=number_format($val->average,1);
                        $val->quantity=(int)$val->quantity;
                    }
                    $value->average=number_format($value->average,1);
                    $value->quantity=(int)$value->quantity;

                    $value->avgtotal=number_format($value->avgtotal,1);
                    $value->avgquantity=number_format($value->avgquantity,1);
                }

                foreach ($orderfind as $val) {
                    foreach ($val->weeks_element as  $v) {
                        if($v->name==$request->week){
                            $obj=(object)[];
                            $obj->id=$val->id;
                            $obj->supplier_id=$val->supplier_id;
                            $obj->quantity=(int)$v->quantity;//de la semana
                            $obj->average=number_format($v->average,1);//de la semana
                            $obj->avgquantity=number_format($v->quantity,1);//total
                            $obj->avgtotal=number_format($v->average,1);//total
                            $obj->date="none";
                            array_push($arraux,$obj);
                        }
                    }
                }
                     
                    if($request->filled('keyword')) {
                             $filtered=[];
                            $supplier=Supplier::whereRaw('LOWER(`name`) LIKE ? ',['%'.trim(strtolower("$request->keyword")).'%'])->
                                        get()->
                                        pluck('id')->toArray();
                  
                          if(count($supplier)>0){
                         
                            foreach ($arraux as $element) {
                           
                              
                                if(in_array($element->supplier_id, $supplier) ){
                                    array_push($filtered,$element);
                                }
                            }
                          }
                           
                            $orders=$filtered;
                    }else{

                        $orders=$arraux;
                    }

                    
                    $price = array_column($orders, 'avgtotal');
                    
                                
                    array_multisort($price, SORT_DESC, $orders);

                  
                                
                   $returnHTML = view('inc.list', compact('orders'))->render();

                    return response()->json(
                        [
                            'success' => true,
                            'html' => $returnHTML,
                        ]
                    );
            }

             if($request->filled('keyword')) {
              
                  $suppliers=Supplier::whereRaw('LOWER(`name`) LIKE ? ',['%'.trim(strtolower($request->keyword)).'%'])->
                                        get()->
                                        pluck('id');
                   $orders= $orders->whereIn("supplier_id",$suppliers);
             
            }

                $orders=$orders->orderBy('avgtotal','desc')->get();
           
                 foreach ($orders as  $value) {
                    $value->weeks_element=json_decode($value->weeks_element);
                    foreach ($value->weeks_element as $val) {
                        $val->average=number_format($val->average,1);
                        $val->quantity=(int)$val->quantity;
                    }
                    $value->average=number_format($value->average,1);
                    $value->quantity=(int)$value->quantity;

                    $value->avgtotal=number_format($value->avgtotal,1);
                    $value->avgquantity=number_format($value->avgquantity,1);
                }

            $returnHTML = view('inc.list', compact('orders'))->render();

            return response()->json(
                [
                    'success' => true,
                    'html' => $returnHTML,
                ]
            );
        // }
    }

    public function create()
    {
        $suppliers=Supplier::all();
        return view('panel.orders.create',compact('suppliers'));
    }

    public function store(Request $request)
    {
        
            $validator = Order::where('supplier_id',$request->supplier_id)->first();
                if ($validator) {
                     return response()->json(["code"=>422], 200);
                }

                // dd($request->all());

            DB::beginTransaction();
        try {
            $order = new Order();
            $order->supplier_id = (integer)$request->supplier_id;
            $order->quantity = (integer)$request->quantity;
            $order->weeks = (integer)$request->weeks;
            $order->average = (float) number_format($request->average,1);
            $order->date = $request->date;
            $order->weeks_element = $request->obj_commit;

            $order->avgtotal = (float) number_format($request->avgtotal,1);
            $order->avgquantity =(float) number_format($request->avgquantity,1);
            $order->save();

        } catch (\Exception $th) {
           DB::rollback();
           return response()->json(["code"=>500,"message"=>$th->getMessage()], 200);
            // return redirect()->back()
            // ->with('error', 'No se pudo completar la operacion.');
        }

      
        DB::commit();
        return response()->json(["code"=>200], 200);
        // return redirect()->route('orders.index')
        //     ->with('success', 'Orden creada exitosamente.');
    }

    public function show(Order $order)
    {   
        $order->weeks_element=json_decode($order->weeks_element);
        $suppliers=Supplier::all();
        return view('panel.orders.show', compact('order','suppliers'));
    }

    public function edit(Order $order)
    {
        $order->weeks_element=json_decode($order->weeks_element);
        $suppliers=Supplier::all();
     
        return view('panel.orders.edit', compact('order','suppliers'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'supplier_id' => 'required',
            'quantity' => 'required|numeric|gt:0',
            'weeks' => 'required|numeric|gt:0',
        ]);

        try {
            DB::beginTransaction();
            $order->supplier_id = $request->input('supplier_id');
            $order->quantity = $request->input('quantity');
            $order->weeks = $request->input('weeks');
            $order->average = (float) number_format($request->input('average'),1);
            $order->date = $request->input('date');
            $order->weeks_element = $request->input('obj_commit');
            $order->avgtotal =   number_format($request->input('avgtotal'),1);
            $order->avgquantity =  number_format($request->input('avgquantity'),1);
            $order->save();

        } catch (\Exception $th) {
            DB::rollback();
             return response()->json(["code"=>500,"message"=>$th->getMessage()], 200);
        }

       
            DB::commit();
        return response()->json(["code"=>200], 200);
    }

    public function destroy(Order $order)
    {

        try {
            DB::beginTransaction();
            $order->delete();
        } catch (\Exception $th) {
            DB::rollback();
            return redirect()->back()->with('error','No se pudo completar la operacion.');
        }
        DB::commit();
        return redirect()->route('orders.index')
            ->with('success', 'Orden eliminada exitosamente.');
    }

    public function exportOrders(Request $request ){

        if($request->filled('id')){

            $global=Order::where('id',$request->id)->get();
        }else{
            $global=Order::all();
        }

        foreach ($global as  $value) {
            $value->weeks_element=json_decode($value->weeks_element);
        }

        return Excel::download(new ProfitabilityBusinessExport($global), Carbon::now()->toDateTimeString() . '-Orders.xlsx');
    }

     public function importExcelOrders(Request $request) 
    {
        // Excel::import(new OrdersImport, 'orders.xlsx');
        
        // return redirect('/')->with('success', 'All good!');

     

            Excel::import(new OrdersImport,$request->file('excelOrders'));

            return back()->with('success', 'Archivo cargado');
    
    }

     public function importExcelSuppliers(Request $request) 
    {

     

            Excel::import(new SuppliersImport,$request->file('excelSuppliers'));

            return back()->with('success', 'Archivo cargado');
    
    }

}
