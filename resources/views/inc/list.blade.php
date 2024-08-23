                                
                                @if (count($orders)>0 && $orders[0]->date == "none")
                                 <div class="row">
                              
                                    <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped ">
                                                    <thead style="background-color:#cd001a !important">
                                                        <tr>
                                                            <th style="color:antiquewhite">ID5</th>
                                                            <th style="color:antiquewhite">{{__('Supplier')}}:</th>
                                                    
                                                            <th style="color:antiquewhite">{{__('Quantity')}}:</th>
                                                            <th style="color:antiquewhite">{{__('Growth')}} </th>
                                                        
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @for ($i = 0; $i < count($orders); $i++)
                                                        @if (($i % 2) == 0)
                                                            <tr style="background-color:yellow">
                                                        @else
                                                            <tr style="background-color: white">
                                                        @endif

                                                                    <th>{{ $orders[$i]->id }}</th>

                                                                    @if($orders[$i]->supplier_id)
                                                                    <th>{{ App\Models\Supplier::find($orders[$i]->supplier_id)->name }}</th>
                                                                    @else
                                                                    <th>-</th>
                                                                    @endif
                                                                  
                                                                    @if($orders[$i]->avgquantity)
                                                                    <th>{{ (int)$orders[$i]->avgquantity }}</th>
                                                                    @else
                                                                    <th>-</th>
                                                                    @endif

                                                                    @if($orders[$i]->avgtotal)
                                                                    <th>{{ $orders[$i]->avgtotal }} %</th>
                                                                    @else
                                                                    <th> -  %</th>
                                                                    @endif
                                                        </tr>
                                                    @endfor
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                          

                                    </div>
                                
                                </div>
                                

                                @endif
                                @if (count($orders)>0 && $orders[0]->date != "none")
                                    
                                    <div class="row">
                   
                                        <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-striped ">
                                                        <thead style="background-color:#cd001a !important">
                                                            <tr>
                                                                <th style="color:antiquewhite">ID</th>
                                                                <th style="color:antiquewhite">{{__('Supplier')}}:</th>
                                                                <th style="color:antiquewhite">{{__('Quantity')}}:</th>
                                                                <th style="color:antiquewhite">{{__('Weeks')}}:</th>
                                                                <th style="color:antiquewhite">{{__('Average')}}:</th>
                                                                <th style="color:antiquewhite">{{__('Date')}}:</th>
                                                                <th style="color:antiquewhite">{{__('Selling Average')}}:</th>
                                                                <th style="color:antiquewhite">{{__('Growth')}} </th>
                                                            
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @for ($i = 0; $i < count($orders); $i++)
                                                            @if (($i % 2) == 0)
                                                                <tr style="background-color:yellow">
                                                            @else
                                                                <tr style="background-color: white">
                                                            @endif

                                                                        <th>{{ $orders[$i]->id }}</th>

                                                                        @if($orders[$i]->supplier_id)
                                                                        <th>{{ App\Models\Supplier::find($orders[$i]->supplier_id)->name }}</th>
                                                                        @else
                                                                        <th>-</th>
                                                                        @endif

                                                                        @if($orders[$i]->quantity)
                                                                        <th>{{ (int)$orders[$i]->quantity }}</th>
                                                                        @else
                                                                        <th>-</th>
                                                                        @endif

                                                                        @if($orders[$i]->weeks)
                                                                        <th>{{ $orders[$i]->weeks }}</th>
                                                                        @else
                                                                        <th>-</th>
                                                                        @endif

                                                                        @if($orders[$i]->average)
                                                                        <th>{{ $orders[$i]->average }}</th>
                                                                        @else
                                                                        <th>-</th>
                                                                        @endif

                                                                        @if($orders[$i]->date)
                                                                        <th>{{ $orders[$i]->date }}</th>
                                                                        @else
                                                                        <th>-</th>
                                                                        @endif

                                                                        @if($orders[$i]->avgquantity)
                                                                        <th>{{ (int)$orders[$i]->avgquantity }}</th>
                                                                        @else
                                                                        <th>-</th>
                                                                        @endif

                                                                        @if($orders[$i]->avgtotal)
                                                                        <th>{{ $orders[$i]->avgtotal }} %</th>
                                                                        @else
                                                                        <th> -  %</th>
                                                                        @endif
                                                            </tr>
                                                        @endfor
                                                        
                                                        </tbody>
                                                    </table>
                                                </div>
                                            

                                        </div>
                                   
                                    </div>
                                @endif

                                @if (count($orders)==0)
                                    <div class="row">
                                        <div class="col-md-12" >
                                        
                                        <h2 style="text-align: center">No se han encontrado Registros</h2>
                                        </div>
                                    </div>
                                @endif