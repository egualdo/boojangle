@extends('layout.layoutMaster')
@section("title", "Boojangles")
@section('content')
<link href="{{asset('homePublic/css/services-page/secciones.css')}}" rel="stylesheet">
<link href="{{asset('homePublic/css/services-page/herramientas.css')}}" rel="stylesheet">


<section class="servicios-list" style="padding-top: 1rem !important">

    <div class="container">
          <h2>{{__("Services")}}</h2>
     
        <div class="row">
        <div class="col-12">
                <div class="title">
                    <h2>{{__("Services")}}</h2>
                </div>
            </div>
            
            @foreach ( $servicios as $s )
                 <div class="col-lg-4 item-servicios" >
                    
                    <div class="card-servicios">
                        <a style="text-decoration: none;color: black" id="{{$s->id}}" 
                            href="{{ route('detailService',[App\Models\Idiom::where('id',$s->idiom_id)->first()->acronym,$s->service_id]) }}">
                            
                            
                            <h2>{{$s->title}}</h2>
                            <hr>
                            {{-- <p>{{Str::limit($s->description, 250, $end='...')}}</p> --}}
                            {{-- <p>{!! substr($s->description, 0, 250).'...'!!}</p>  --}}
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


<br>
<br>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>        
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  




@endsection



