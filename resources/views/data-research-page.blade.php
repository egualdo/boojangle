@extends('layout.layoutMaster')
@section("title", "Boojangles")
@section('content')
<link href="{{asset('homePublic/css/services-page/secciones.css')}}" rel="stylesheet">
<link href="{{asset('homePublic/css/services-page/herramientas.css')}}" rel="stylesheet">
<link href="{{asset('homePublic/css/research/research.css')}}" rel="stylesheet">

<section class="research-data">
    <div class="container">
        <div class="row">
            <div class="col-12">
            <div class="cabecera-research">
                <div class="container">
                    
                      
                       <div class="row" style="text-align: justify">
                       <div class="col-md-1"></div>
                       <div class="col-md-7">
                             <p><b>¡Bienvenid@! Si quieres conocer información relevante sobre publicidad, tendencias, innovación,
                              marketing digital, estrategia y más, llegaste al lugar indicado.</b>
                               Encuentra los datos más recientes e interesantes de la industria en este espacio creado para informarte.</p>
                       </div>

                       <div class="col-md-4">
                       
                            <img src={{asset('/'."homePublic/imgs/rd.png")}}>
                       </div>
                       </div>
                     
                 
                </div>
            </div>
                {{-- <div class="title">
                    <h2>{{__("Data Researchs")}}</h2>
                   
                </div> --}}
            </div>
            
            <div class="col-12 herramientas">
                <div class="row">
                    @foreach ($dataResearch as $dt )
                        <div class="col-lg-4 herramientas-cont">
                            <div class="img-herramientas">
                            <br>
                            <h2>{!! $dt->title !!}</h2>
                            <a href="{{route('detailResearch',[$dt->idiom->acronym,$dt->id])}}">
                                    <img src="{{$dt->photo}}" id="{{'photo_'.$dt->id}}">
                                </a>
                            </div>
                            {{-- {!! $dt->description !!} --}}



                                {{-- <button style="border: none;outline:none" id="{{'a_'.$dt->id}}"
                                    {{$dt->file !== null ? 'onclick='.'handlePhoto(event)' : ''}}
                                >
                                    <img src="{{$dt->photo}}" id="{{'photo_'.$dt->id}}" {{$dt->file !== null ? 'data-href='.$dt->file : ''}}>
                                </button>
                            </div>
                            {!! $dt->description !!} --}}
                        </div>
                    @endforeach
                </div>
            </div>
            
           
        </div>
    </div>
</section>

<br>
<br>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>        
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  

 @include('inc.newsletter');

<script>
    function handlePhoto(e){
            e.stopPropagation()
            const clicked=e.target.id;
            const getItem=localStorage.getItem(clicked);
            const href=e.target.getAttribute("data-href");

            const anchor = document.createElement("a")
            anchor.href = href;

            if(getItem !== undefined && getItem !== null && getItem !== ''){    
                const oldvalue = JSON.parse(getItem).count;
                const value=oldvalue;
                const updated=value+1;
                
                if(updated >= 4){
                    document.getElementById('')
                    alert('no puedes descargar mas veces')
                    return
                }
                
                localStorage.setItem(clicked, JSON.stringify({name: clicked, count: updated}));
                anchor.click()
            }else{
                localStorage.setItem(clicked, JSON.stringify({name: clicked, count: 1}));
                anchor.click()
            }
    }
</script>

@endsection



