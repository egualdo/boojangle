<link href="{{asset('homePublic/css/services-page/casos.css')}} " rel="stylesheet">
<section class="casos-service">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="casos-color">
                    <div class="bg-color">
                        <h2>Casos relacionados </h2>
                    </div>
                    <div class="row casos-cont">
                        @foreach ($casosRelacionados as $related )
                            <div class="col-lg-4 p-3">
                                <a style="text-decoration: none;color:black" href="{{ route('detailCases',[$idiom,$related->project->id]) }}">
                                
                                    <img src="{{$related->project->photo}}" class="img-fluid">
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>
                <!--
                <div class="mensaje">
                        <p>
                        Onsequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.
                        </p>
                    </div> -->
            </div>
        </div>
    </div>
</section>