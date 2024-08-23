@extends('layout.layoutMaster')
@section("title", "Boojangles")
@section('content')
{{-- @include("casos-page-include.top") --}}
<link href="{{ asset('homePublic/css/casos-page/top.css') }}" rel="stylesheet">
<link href="{{ asset('homePublic/css/casos-page/packaging.css') }}" rel="stylesheet">
<link href="{{asset('homePublic/css/services-page/casos.css')}} " rel="stylesheet">
<link href="{{ asset('homePublic/css/casos-page/rebrand.css') }}" rel="stylesheet">
<link href="{{ asset('homePublic/css/casos-page/video-campana.css') }}" rel="stylesheet">
<br>
@if ($modulesIdiom)
    @foreach ($modulesIdiom as $module )
        @if ($module->html != '' && $module->html != '{}' && $module->html != null  )
            {!!json_decode($module->html)!!}
        @endif
    @endforeach
@endif
@include('panel.layouts.simple.script')
@include('inc.casos-relacionados')

<script>

$(document).ready(function() {
    // var urlbase='http://wiper-site-2023-admin.test/'
        
});
</script>

@endsection

