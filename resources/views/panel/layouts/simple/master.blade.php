<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description"
            content="Boojangles admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
        <meta name="keywords"
            content="admin template, Boojangles admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="pixelstrap">
        <link rel="icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
        <title>Boojangles Main Dashboard</title>
        <!-- Google font-->
        <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
            rel="stylesheet">
        <link
            href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
            rel="stylesheet">
        @include('panel.layouts.simple.css')
        @yield('style')
    </head>

    <body @if(Route::current()->getName() == 'index') onload="startTime()" @endif>
        @if(Route::current()->getName() == 'index')
        <div class="loader-wrapper">
            <div class="loader-index"><span></span></div>
            <svg>
                <defs></defs>
                <filter id="goo">
                    <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
                    <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo">
                    </fecolormatrix>
                </filter>
            </svg>
        </div>
        @endif
        <!-- tap on top starts-->
        <div class="tap-top"><i data-feather="chevrons-up"></i></div>
        <!-- tap on tap ends-->
        <!-- page-wrapper Start-->
        <div class="page-wrapper compact-wrapper" id="pageWrapper">
            <!-- Page Header Start-->
            @include('panel.layouts.simple.header')
            <!-- Page Header Ends  -->
            <!-- Page Body Start-->
            <div class="page-body-wrapper">
                <!-- Page Sidebar Start-->
                @include('panel.layouts.simple.sidebar')
                <!-- Page Sidebar Ends-->
                <div class="page-body">
                    <div class="container-fluid">
                        <div class="page-title">
                            <div class="row">
                                <div class="col-6">
                                    @yield('breadcrumb-title')
                                </div>
                                <div class="col-6">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('index') }}"> <i
                                                    data-feather="home"></i></a></li>
                                        @yield('breadcrumb-items')
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Container-fluid starts-->
                    @yield('content')
                    <!-- Container-fluid Ends-->
                </div>
                <!-- footer start-->
                @include('panel.layouts.simple.footer')

            </div>
        </div>
        <!-- latest jquery-->
        @include('panel.layouts.simple.script')
        <!-- Plugin used-->

        <script type="text/javascript">
            if ($(".page-wrapper").hasClass("horizontal-wrapper")) {
            $(".according-menu.other" ).css( "display", "none" );
            $(".sidebar-submenu" ).css( "display", "block" );
      }
      function previewImage(event) {
        let splited = event.target.id
        let words = splited.split('_');
        console.log(words);
            const reader = new FileReader();
            let imagePreview
            reader.onload = function() {
                if(words.length > 0  && words.length == 1){
                      imagePreview = document.getElementById('image-preview');
                }else{
                    console.log('image-preview'+words[1])
                      imagePreview = document.getElementById('image-preview'+words[1]);
                }
               
                imagePreview.src = reader.result;
            }
        reader.readAsDataURL(event.target.files[0]);
    }
    function previewImage2(event) {
    const reader = new FileReader();
    reader.onload = function() {
    const imagePreview = document.getElementById('image-preview2');
    imagePreview.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
    }
    function previewImage3(event) {
    const reader = new FileReader();
    reader.onload = function() {
    const imagePreview = document.getElementById('image-preview3');
    imagePreview.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
    }



    $("#checkbox1").click(function(){
    

    if($("#checkbox1").is(':checked') ){
        $('#country_id').select2('destroy').find('option').prop('selected', 'selected').end().select2();
    }else{
        $('#country_id').select2('destroy').find('option').prop('selected', false).end().select2();
    }
    
});


$("#checkbox2").click(function(){
    if($("#checkbox2").is(':checked') ){
        $('#city_id').select2('destroy').find('option').prop('selected', 'selected').end().select2();
    }else{
        $('#city_id').select2('destroy').find('option').prop('selected', false).end().select2();
    }
});
        </script>
    </body>

</html>