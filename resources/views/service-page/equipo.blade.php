
<link href="{{asset('homePublic/css/services-page/equipo.css')}}" rel="stylesheet">
<section class="seccion-servicios procesos">
    <div class="container">
        <div class="row" >
            <div class="col-12">
                <div class="title">
                    <h2>Equipo</h2>
                </div>
            </div>
            <div class="col-12 ">
                <div class="row"  >
                    
                @for($i = 0; $i < count($modulesIdiom); $i ++)
                    @if(App\Models\ModuleType::where('id',$modulesIdiom[$i]->module_type_id)->first()->name  =="equipo servicios")
                            <div class="col-lg-6 equipo" style={{$modulesIdiom[$i]->color=='dark' ? 'background:#60607F;color:#AEAECE':'background: #ADAECF;color: #212529'}}>
                               
                                {!!json_decode($modulesIdiom[$i]->html)!!}        
                                
                            </div>
                    @endif
                @endfor
                </div>  
            </div>
        </div>
        
    </div>
</section>