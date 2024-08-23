<section class="servicios">
    <div class="container">
        <h2>{{__("What we do")}}</h2>
        <hr class="hr-title-h2">
        <div class="position-blue-btn">
            <a>
                <div class="btn-top-blue">
                    {{__("Next")}}
                    <div class="blue-btn">
                        <img src="homePublic/imgs/right-arrow-dark.png">
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="servicios-slide">
                        @foreach ( $servicios as $s )
                                    <div class="servicio-unidad" id="{{$s->id}}" >
                                         <a style="text-decoration: none;color: black" id="{{$s->id}}" 
                                            href="{{ route('detailService',[App\Models\Idiom::where('id',$s->idiom_id)->first()->acronym,$s->service_id]) }}">
                            
                                        <img src="{{ $s->service->photo }}" class="img-thumbnail"/>
                                        <hr class="color-line">
                                        <div class="info-servicio">
                                            <h5>{{$s->title}}</h5>
                                            <p>
                                            
                                            {!!  substr(strip_tags($s->description), 0, 200).'...'!!}
                                            </p>
                                            {{-- <p>{{Str::limit($s->description, 200, $end='...')}}</p> --}}
                                        </div>
                                         </a>
                                    </div>
                        @endforeach
                    </div>
                </div>

                <div class="row">
                    <div class="controles">
                        <div class="preview">
                            <img id="play-preview2" src="homePublic/imgs/arrow-control.png">
                        </div>
                        <div class="play">
                            <img id="play-equipo2" style="display:none" src="homePublic/imgs/play.png">
                            <img id="pause-equipo2" src="homePublic/imgs/pause.png">
                        </div>
                        <div class="next">
                            <img id="play-next2" src="homePublic/imgs/arrow-control.png">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>