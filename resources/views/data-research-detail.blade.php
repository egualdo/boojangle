@extends('layout.layoutMaster')
@section("title", "Boojangles")
@section('content')
<link href="{{asset('homePublic/css/services-page/secciones.css')}}" rel="stylesheet">
<link href="{{asset('homePublic/css/services-page/herramientas.css')}}" rel="stylesheet">
<link href="{{asset('homePublic/css/research/research.css')}}" rel="stylesheet">


<section class="research-data">
    <div class="cabecera-research">
        <div class="container">
               <img src={{asset('/'."homePublic/imgs/rd.png")}}>
        </div>
    </div>

    @foreach ($dataResearch as $dt )
                 
        <div class="infopaper">
            <div class="container">
                <div class="cont-info">
                    <div class="image-paper">
                        {{-- <div class="button-hover"> --}}
                        
                            <button style="border: none;outline:none" 
                                {{-- {{$dt->file !== null ? 'onclick='.'handlePhoto(event)' : ''}} --}}
                                >

                                <img src="{{$dt->photo}}" id="{{'photo_'.$dt->id}}" >
                                <div class="overlay" id="{{'a_'.$dt->id}}" {{$dt->file !== null ? 'data-href='.$dt->file : ''}} {{$dt->file !== null ? 'onclick='.'handlePhoto(event)' : ''}}>
                                    <div class="text">{{__('Click Here To Download File')}}</div>
                                </div>
                            </button>
                        {{-- </div> --}}
                            
                            
                    </div>
                    <div class="info-paper">
                        <h1>{{ $dt->title}}</h1>
                        <div class="info">
                            {!! $dt->description !!}
                        </div>
                        <div class="info">
                            <a href="{{$dt->slug}}" target="_blank" style="text-decoration: none">{{$dt->slug}}</a>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>

        <div hidden>
            <input type="text" class="form-control" hidden id="data_research_id" value="{{$dt->id}}">
            <input type="text" class="form-control" hidden id="idiom_id" value="{{$dt->idiom_id}}">
        </div>
    @endforeach

   
</section>
<br>
<br>
 @include('inc.newsletter');

    <div class="modal modalletstalk" style="top:10%" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Complete los datos para iniciar la descarga</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="formulario">
                        {{-- <form method="POST" action="{{ route('interestedUsers') }}" enctype="multipart/form-data" class="card"> --}}
                            
                            @csrf
                            <div class="row">

                                <div class="col-md-12">
                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                    <div class="col-md-12">
                                    <input required type="text" name="name" id="name" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="lastname" class="form-label">{{ __('Lastname') }}</label>
                                    <div class="col-md-12">
                                    <input required type="text" name="lastname" id="lastname" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="emailmodal" class="form-label">{{ __('Email') }}</label>
                                    <div class="col-md-12">
                                        <input required type="email" name="emailmodal" id="emailmodal" class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <label for="country" class="form-label">{{ __('country') }}</label>
                                    <div class="col-md-12">
                                        <input required type="text" name="country" id="country" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="phone" class="form-label">{{ __('phone') }}</label>
                                    <div class="col-md-12">
                                        <input required type="text" name="phone" id="phone" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="company" class="form-label">{{ __('company') }}</label>
                                    <div class="col-md-12">
                                        <input required type="text" name="company" id="company" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-end">
                                <button class="form-control" style="background-color:#19F7EB" id="submit" >{{ __('Download Ebook') }}</button>
                                {{-- <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button> --}}
                            </div>
                        {{-- </form> --}}
                    </div>

                   
                </div>
            </div>
        </div>
    </div>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"></script> --}}
        {{-- https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css --}}
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        {{-- <script src="toastr.js"></script> --}}
         <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       
        
    <script>
        var clicked,updated,anchor;

            // function show_toastr(title, message, type) {
            //     var o, i;
            //     var icon = '';
            //     var cls = '';

            //     if (type == 'success') {
            //         icon = 'fas fa-check-circle';
            //         cls = 'success';
            //     } else {
            //         icon = 'fas fa-times-circle';
            //         cls = 'danger';
            //     }

            //     $.notify({icon: icon, title: " " + title, message: message, url: ""}, {
            //         element: "body",
            //         type: cls,
            //         allow_dismiss: !0,
            //         placement: {from: 'top', align: 'right'},
            //         offset: {x: 15, y: 15},
            //         spacing: 10,
            //         z_index: 1080,
            //         delay: 2500,
            //         timer: 2000,
            //         url_target: "_blank",
            //         mouse_over: !1,
            //         animate: {enter: o, exit: i},
            //         template: '<div class="alert alert-{0} alert-icon alert-group alert-notify" data-notify="container" role="alert"><div class="alert-group-prepend alert-content"><span class="alert-group-icon"><i data-notify="icon"></i></span></div><div class="alert-content"><strong data-notify="title">{1}</strong><div data-notify="message">{2}</div></div><button type="button" class="close" data-notify="dismiss" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
            //     });
            // }
            function handlePhoto(e){
                console.log("aca1");
                    e.stopPropagation()
                    clicked=e.target.id;
                    console.log(clicked)
                    const getItem=localStorage.getItem(clicked);
                    const href=e.target.getAttribute("data-href");

                    anchor = document.createElement("a")
                    anchor.href = href;
                

                    if(getItem !== undefined && getItem !== null && getItem !== ''){   
                            console.log(getItem) 
                        const oldvalue = JSON.parse(getItem).count;
                        const value=oldvalue;
                        updated=value+1;
                        
                        if(updated >= 4){
                            document.getElementById('')
                            
                            $('#exampleModal').modal('show'); 
                            // toastr.error("Ya no puedes descargar mas el archivo");
                            // alert('no puedes descargar mas veces')
                            
                            return
                        }
                        
                        localStorage.setItem(clicked, JSON.stringify({name: clicked, count: updated}));
                        anchor.click()
                    }else{
                        localStorage.setItem(clicked, JSON.stringify({name: clicked, count: 1}));
                        anchor.click()
                    }
            }
            function getCookie(cname) {
                let name = cname + "=";
                let decodedCookie = decodeURIComponent(document.cookie);
                let ca = decodedCookie.split(';');
                for(let i = 0; i <ca.length; i++) {
                    let c = ca[i];
                    while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                    }
                }
                return "";
            }

            function clearModal(){
                $('#name').val('')
                $('#lastname').val('')
                $('#email').val('')
                $('#country').val('')
                $('#phone').val('')
                $('#company').val('')
            }

            $(document).on('click', '#submit', function () {
                console.log("aca2");

                var name = $('#name').val();
                var lastname = $('#lastname').val();
                var email = $('#emailmodal').val();
                var country = $('#country').val();
                var phone = $('#phone').val();
                var company = $('#company').val();
                var data_research_id = $('#data_research_id').val();
                var idiom_id = $('#idiom_id').val();
                var token = getCookie("XSRF-TOKEN");
                    
                $.ajax({
                    url: '{{ route('interestedUsers') }}',
                    method: 'POST',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{
                        name:name,
                        lastname:lastname,
                        email:email,
                        country:country,
                        phone:phone,
                        company:company,
                        data_research_id:data_research_id,
                        idiom_id:idiom_id
                    },
                    success: function (data) {

                        if (data.code == 200) {
                            
                            localStorage.setItem(clicked, JSON.stringify({name: clicked, count: updated}));
                            anchor.click()
                            toastr.success('Success', 'Registro realizado correctamente!')
                            clearModal()
                            $('#exampleModal').modal('hide');

                        } else if(data.code == 422)  {
                        
                            localStorage.setItem(clicked, JSON.stringify({name: clicked, count: updated}));
                            toastr.warning('Warning', 'Registro realizado previamente!')
                            clearModal()
                            $('#exampleModal').modal('hide');
                            anchor.click()

                        }else{
                            toastr.error('Error', data.error)
                        }
                    }
                });
            });
    </script>

@endsection



