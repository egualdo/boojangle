<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
      public function index()
    {
        $suppliers = Supplier::all();
        // dd($users);
        return view('panel.supplier.index', compact('suppliers'));
    }

    public function create()
    {
        // $roles = Role::all();
        return view('panel.supplier.create');
    }

     public function show($id)
    {
        $supplier = Supplier::find($id);
        return view('panel.supplier.show',compact('supplier'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $supplier = new Supplier;
            $supplier->name = $request->name;
            $supplier->address = $request->address;
            $supplier->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error', 'No se pudo completar la Operacion');
        }

        return redirect()->route('supplier.index')->with('success', 'Proveedor creado satisfactoriamente');
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        // $roles = Role::all();
        return view('panel.supplier.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        try {
             DB::beginTransaction();
            $supplier = Supplier::find($id);
            $supplier->name = $request->name;
            $supplier->address = $request->address;
           
            $supplier->save();

        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error','No se pudo completar la operacion');
        }
         DB::commit();
        return redirect()->route('supplier.index')->with('success', 'Proveedor actualizado satisfactoriamente');
    }

    public function destroy($id)
    {   

        try {
             DB::beginTransaction();
            $user = Supplier::find($id);
            $user->delete();
        } catch (\Throwable $th) {
             DB::rollBack();
             return redirect()->back()->with('error', 'No se pudo completar la operacion');
        }
         DB::commit();
         return redirect()->route('supplier.index')->with('success', 'Proveedor eliminado satisfactoriamente');
        
    }
}
