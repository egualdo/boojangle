<section class="oficinas">

    <div class="container">
        {{-- <img src="homePublic/imgs/wiper-isologo.png" class="oficinas-logo"> --}}
        <div class="row">

            @foreach ( $directions as $d )
            <div class="col-6 col-sm-4 col-md-2 oficina">
                <div class="city-address">
                    {{$d->direc->acronym}}
                </div>
                <div class="city-subaddress">
                    {{$d->direc->subtitle}}
                </div>
                <div class="info-city">
                    <p>{{$d->direction}}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>