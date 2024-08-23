<link href="{{asset('homePublic/css/services-page/secciones.css')}}" rel="stylesheet">
<link href="{{asset('homePublic/css/services-page/herramientas.css')}}" rel="stylesheet">
<section class="seccion-servicios procesos">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title">
                    <h2>Procesos</h2>
                </div>
            </div>
            <div class="col-12 ">
                @foreach ($modulesIdiom as $process)
                     @if( App\Models\ModuleType::where('id',$process->module_type_id)->first()->name  =="proceso servicios")
                         {!!json_decode($process->html)!!}
                    @endif
                @endforeach
                

                

                {{-- <div class="row" >
                        <div class="col-lg-4 elements">
                           
                            <div class="elements-button" style="background:var(--main-blue)">
                                <h1 class="elements-button-text">Proceso2</h1>
                            </div>
                        </div>
                        <div class="col-lg-8 elements-p">
                            <p>
                                Generación de sinergia entre los conocimientos del cliente  sobre su producto, marca,
                                empresa y mercado, con la visión amplia y el conocimiento que tiene Wiper cómo agencia de
                                publicidad y comunicación. 
                            </p>
                        </div>
                </div> --}}

                {{-- <div class="row" >
                   
                    <div class="col-lg-4 elements">
                       
                        <button class="elements-button" style="background:var(--main-blue)">Proceso3</button>
                       
                    </div>
                    <div class="col-lg-8 elements-p">
                         <p>
                            Comprensión del problema estratégico a partir de su génesis  en lo relevante que es la
                            marca, producto o empresa para su público objetivo. 

                        </p>
                    </div>
                </div> --}}
                   
            </div>
        </div>
        
    </div>
</section>