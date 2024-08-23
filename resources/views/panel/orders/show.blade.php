@extends('panel.layouts.simple.master')
@section('title', 'Show Order')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3> {{__('Show')}} {{__('Order')}}</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item" ><a href="{{ route('orders.index') }}" style="text-decoration: none">{{__('Orders')}}</a> </li>
<li class="breadcrumb-item active"> {{__('Show')}} {{__('Order')}}</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="edit-profile">
        <div class="row">

            <div class="col-xl-12">
                {{-- <form method="POST" action="{{ route('orders.update', $moduleType->id) }}" enctype="multipart/form-data"
                    class="card"> --}}
                    <div class="card">

                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        {{-- <h4 class="card-title mb-0">{{ __('Show Module') }}</h4> --}}
                        {{-- <div class="card-options"><a class="card-options-collapse" href="#"
                                data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                    class="fe fe-x"></i></a></div> --}}
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="supplier_id" class="form-label">{{ __('Supplier') }}</label>

                                <div class="col-md-12">
                                    <select name="supplier_id" id="supplier_id" disabled class="form-control select2">
                                    @foreach ($suppliers as $supplier )
                                        <option value="{{$supplier->id}}" {{$order->supplier_id==$supplier->id ? 'selected':''}}>{{$supplier->name}}</option>
                                    @endforeach
                                    </select>

                                   
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="quantity" class="form-label">{{ __('Quantity') }}</label>

                                <div class="col-md-12">
                                    <input id="quantity" readonly type="number" min="0"
                                        class="form-control @error('quantity') is-invalid @enderror" name="quantity"
                                         value="{{ old('quantity', $order->quantity) }}" autocomplete="name" autofocus>

                                  
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="weeks" class="form-label">{{ __('Weeks') }}</label>

                                <div class="col-md-12">
                                    <input id="weeks" type="number" min="0" readonly
                                        class="form-control @error('weeks') is-invalid @enderror" name="weeks"
                                         value="{{ old('weeks', $order->weeks) }}"  autocomplete="weeks" autofocus>

                                   
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="average" class="form-label">{{ __('Average') }}</label>

                                <div class="col-md-12">
                                    <input id="average" type="text" readonly 
                                        class="form-control" name="average"
                                         value="{{$order->average}}"  />

                                   
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="date"
                                    class="form-label">{{ __('Date') }}</label>

                                <div class="col-md-12">
                                    <input id="date" type="date" readonly value="{{$order->date}}"
                                        class="form-control"
                                        name="date">

                                    
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="avgquantity" class="form-label">{{ __('Selling Average') }}</label>

                                <div class="col-md-12">
                                    <input id="avgquantity" type="text" readonly 
                                        class="form-control" name="avgquantity"
                                         value="{{$order->avgquantity}}"  />

                                   
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="avgtotal" class="form-label">{{ __('Total Average') }} %</label>

                                <div class="col-md-12">
                                    <input id="avgtotal" type="text" readonly 
                                        class="form-control"  name="avgtotal"
                                         value="{{$order->avgtotal}}"  />

                                   
                                </div>
                            </div>
                        </div>

                    <div class="card">
                    
                        <div class="row" id="weeks_dinamic" >

                           @for ($i = 0; $i < count($order->weeks_element); $i++)
                               
                            <div class="col-6 col-md-6 mb-3">
                                <h1>{{$order->weeks_element[$i]->name}}</h1>
                                {{-- <label for="week" name={{$order->weeks_element[$i]->name}} class="form-label">{{ __('Quantity') }}</label> --}}

                               
                                    <input id="quantity_old{{$i+1}}" type="number"  readonly
                                        class="form-control"  name="quantity_{{$i+1}}"
                                        data-id="{{$i+1}}"
                                        value="{{ $order->weeks_element[$i]->quantity }}" >
                                      
                                        </input>


                                 <label for="average" class="form-label">{{__('Growth')}}</label>

                             
                                    <input id="average_old{{$i+1}}" type="number" readonly
                                        class="form-control " name="average_{{$i+1}}"
                                        value="{{  $order->weeks_element[$i]->average }}" >
                                        </input>

                                   
                                    
                                <br>
                              
                            </div>

                           @endfor
                        </div> 
                    </div>

                          
                           
                    </div>
            </div>
            </div>
        </div>

    </div>
</div>
</div>


@endsection

@section('script')
<script>
function updateFields() {
    var selectedIdioms = $('#idiom_id').val();

    // Muestra todos los campos de idioma
    $('#idiom-fields > div').removeClass('d-none');

    // Oculta los campos que no corresponden a los idiomas seleccionados
    $('#idiom-fields > div').each(function() {
        var id = $(this).attr('id').replace('idiom-', '');
        if (selectedIdioms.indexOf(id) === -1) {
            $(this).addClass('d-none');
        }
    });
}

$(document).ready(function() {
    updateFields();

    $('#idiom_id').change(function() {
        updateFields();
    });
    $('.select2').select2();
});
</script>
@endsection