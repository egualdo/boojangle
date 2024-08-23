@extends('layout.layoutMaster')
@section("title", "Boojangles")
@section('content')
<link href="{{asset('homePublic/css/services-page/secciones.css')}}" rel="stylesheet">
<link href="{{asset('homePublic/css/services-page/herramientas.css')}}" rel="stylesheet">
<link href="{{ asset('homePublic/css/services-page/video.css') }}" rel="stylesheet">
<link href="{{ asset('homePublic/css/casos-page/packaging.css') }}" rel="stylesheet">
<link href="{{ asset('homePublic/css/services-page/equipo.css') }}" rel="stylesheet">
{{-- @include('service-page.heroe-title'); --}}
                @foreach ($modulesIdiom as $header)
                     @if( App\Models\ModuleType::where('id',$header->module_type_id)->first()->name  =="header servicios")
                         {!!json_decode($header->html)!!}
                    @endif
                @endforeach

@include('service-page.enfoque');
@include('service-page.procesos');
@include('service-page.herramientas');
@include('service-page.equipo');

                @foreach ($modulesIdiom as $video)
                     @if( App\Models\ModuleType::where('id',$video->module_type_id)->first()->name  =="video servicios")
                         {!!json_decode($video->html)!!}
                    @endif
                @endforeach

{{-- @include('service-page.video'); --}}
@include('service-page.casos-relacionados');

<br>
<br>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>        
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  

 



@endsection



