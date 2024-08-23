
<section class="soluciones">

    <div class="container">

        <div class="row">
            <div class="col-12">
                <h2>{{__("Clients")}}</h2>
                <div class="row solucion-data">
                    @foreach ( $clients as $cliente )
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 img-solucion">
                            <img src="{{$cliente->clients->photo}}">
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- <div class="col-12 col-sm-6 col-md-3">

            </div>
            <div class="col-12 col-sm-6 col-md-3">

            </div> --}}
        </div>
    </div>
</section>