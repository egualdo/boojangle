@extends('layout.layoutMaster')
@section("title", "Boojangles")
@section('content')
<style>
.teamstaff {
}
.teamstaff .teamstaff-member {
  position: relative;

  cursor: pointer;

  padding: 2rem 0;

  /* max-width: 250px; */
}

.teamstaff .teamstaff-member .img-teamstaff {
  position: relative;
  text-align: center;
}

.teamstaff .teamstaff-member .img-teamstaff .bg-img-teamstaff {
  position: absolute;
  z-index: -1;
  top: -8%;
  width: 50%;
  left: 20%;
  opacity: 0;
  
}
.teamstaff .teamstaff-member:hover .img-teamstaff .bg-img-teamstaff {
  transition: 0.75s opacity;
  opacity: 1;
}

.teamstaff .teamstaff-member .img-teamstaff .img-teamstaff-p {
  width: 50%;
}

.teamstaff .teamstaff-member .teamstaff-redes {
  position: absolute;
  width: 10%;
  bottom: 0;
  right: 18%;
}
.teamstaff .teamstaff-member .teamstaff-redes svg {
  height: 5%;
  display: inherit;
}

.teamstaff .teamstaff-member:hover .teamstaff-redes svg {
  color: #2c51af;
  fill: #2c51af;
}

.teamstaff .teamstaff-member .info-teamstaff {
  text-align: center;
  opacity: 0;
}

.teamstaff .teamstaff-member .info-teamstaff h5 {
  font-family: "GraphikSemibold";
  margin-top: 1rem;
  line-height: 1;
  margin-bottom: 0.2rem;
}

.teamstaff .teamstaff-member .info-teamstaff p {
  font-family: "AbelRegular";
  font-size: 1.25rem;
  color: var(--main-text);
  line-height: 1.25;
  min-height: 3.5rem;
}

.teamstaff .teamstaff-member:hover .info-teamstaff {
  opacity: 1;
}

h4 {
  font-family: AbelRegular;
  text-align: left;
  font-size: 2rem;
  margin-bottom: 4rem;
}


</style>

    <div class="container" style="margin-top: 10%">
    <div class="row">
        <div class="col-6">
            <h4>{{__("headerTeam")}}</h4>
        </div>
        <div class="col-6"></div>
    </div>
        
         <hr class="hr-title-h2">
        
    </div>

        <div class="container-fluid" >
                    <div class="row justify-content-center" >
                            @foreach( $staff as $st )
                            <div class="col-3">
                                <div class="teamstaff">

                                    <div class="teamstaff-member">
                                        <div class="img-teamstaff">
                                            <a href="{{$st->staff->linkedin}}" target="_blank">
                                                <img class="bg-img-teamstaff" src="{{asset('homePublic/imgs/borde-team.png')}}">
                                                <img src="{{ $st->staff->photo }}" class="img-teamstaff-p"/>
                                            </a>
                                           
                                        <div class="teamstaff-redes">
                                            <a href="{{$st->staff->linkedin}}" target="_blank">
                                                <img href="{{$st->staff->linkedin}}" target="_blank" src="{{asset('homePublic/imgs/icons/linkedin.svg')}}">
                                            </a>
                                        </div>
                                        </div>

                                        <div class="info-teamstaff" href="{{$st->staff->linkedin}}" target="_blank">
                                            <h5>{{$st->staff->name}}</h5>
                                            {!!$st->description!!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </div> 
        </div>




@include('panel.layouts.simple.script')

{{-- <script>

$(document).ready(function() {
    // var urlbase='http://wiper-site-2023-admin.test/'
        
});
</script> --}}

@endsection

