@extends('panel.layouts.simple.master')
@section('title', 'Create Module Type')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3> {{__('Create')}} {{__('Orders')}}</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item" > <a href="{{ route('orders.index') }}" style="text-decoration: none">{{__('Orders')}}</a></li>
    <li class="breadcrumb-item active"> {{__('Create')}} {{__('Orders')}}</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="edit-profile">
        <div class="row">

            <div class="col-xl-12">
                {{-- <form method="POST" action="{{ route('orders.store') }}" enctype="multipart/form-data" class="card"> --}}
                <div class="card">
                     <input type="text" id="token" hidden value="{{ csrf_token() }}" />
                    {{-- <div class="card-header">
                        <div class="card-options"><a class="card-options-collapse" href="#"
                                data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                    class="fe fe-x"></i></a>
                        </div>
                    </div> --}}

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="supplier_id" class="form-label">{{ __('Supplier') }}</label>

                                <div class="col-md-12">
                                    <select name="supplier_id" id="supplier_id" class="form-control select2">
                                    @foreach ($suppliers as $supplier )
                                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                    @endforeach
                                    </select>

                                  
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="quantity" class="form-label">{{ __('Quantity') }}</label>

                                <div class="col-md-12">
                                    <input id="quantity" type="number" min="0"
                                        class="form-control" name="quantity"
                                        value="{{ old('quantity') }}" autocomplete="name" autofocus>

                                  
                                </div>
                            </div>
                             <div class="col-md-6 mb-3">
                                <label for="weeks" class="form-label">{{ __('Weeks') }}</label>

                                <div class="col-md-12">
                                    <input id="weeks" type="number" min="0"
                                        class="form-control" name="weeks"
                                        value="{{ old('weeks') }}" autocomplete="weeks" autofocus>

                                  
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="average" class="form-label">{{ __('Average') }}</label>

                                <div class="col-md-12">
                                    <input id="average" type="text" disabled 
                                        class="form-control" name="average"
                                        value="{{ old('average') }}" />

                                  
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="date"
                                    class="form-label">{{ __('Date') }}</label>

                                <div class="col-md-12">
                                    <input id="date" type="date" 
                                        class="form-control"
                                        name="date">{{ old('date') }}

                                   
                                </div>
                            </div>


                             <div class="col-md-6 mb-3">
                                <label for="avgquantity" class="form-label">{{ __('Selling Average') }}</label>

                                <div class="col-md-12">
                                    <input id="avgquantity" type="text" readonly 
                                        class="form-control" name="avgquantity"
                                          />

                                   
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="avgtotal" class="form-label">{{ __('Total Average') }} %</label>

                                <div class="col-md-12">
                                    <input id="avgtotal" type="text" readonly 
                                        class="form-control"  name="avgtotal"
                                           />

                                   
                                </div>
                            </div>

                            <div class="col-md-12" >
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row" id="weeks_dinamic">
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-primary" onclick="storeOrder()">{{ __('Save') }}</button>
                    </div>
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
    var oldweeks=0;

        function addElement(param) {

            for (let index2 = 1; index2 <= param; index2++) {
                    $('#weeks_dinamic').append(
                        '<div class="col-md-6" style="text-align: center" id="columns-'+index2+'">'
                    );
                
                    $('#columns-'+index2).append(
                    '<br>',
                    '<label class="form-control-label" >{{__("Week")}} '+index2+'</label>',
                    '<input type="number" class="form-control" placeholder="{{__("Quantity")}}" data-id="quantity_'+index2+'" id="quantity_'+index2+'">',
                    '<label class="form-control-label" >{{__("Growth")}} %</label>',
                    '<input type="number" readonly class="form-control" data-id="average_'+index2+'" id="average_'+index2+'">',
                    '<br>',
                    '<a type="button" class="btn btn-primary" onclick="averageIndividual('+index2+')" id="save_'+index2+'">{{__("Save")}}</a>',
                  '</div>',
                ); 
            }
        }

        function deleteElement(paramId){
            var father = document.getElementById("weeks_dinamic");
            var child=document.getElementById('columns-'+paramId+'');
                                            
            if(child != null){
                father.removeChild(document.getElementById('columns-'+paramId+''));
            }
                 
        }

        $(document).ready(function() {

            $('.select2').select2();
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


                $('#avgquantity').val(totalq)
                $('#avgtotal').val(totalavg)
                
                
                oldweeks=$(this).val();

                for (let ind = 0; ind < weeks_selected.length; ind++) {
                    if($('#columns-'+weeks_selected[ind]+'').length){
                            averageIndividual(weeks_selected[ind]);
                    }else{
                        
                        $('#weeks_dinamic').append(
                            '<div class="col-md-6" style="text-align: center" id="columns-'+weeks_selected[ind]+'">'
                        );
                
                        $('#columns-'+weeks_selected[ind]).append(
                             '<br>',
                            '<label class="form-control-label" >{{__("Week")}} '+weeks_selected[ind]+'</label>',
                            '<input type="number" class="form-control" placeholder="{{__("Quantity")}}" data-id="quantity_'+weeks_selected[ind]+'" id="quantity_'+weeks_selected[ind]+'">',
                            '<label class="form-control-label" >{{__("Growth")}} %</label>',
                            '<input type="number" readonly class="form-control" data-id="average_'+weeks_selected[ind]+'" id="average_'+weeks_selected[ind]+'">',
                            '<br>',
                            '<a type="button" class="btn btn-primary" onclick="averageIndividual('+weeks_selected[ind]+')" id="save_'+weeks_selected[ind]+'">{{__("Save")}}</a>',
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
            $('#average_'+id).val(avgindividual);

              let avgtotal=0;
                let avgquantity=0;

                for (let ind = 0; ind < weeks_selected.length; ind++) {
                    
                            if($('#quantity_'+weeks_selected[ind]).val() != null && $('#quantity_'+weeks_selected[ind]).val() !== ''
                            && $('#average_'+weeks_selected[ind]).val() != null && $('#average_'+weeks_selected[ind]).val() !== ''){

                                avgquantity=avgquantity+Number($('#quantity_'+weeks_selected[ind]).val());
                                avgtotal=avgtotal+Number($('#average_'+weeks_selected[ind]).val());
                            }
                }

                let totalq=avgquantity/$('#weeks').val();
                let totalavg=((totalq/$('#average').val())-1)*100;

                $('#avgquantity').val(totalq)
                $('#avgtotal').val(totalavg)
        }

         
        function storeOrder() {

            let supplier_id=$('#supplier_id').val()
            let quantity=Number($('#quantity').val())
            let weeks= Number($('#weeks').val())
            let date=$('#date').val()
            let average=Number($('#average').val())
            let obj_commit=[];

            for (let i = 0; i < weeks_selected.length; i++) {
                let obj={};
                obj.name=     'week'+weeks_selected[i];
                obj.quantity =  Number($('#quantity_'+weeks_selected[i]).val());
                obj.average =   Number($('#average_'+weeks_selected[i]).val());
                obj_commit.push(obj);
            }

            let avgxsemana=Number($('#avgquantity').val()); 
            let avgtotal=Number($('#avgtotal').val());

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
                            url: '{{ route('orders.store') }}',
                            headers: {
                            'X-CSRF-TOKEN': $('#token').val()
                            },
                            method: 'POST',
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