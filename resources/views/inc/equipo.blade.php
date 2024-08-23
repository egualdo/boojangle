<section class="equipo">
    <div class="container">
        <h2>{{__("Our staff")}}</h2>
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
                    <div class="team" style="margin-left:5%">
                        @foreach( $staff as $st )

                        <div class="team-member">
                            <a href="{{ route('stafff',[App\Models\Idiom::where('id',$st->idiom_id)->first()->acronym,$st->staff_id]) }}">
                            <div class="img-team" >

                                <img class="bg-img-team" src="homePublic/imgs/borde-team.png">
                                <img src="{{ $st->staff->photo }}" class="img-team-p" style="border-radius: 50%"/>
                                
                                <div class="team-redes">
                                    <a href="#">
                                        <?php echo file_get_contents("homePublic/imgs/icons/linkedin.svg"); ?>
                                    </a>
                                </div>

                            </div>

                            <div class="info-team">
                                <h5>{{$st->staff->name}}</h5>
                                <p>{!!$st->description!!}</p>
                            </div>

                        </a>
                        </div>

                        @endforeach
                    </div>

                </div>
                <div class="row">
                    <div class="controles">
                        <div class="preview">
                            <img id="play-preview" src="homePublic/imgs/arrow-control.png">
                        </div>
                        <div class="play">
                            <img id="play-equipo" style="display:none" src="homePublic/imgs/play.png">
                            <img id="pause-equipo" src="homePublic/imgs/pause.png">
                        </div>
                        <div class="next">
                            <img id="play-next" src="homePublic/imgs/arrow-control.png">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>