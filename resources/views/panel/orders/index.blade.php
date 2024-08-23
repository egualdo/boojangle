@extends('panel.layouts.simple.master')
@section('title', 'Orders')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>{{__('List')}} {{__('Orders')}}</h3> <br>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item" ><a href="{{ route('orders.index') }}" style="text-decoration: none">{{__('Orders')}}</a></li>
<li class="breadcrumb-item active">{{__('Create')}} {{__('Orders')}}</li>
@endsection

@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h4>{{__('New Element')}} <a class="btn btn-outline-success" href="{{ route('orders.create') }}">{{__('here.')}}</a></h4>
            </div>
            <div class="col-md-6">
                <button type="button" id="buttonexcel" class="btn btn-outline-info" onclick="excelupload()">cargar excel</button>
            </div>
        </div>

                
        <div class="row">
            <div class="col-md-12">
            
                <div id="excel" style="display: none">
            
                <div class="row">
                    <div class="col-6 col-md-6 ">
                    
                        <br>
                        <form action="{{'import/excel/orders'}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST') 
                            {{-- <div class="form-group"> --}}
                            
                            <input  type="file" name="excelOrders" id="excelOrders" required class="custom-input-file">
                            <label for="excelOrders">
                                {{-- <i data="fa fa-upload"></i> --}}
                                {{-- <span>{{__('Choose a file…')}}</span> --}}
                            </label>
                            <br>
                            {{-- <button  class="btn btn-sm btn-secondary rounded-pill submitLoader" >{{__('Importar Gastos Excel')}}</button> --}}
                            <button type="submit" class="btn btn-outline-info"><i data-feather="file"></i>Subir Ordenes</button>
                        {{-- </div> --}}
                        </form>
                    </div>

                    <div class="col-6 col-md-6 ">
                    
                        <br>
                        <form action="{{'import/excel/suppliers'}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST') 
                            {{-- <div class="form-group"> --}}
                            
                            <input  type="file" name="excelSuppliers" id="excelSuppliers" required class="custom-input-file">
                            <label for="excelSuppliers">
                                {{-- <i data="fa fa-upload"></i> --}}
                                {{-- <span>{{__('Choose a file…')}}</span> --}}
                            </label>
                            <br>
                            {{-- <button  class="btn btn-sm btn-secondary rounded-pill submitLoader" >{{__('Importar Gastos Excel')}}</button> --}}
                            <button type="submit" class="btn btn-outline-info"><i data-feather="file"></i> Subir Proveedores</button>
                        {{-- </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
</div>
  <br>

    


    @if ($orders !== null && $orders->count() > 0)
    <div class="table-responsive">
        <table class="table table-striped">
            <thead style="background-color:firebrick">
                <tr>
                    <th style="color:antiquewhite">ID</th>
                    <th style="color:antiquewhite">{{__('Supplier')}}:</th>
                    <th style="color:antiquewhite">{{__('Quantity')}}:</th>
                    <th style="color:antiquewhite">{{__('Weeks')}}:</th>
                    <th style="color:antiquewhite">{{__('Average')}}:</th>
                    <th style="color:antiquewhite">{{__('Date')}}:</th>
                    <th style="color:antiquewhite">{{__('Selling Average')}}:</th>
                    <th style="color:antiquewhite">{{__('Growth')}} </th>
                    <th style="color:antiquewhite">{{__('Edit')}}:</th>
                    <th style="color:antiquewhite">{{__('Show')}}:</th>
                    <th style="color:antiquewhite">{{__('Delete')}}:</th>
                    <th style="color:antiquewhite">{{__('Export')}}:</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $module)
                    <tr>
                            <th>{{ $module->id }}</th>

                            @if($module->supplier_id)
                            <th>{{ App\Models\Supplier::find($module->supplier_id)->name }}</th>
                            @else
                            <th>-</th>
                            @endif

                            @if($module->quantity)
                            <th>{{ $module->quantity }}</th>
                            @else
                            <th>-</th>
                            @endif

                            @if($module->weeks)
                            <th>{{ $module->weeks }}</th>
                            @else
                            <th>-</th>
                            @endif

                            @if($module->average)
                            <th>{{ $module->average }}</th>
                            @else
                            <th>-</th>
                            @endif

                            @if($module->date)
                            <th>{{ $module->date }}</th>
                            @else
                            <th>-</th>
                            @endif

                            @if($module->avgquantity)
                            <th>{{ $module->avgquantity }}</th>
                            @else
                            <th>-</th>
                            @endif

                            @if($module->avgtotal)
                            <th>{{ $module->avgtotal }} %</th>
                            @else
                            <th> -  %</th>
                            @endif

                    
                            <th class="counter"><a href="{{ route('orders.edit', $module->id) }}"
                                    class="btn btn-outline-primary"><i data-feather="edit-2"></i></a>
                            </th>
                            
                            <th class="counter"><a href="{{ route('orders.show', $module->id) }}" class="btn btn-outline-info"><i
                                        data-feather="eye"></i></a>
                            </th>

                            <th><span class="counter">
                                    <form action="{{ route('orders.destroy', $module->id) }}" method="POST"
                                        style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger"
                                            onclick="return confirm('¿Estás seguro de que deseas eliminar este tipo de modulo?')"><i
                                                data-feather="trash-2"></i></button>
                                    </form>
                                </span>
                            </th>

                            <th><span class="counter">
                                    <form action="{{ route('orders.exportOrders', $module->id) }}" method="POST"
                                        style="display: inline-block">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-outline-success"><i data-feather="file"></i></button>
                                    </form>
                                </span>
                            </th>

                           
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p>No se encontraron modulos</p>
    @endif

</div>
@endsection

@section('script')

<script>
    function excelupload(){
        var x = document.getElementById("excel");
        
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        // $('#excel').removeAttr('hidden');
        // $('#manual').attr('hidden',true);
       
        // $('#buttonexcel').attr('hidden', true);
    }


   
</script>
@endsection