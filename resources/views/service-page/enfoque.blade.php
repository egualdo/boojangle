<link href="{{asset('homePublic/css/services-page/secciones.css')}}" rel="stylesheet">
<link href="{{asset('homePublic/css/services-page/enfoque.css')}}" rel="stylesheet">
<section class="seccion-servicios bg-seccion-dark">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title">
                    <h2>Enfoque</h2>
                </div>
            </div>
            <div class="col-12 enfoque">
                <div class="row">
                @foreach ($modulesIdiom as $serv)
                    @if( App\Models\ModuleType::where('id',$serv->module_type_id)->first()->name  =="enfoque servicios")
                         {!!json_decode($serv->html)!!}
                    @endif
                @endforeach
                    {{-- <div class="col-lg-4 enfoque-cont">
                        <h3>Problem Solving</h3>
                        <p>
                            Entendimiento del problema a resolver para poder alcanzar el objetivo de la estrategia. 
                        </p>
                    </div>
                    <div class="col-lg-4 enfoque-cont">
                        <h3>Colaborativo</h3>
                        <p>
                            Generación de sinergia entre los conocimientos del cliente  sobre su producto, marca,
                            empresa y mercado, con la visión amplia y el conocimiento que tiene Wiper cómo agencia de
                            publicidad y comunicación. 
                        </p>
                    </div>
                    <div class="col-lg-4 enfoque-cont">
                        <h3>Consumer Centric</h3>
                        <p>
                            Comprensión del problema estratégico a partir de su génesis  en lo relevante que es la
                            marca, producto o empresa para su público objetivo. 

                        </p>
                    </div>
                    <div class="col-lg-4 enfoque-cont">
                        <h3>Consumer Centric</h3>
                        <p>
                            Comprensión del problema estratégico a partir de su génesis  en lo relevante que es la
                            marca, producto o empresa para su público objetivo. 

                        </p>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>