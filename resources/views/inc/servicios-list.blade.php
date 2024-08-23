
<section class="servicios-list" style="padding-top: 1rem !important">

    <div class="container">
          <h2>{{__("Services")}}</h2>
     
        <div class="row">
            
            @foreach ( $servicios as $s )
                 <div class="col-lg-4 item-servicios">
                    
                    <div class="card-servicios">
                        <a style="text-decoration: none;color: black" id="{{$s->id}}" 
                            href="{{ route('detailService',[App\Models\Idiom::where('id',$s->idiom_id)->first()->acronym,$s->service_id]) }}">
                            
                            
                            <h2>{{$s->title}}</h2>
                            <hr>
                            {{-- <p>{{Str::limit($s->description, 250, $end='...')}}</p> --}}
                             {{-- <p>{!! substr($s->description, 0, 250).'...'!!}</p> --}}
                             <p>{!!  substr(strip_tags($s->description), 0, 200).'...'!!}</p>
                        </a>
                    </div>
                </div>
               
            @endforeach
           
        </div>
    </div>
</section>

<script>

</script>
