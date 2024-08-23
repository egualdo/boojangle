@extends('layout.layoutMaster')
@section("title", "Boojangles")
@section('content')

<link href="{{asset('homePublic/css/services-page/secciones.css')}}" rel="stylesheet">
<link href="{{asset('homePublic/css/blog/blog.css')}}" rel="stylesheet">
<link href="{{asset('homePublic/css/services-page/herramientas.css')}}" rel="stylesheet">


<section class="servicios-list" >

    <div class="container">
        <h2>{{__("Blog")}}</h2>
        <div class="row">
            <div class="col-12">
                <h5>{{__("Topics")}}</h5>
            </div>
            <div class="col-12">
             <a class="badge rounded-pill  {{$topicSelected->id == '' ? 'span-background-pill':'span-background-pill-secondary'}}" id="todos"
             href="{{ route('blogs',Session::get('locale')) }}">Todos </a>
                       
                @for($w=0;$w<count($topics);$w++)
                    
                        <a class="badge rounded-pill {{$topicSelected->id == $topics[$w]->id ? 'span-background-pill':'span-background-pill-secondary'}}"
                            id="{{$topics[$w]->id}}"
                         href="{{ route('blogfiltering',[Session::get('locale'),$topics[$w]->id]) }}"   
                         >
                         {{$topics[$w]->name}}
                         </a>
                   
                @endfor
                       
            </div>
        </div>
        <div class="row selected-topic">
            <div class="col-2">
                    @if ($topicSelected->id!='')
                    <h5 >{{$topicSelected->name}}</h5>
                    @else
                    <h5>Todos</h5>
                    @endif
                    <hr>
            </div>
        </div>
    </div>

    <div class="container">
          
     
        <div class="row">

            
        <div class="col-lg-8 item-servicios" >
            @for ($i=0;$i<count($news);$i++)
                
                @if($i==0)
                    <div class="row notes-list ">
                        <div class="col-12">
                            <a style="text-decoration: none;color: black" id="{{$news[$i]->id}}" 
                                href="{{ route('detailBlog',[App\Models\Idiom::where('id',$news[$i]->idiom_id)->first()->acronym,$news[$i]->new_id]) }}">
                            
                                <div class="row">
                                    <div class="col-12">
                                        <h1>{{$news[$i]->title}}</h1>
                                    </div>

                                    <div class="col-12">
                                        <p>{{$news[$i]->date}}</p>
                                    </div>

                                    <div class="col-12">
                                        <div class="row ">
                                            <div class="col-6" >
                                                <p class="autor">por: <b>{{$news[$i]->autor}} | </b><i class="fa fa-linkedin" href="{{$news[$i]->linkedin}}"></i></p>
                                            </div>
                                            <div class="col-6 icons" >
                                                <i class="fa fa-facebook" href="{{$news[$i]->facebook}}"></i>
                                                            <i class="fa fa-twitter" href="{{$news[$i]->twitter}}"></i>
                                                            <i class="fa fa-envelope" href="{{$news[$i]->email}}" ></i>
                                            </div>
                                            <div class="col-12" >
                                                {{-- <img src="{{asset('assets/images/imagen-no-disponible.jpg')}}" style="width:100%"> --}}
                                                 <img src="{{$news[$i]->photo}}" id="{{'photo_'.$news[$i]->id}}" {{$news[$i]->file !== null ? 'data-href='.$news[$i]->file : ''}} style="width:100%">
                          
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>                            
                            </a>
                        </div>
                    </div>
                   
                @endif
                
            @endfor

                <div class="row notes-list">
            @for ($j=1;$j<count($news);$j++)

                            <div class="col-6 ">
                                <div class="row ">
                                    <div class="col-12">
                                        <a style="text-decoration: none;color: black" id="{{$news[$j]->id}}" 
                                            href="{{ route('detailBlog',[App\Models\Idiom::where('id',$news[$j]->idiom_id)->first()->acronym,$news[$j]->new_id]) }}">
                                        
                                            <div class="row">
                                                <div class="col-12">
                                                    <h1>{{$news[$j]->title}}</h1>
                                                </div>

                                                <div class="col-12">
                                                       <p>{{$news[$j]->date}}</p>
                                                </div>

                                                <div class="col-12">
                                                    <div class="row ">
                                                        <div class="col-6" >
                                                            <p class="autor">por: <b>{{$news[$j]->autor}} | </b><i class="fa fa-linkedin"></i></p>
                                                        </div>
                                                        <div class="col-6 icons" >
                                                            <i class="fa fa-facebook" href="{{$news[$j]->facebook}}"></i>
                                                            <i class="fa fa-twitter" href="{{$news[$j]->twitter}}"></i>
                                                            <i class="fa fa-envelope" href="{{$news[$j]->email}}" ></i>
                                                        </div>
                                                        <div class="col-12" >
                                                            {{-- <img src="{{asset('assets/images/imagen-no-disponible.jpg')}}" style="width:100%"> --}}
                                                             <img src="{{$news[$j]->photo}}" id="{{'photo_'.$news[$j]->id}}" {{$news[$j]->file !== null ? 'data-href='.$news[$j]->file : ''}} style="width:100%">
                          
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>                            
                                        </a>
                                    </div>
                                </div>
                            </div>
            @endfor    
                </div>
        </div>

        <div class="col-lg-4 " >
                 <h2>Notas Mas Leidas</h2>
            @foreach ( $newsMostReaded as $ss )
                    
                    <div class="notes-list selected-topic">
                        <a  style="text-decoration: none;color: black" id="{{$ss->id}}" 
                            href="{{ route('detailBlog',[App\Models\Idiom::where('id',$ss->idiom_id)->first()->acronym,$ss->new_id]) }}">
                            
                            
                                <h5>{{$ss->title}}</h5>
                                <hr>
                                 {{-- {!! substr($ss->description, 0, 250).'...'!!} --}}
                                {{-- <p>{{Str::limit($ss->description, 250, $end='...')}}</p> --}}
                                <p>{!!  substr(strip_tags($ss->description), 0, 200).'...'!!}</p>
                        </a>
                    </div>
            @endforeach   
        </div>
           
           
        </div>
    </div>
</section>




@endsection