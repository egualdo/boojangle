@extends('panel.layouts.simple.master')
@section('title', 'Edit Orders')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3> {{__('Edit')}} {{__('Orders')}}</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item" > <a href="{{ route('orders.index') }}" style="text-decoration: none">{{__('Orders')}}</a></li>
<li class="breadcrumb-item active"> {{__('Edit')}} {{__('Orders')}}</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="edit-profile">
        <div class="row">

            <div class="col-xl-12">
                {{-- <form method="POST" action="{{ route('orders.update', $order->id) }}" enctype="multipart/form-data" --}}
                    {{-- class="card"> --}}
                     <input type="text" id="token" hidden value="{{ csrf_token() }}" />
                    {{-- @csrf --}}
                    {{-- @method('PUT') --}}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="supplier_id" class="form-label">{{ __('Supplier') }}</label>

                                <div class="col-md-12">
                                    <select name="supplier_id" id="supplier_id" class="form-control select2">
                                    @foreach ($suppliers as $supplier )
                                        <option value="{{$supplier->id}}" {{$order->supplier_id==$supplier->id ? 'selected':''}}>{{$supplier->name}}</option>
                                    @endforeach
                                    </select>

                                    @error('supplier_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="quantity" class="form-label">{{ __('Quantity') }}</label>

                                <div class="col-md-12">
                                    <input id="quantity" type="number" min="0"
                                        class="form-control @error('quantity') is-invalid @enderror" name="quantity"
                                         value="{{ old('quantity', $order->quantity) }}" autocomplete="name" autofocus>

                                    @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="weeks" class="form-label">{{ __('Weeks') }}</label>

                                <div class="col-md-12">
                                    <input id="weeks" type="number" min="0"
                                        class="form-control @error('weeks') is-invalid @enderror" name="weeks"
                                         value="{{ old('weeks', $order->weeks) }}"  autocomplete="weeks" autofocus>

                                    @error('weeks')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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
                                    <input id="date" type="date" value="{{$order->date}}"
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

                           
                        <div class="row" id="weeks_dinamic" hidden>
                           @for ($i = 0; $i < count($order->weeks_element); $i++)
                               
                            <div class="col-6 col-md-6 mb-3">
                                <h1>{{$order->weeks_element[$i]->name}}</h1>
                                <?php 
                                $idweek=str_replace("week","",$order->weeks_element[$i]->name);
                               
                                ?>
                                <label for="week" name={{$order->weeks_element[$i]->name}} class="form-label">{{ __('Quantity') }}</label>

                               
                                    <input id="quantity_old{{$idweek}}" type="number" 
                                        class="form-control"  name="quantity_{{$idweek}}"
                                        data-id="{{$idweek}}"
                                        value="{{ $order->weeks_element[$i]->quantity }}" >
                                      
                                        </input>


                                 <label for="average" class="form-label">{{__('Average')}}</label>

                             
                                    <input id="average_old{{$idweek}}" type="number" 
                                        class="form-control " name="average_{{$idweek}}"
                                        value="{{  $order->weeks_element[$i]->average }}" >
                                        </input>

                                   
                                    
                                <br>
                                {{-- <div class="col-md-12">
                                    <a type="button" class="btn btn-primary" onclick="averageIndividual({{$idweek}})" id="save_{{$idweek}}">Guardar</a>
                                    <a type="button" class="btn btn-secondary" style="margin-left:5%" onclick="deleteElement({{$idweek}})" id="delete_{{$idweek}}">Eliminar Semana</a>
                                </div> --}}
                            </div>

                           @endfor
                        </div> 

                          <div class="col-md-12" >
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row" id="weeks_dinamic2" >
                                        </div>
                                    </div>
                                
                                </div>
                            </div>

                         
                          
                   
            </div>
            <div class="card-footer text-end">
                {{-- <button class="btn btn-primary" type="submit">{{ __('Edit') }}</button> --}}
                 <button class="btn btn-primary" onclick="editOrder()">{{ __('Edit') }}</button>
            </div>
            {{-- </form> --}}
        </div>

    </div>
</div>
</div>


@endsection

@section('script')
<script>
    var weeks_selected=[];
    var oldweeks="{{$order->weeks}}";
    var elements_compuestos=[];

        function dinamicElements() {
             
                  
            let sizeaux=elements_compuestos.length
            let aux=elements_compuestos
            console.log("val",elements_compuestos);
                    
                for (let index2 = 0; index2 < sizeaux; index2++) {
                        // sum=sum+Number(aux[index2].budget)
                                $('#weeks_dinamic2').append(
                                    '<div class="col-6 col-md-6" style="text-align: center" id="columns-'+aux[index2].week_id+'">'
                                );
                             
                                $('#columns-'+aux[index2].week_id+'').append(
                                    '<br>',
                                    '<label class="form-control-label">{{__("Week")}}'+aux[index2].week_id+'</label>',
                                    '<input type="number" class="form-control" data-id="quantity_'+aux[index2].week_id+'" id="quantity_'+aux[index2].week_id+'" value='+aux[index2].quantity+'>' ,
                                    '<label class="form-control-label" >{{__("Growth")}} %</label>',
                                    '<input type="number" readonly class="form-control" data-id="average_'+aux[index2].week_id+'" id="average_'+aux[index2].week_id+'" value='+aux[index2].average+'>' ,
                                    '<br>',
                                    '<a type="button" class="btn btn-primary" onclick="averageIndividual('+aux[index2].week_id+')" id="save_'+aux[index2].week_id+'">{{__("Save")}}</a>',
                                    // '<a type="button" class="btn btn-secondary" style="margin-left:5%" onclick="deleteElement('+aux[index2].week_id+')" id="delete_'+aux[index2].week_id+'">{{__("Delete")}} {{__("Week")}}</a>',
                                    '</div>',
                                    // '</div>',
                                ); 

                            // const input = document.querySelector("input");//input a modificar
                            // const log = document.getElementById('projectitem'+aux[index2].area_id);//elemento a clonar la info

                            // log.addEventListener("input", updateValue);
                }
        }

        function addElement(param) {

            for (let index2 = 1; index2 <= param; index2++) {
                    $('#weeks_dinamic2').append(
                        '<div class="col-6 col-md-6" style="text-align: center" id="columns-'+index2+'">'
                    );
                
                    $('#columns-'+index2).append(
                    '<br>',
                    '<label class="form-control-label" >{{__("Week")}} '+index2+'</label>',
                    '<input type="number" class="form-control" placeholder="{{__("Quantity")}}" data-id="quantity_'+index2+'" id="quantity_'+index2+'">',
                    '<label class="form-control-label" >{{__("Growth")}} %</label>',
                    '<input type="number" readonly class="form-control" data-id="average_'+index2+'" id="average_'+index2+'">',
                    '<br>',
                    '<a type="button" class="btn btn-primary" onclick="averageIndividual('+index2+')" id="save_'+index2+'">{{__("Save")}}</a>',
                    // '<a type="button" class="btn btn-secondary" style="margin-left:5%" onclick="deleteElement('+index2+')" id="delete_'+index2+'">{{__("Delete")}} {{__("Week")}}</a>',
                    '</div>',
                    // '</div>',
                ); 
            }
        }

        function deleteElement(paramId){
            var father = document.getElementById("weeks_dinamic2");
            var child=document.getElementById('columns-'+paramId+'');
                                            
            if(child != null){
                father.removeChild(document.getElementById('columns-'+paramId+''));
            }
                 
        }

        $(document).ready(function() {

            $('.select2').select2();

            @if ($order)
                var obj  = '{{ $order->weeks }}';
                // console.log(obj)
               
                for (let l = 0; l < obj; l++) {
                    weeks_selected.push(l+1);
                }
            @endif
            
            for (let p = 0; p < weeks_selected.length; p++) {
                 let obj={};
                 obj.week_id=weeks_selected[p];
             
                 obj.quantity=$('#quantity_old'+weeks_selected[p]).val();
                 obj.average=$('#average_old'+weeks_selected[p]).val();
                 elements_compuestos.push(obj)
            }
            dinamicElements();
            
        });


       

        $('#quantity').change(function() {
           
                average($(this).val(),$('#weeks').val());

                let avgtotal=0;
                let avgquantity=0;

                for (let ind = 0; ind < weeks_selected.length; ind++) {
                    
                            averageIndividual(weeks_selected[ind]);
                            avgquantity=avgquantity+Number($('#quantity_'+weeks_selected[ind]).val());
                            avgtotal=avgtotal+Number($('#average_'+weeks_selected[ind]).val());
                }

                let totalq=avgquantity/$('#weeks').val();
                let totalavg=((totalq/$('#average').val())-1)*100;

                $('#avgquantity').val(totalq)
                $('#avgtotal').val(totalavg)
        });

        $('#weeks').change(function() {

               
            if(oldweeks == 0){
                if($(this).val() > 0){
                    average($('#quantity').val(),$(this).val());
                    addElement($(this).val());
                    for (let index = 0; index < $(this).val(); index++) {
                        weeks_selected.push(index+1);
                    }
                    oldweeks=$(this).val();
                }
            }else if (oldweeks > 0 &&  $(this).val() > oldweeks){
               
                average($('#quantity').val(),$(this).val());

                weeks_selected=[];
                for (let w = 0; w < $(this).val(); w++) {
                     weeks_selected.push(w+1);
                }
                 
                let avgtotal=0;
                let avgquantity=0;

                for (let ind = 0; ind < weeks_selected.length; ind++) {
                    
                            averageIndividual(weeks_selected[ind]);
                            if($('#quantity_'+weeks_selected[ind]).val() != null && $('#quantity_'+weeks_selected[ind]).val() !== ''
                            && $('#average_'+weeks_selected[ind]).val() != null && $('#average_'+weeks_selected[ind]).val() !== ''){

                                avgquantity=avgquantity+Number($('#quantity_'+weeks_selected[ind]).val());
                                avgtotal=avgtotal+Number($('#average_'+weeks_selected[ind]).val());
                            }
                            
                }

                let totalq=avgquantity/$('#weeks').val();
                let totalavg=((totalq/$('#average').val())-1)*100;

                // console.log(totalq,totalavg);

                $('#avgquantity').val(totalq)
                $('#avgtotal').val(totalavg)


                oldweeks=$(this).val();

                for (let ind = 0; ind < weeks_selected.length; ind++) {
                    if($('#columns-'+weeks_selected[ind]+'').length){
                            averageIndividual(weeks_selected[ind]);
                    }else{
                        
                        $('#weeks_dinamic2').append(
                            '<div class="col-6 col-md-6" style="text-align: center" id="columns-'+weeks_selected[ind]+'">'
                        );
                
                        $('#columns-'+weeks_selected[ind]).append(
                            '<br>',
                            '<label class="form-control-label" >{{__("Week")}} '+weeks_selected[ind]+'</label>',
                            '<input type="number" class="form-control" placeholder="{{__("Quantity")}}" data-id="quantity_'+weeks_selected[ind]+'" id="quantity_'+weeks_selected[ind]+'">',
                            '<label class="form-control-label" >{{__("Growth")}} %</label>',
                            '<input type="number" readonly class="form-control" data-id="average_'+weeks_selected[ind]+'" id="average_'+weeks_selected[ind]+'">',
                            '<br>',
                            '<a type="button" class="btn btn-primary" onclick="averageIndividual('+weeks_selected[ind]+')" id="save_'+weeks_selected[ind]+'">{{__("Save")}}</a>',
                            // '<a type="button" class="btn btn-secondary" style="margin-left:5%" onclick="deleteElement('+weeks_selected[ind]+')" id="delete_'+weeks_selected[ind]+'">{{__("Delete")}} {{__("Week")}}</a>',
                            '</div>',
                        ); 
                    }

                }
            }else if (oldweeks > 0 &&  $(this).val() < oldweeks){

                weeks_selected2=weeks_selected.filter(i => i !== Number($(this).val()))
                average($('#quantity').val(),$(this).val());
                oldweeks= $(this).val();
                
                for (let j = 0; j < weeks_selected2.length; j++) {
                     let last_id=weeks_selected2[j];
                        deleteElement(last_id)
                        weeks_selected.pop()
                }
                 
                let avgtotal=0;
                let avgquantity=0;

                for (let ind = 0; ind < weeks_selected.length; ind++) {
                    
                            averageIndividual(weeks_selected[ind]);
                            avgquantity=avgquantity+Number($('#quantity_'+weeks_selected[ind]).val());
                            avgtotal=avgtotal+Number($('#average_'+weeks_selected[ind]).val());
                }

                let totalq=avgquantity/$('#weeks').val();
                let totalavg=((totalq/$('#average').val())-1)*100;

                $('#avgquantity').val(Number(totalq))
                $('#avgtotal').val(Number(totalavg))
            }

        });

        function average(quantity,weeks) {
            let avg= quantity/(weeks);
            $('#average').val(avg);
        }

        function averageIndividual(id) {
            let avgindividual= ( (( $('#quantity_'+id).val()/$('#average').val() ) - 1)*100 );
            $('#average_'+id+'').val(avgindividual);

                let avgtotal=0;
                let avgquantity=0;

                for (let ind = 0; ind < weeks_selected.length; ind++) {
                    
                            // averageIndividual(weeks_selected[ind]);
                            if($('#quantity_'+weeks_selected[ind]).val() != null && $('#quantity_'+weeks_selected[ind]).val() !== ''
                            && $('#average_'+weeks_selected[ind]).val() != null && $('#average_'+weeks_selected[ind]).val() !== ''){

                                avgquantity=avgquantity+Number($('#quantity_'+weeks_selected[ind]).val());
                                avgtotal=avgtotal+Number($('#average_'+weeks_selected[ind]).val());
                            }
                            
                }

                let totalq=avgquantity/$('#weeks').val();
                let totalavg=((totalq/$('#average').val())-1)*100;

                console.log(totalq,totalavg);

                $('#avgquantity').val(totalq)
                $('#avgtotal').val(totalavg)
            
        }

        function editOrder() {

            let supplier_id=$('#supplier_id').val()
            let quantity=Number($('#quantity').val())
            let weeks= Number($('#weeks').val())
            let average=$('#average').val()
            let date=$('#date').val()
            let obj_commit=[];

            for (let i = 0; i < weeks_selected.length; i++) {
                let obj={};
                obj.name=     'week'+weeks_selected[i];
                obj.quantity =  Number($('#quantity_'+weeks_selected[i]).val());
                obj.average =   Number($('#average_'+weeks_selected[i]).val());
                obj_commit.push(obj);
            }

           

            let avgxsemana=Number($('#avgquantity').val()); 
            let avgtotal=Number($('#avgtotal').val());// promedio porcentual con respecto a la media estipulada

            obj_commit=JSON.stringify(obj_commit)

                    let data= { 'supplier_id': supplier_id,
                                'quantity': quantity,
                                'weeks': weeks,
                                'date':date,
                                'obj_commit':obj_commit,
                                'avgquantity':avgxsemana,
                                'avgtotal':avgtotal,
                                'average':average,
                    };

                        $.ajax({
                            url: '{{ route('orders.update',$order->id) }}',
                            headers: {
                            'X-CSRF-TOKEN': $('#token').val()
                            },
                            method: 'PUT',
                            dataType: 'json',
                            data: data,
                            success: function (data) {
                            
                                if (data.code == 200) {
                                    toastr.success('Registro realizado correctamente!')
                                    setTimeout(() => {
                                        
                                    location.href='{{ route('orders.index') }}'
                                    }, 2000);

                                } else if(data.code == 422)  {
                                    toastr.warning('Registro realizado previamente!, por favor seleccione otro proveedor')

                                }else{
                                    toastr.error( 'error',data.message);
                                }
                            }
                        });
        }

</script>
@endsection