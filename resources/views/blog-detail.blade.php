@extends('layout.layoutMaster')
@section("title", "Boojangles")
@section('content')

<link href="{{asset('homePublic/css/services-page/secciones.css')}}" rel="stylesheet">
<link href="{{asset('homePublic/css/blog/blog.css')}}" rel="stylesheet">
<link href="{{asset('homePublic/css/services-page/herramientas.css')}}" rel="stylesheet">


<section class="servicios-list" >

    <div class="container">
        <div class="row selected-topic">
            <div class="col-2">
                    
                    <h5 >{{App\Models\Topic::find($newIdiom->topic)->name}}</h5>
                    
                    <hr>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 item-servicios" >
              
                        <div class="row notes-list ">
                            <div class="col-12">
                               
                                    <div class="row">
                                        <div class="col-12">
                                            <h1>{{$newIdiom->title}}</h1>
                                        </div>

                                        <div class="col-12">
                                            <h4>{{$newIdiom->subtitle}}</h4>
                                        </div>

                                        <div class="col-12">
                                            <p>{{$newIdiom->date}}</p>
                                        </div>

                                        <div class="col-12">
                                            <div class="row ">
                                                <div class="col-6" >
                                                    <p class="autor">por: <b>{{$newIdiom->autor}} | </b><i class="fa fa-linkedin" href="{{$newIdiom->linkedin}}"></i></p>
                                                </div>
                                                <div class="col-6 icons" >
                                                    <i class="fa fa-facebook" href="{{$newIdiom->facebook}}"></i>
                                                    <i class="fa fa-twitter" href="{{$newIdiom->twitter}}"></i>
                                                    <i class="fa fa-envelope" href="{{$newIdiom->email}}" ></i>
                                                </div>
                                                <div class="col-12" >
                                                    {{-- <img src="{{asset('assets/images/imagen-no-disponible.jpg')}}" style="width:100%"> --}}
                                                    <img src="{{$newIdiom->photo}}" id="{{'photo_'.$newIdiom->id}}" {{$newIdiom->file !== null ? 'data-href='.$newIdiom->file : ''}} style="width:100%">
                            
                                                </div>
                                                
                                                <div class="col-12" style="margin-top:5%" >
                                                    {!!$newIdiom->description!!}
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>     
                            </div>
                        </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="notes-list selected-topic">
                    <h1>Tambien te puede Interesar</h1>
                    <hr>
                    <br/>
                    <br/>
                </div>
                @foreach ( $news as $ss )
                    
                    <div class="notes-list selected-topic">
                        <a  style="text-decoration: none;color: black" id="{{$ss->id}}" 
                            href="{{ route('detailBlog',[App\Models\Idiom::where('id',$ss->idiom_id)->first()->acronym,$ss->new_id]) }}">
                            
                                <h5>{{App\Models\Topic::find($ss->topic)->name}}</h5>
                                <hr style="width:35%" >
                                <p>{{$ss->date}}</p>
                                <h1>{{$ss->title}}</h1>
                                <p>por: {{$ss->autor}}</p>
                                {{-- <p>{{Str::limit($ss->description, 250, $end='...')}}</p> --}}
                        </a>
                    </div>
                @endforeach  
            </div>
            <div class="col-6">
                <div class="notes-list selected-topic">
                    <h1>Caso Relacionado</h1>
                    <hr>
                    <br/>
                    <br/>
                </div>
                 <div class="notes-list selected-topic">
                    @foreach ( $casosRelacionados as $sss )
                        <a  style="text-decoration: none;color: black" id="{{$sss->id}}" 
                            {{-- href="{{ route('detailBlog',[App\Models\Idiom::where('id',$sss->idiom_id)->first()->acronym,$sss->new_id]) }}" --}}
                            href="{{ route('detailCases',[$idiom,$sss->project->id]) }}"
                            >
                            
                                {{-- <h5>{{App\Models\Topic::find($sss->topic)->name}}</h5> --}}
                                {{-- <hr style="width:35%" > --}}
                                <img class="img-thumbnail" style="width: 50%" src="{{$sss->project->photo}}"">
                                
                                {{-- <p>{{$sss->date}}</p> --}}
                                <h1>{{$sss->project->name}}</h1>
                                {{-- <p> {{$sss->idioms}}</p> --}}
                                {{-- <p>{{Str::limit($ss->description, 250, $end='...')}}</p> --}}
                        </a>
                        <br>
                    @endforeach
                    </div>
            </div>
        </div>
    </div>
</section>




@endsection