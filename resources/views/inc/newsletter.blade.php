{{-- <link href="/css/newsletters.css" rel="stylesheet"> --}}
<link href="{{ asset('homePublic/css/newsletters.css') }}" rel="stylesheet">
<section class="news-subs">
    <div class="container">
        <div class="row">
        {{-- <form method="POST" action="{{ route('newsletter') }}" enctype="multipart/form-data" > 
            @csrf --}}
                <div class="form-newsletters">
                    <div class="titlenews">
                        <h4>Querés seguir recibiendo nuestro contenido exclusivo?</h4>
                        <h5>¡Suscríbete ahora!</h5>
                    </div>
                    <div class="inputnews">
                        <input type="email" id="email" name="email" placeholder="email">
                    </div>
                    <div class="btn-news">
                        <button type="submit" id="sendNewsletter">ENVIAR</button>
                    </div>
                </div>

        {{-- </form> --}}
        </div>
    </div>
</section>



<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>        
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       

<script>
    $(document).on('click', '#sendNewsletter', function () {
        var email = $('#email').val();
               
        $.ajax({
            url: '{{ route('newsletter') }}',
            method: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                email:email,
                },
            success: function (data) {

                if (data.code == 200) {                   
                    toastr.success('Success', 'Registro realizado correctamente!')

                } else if(data.code == 422)  {
                    toastr.warning('Warning', 'Registro realizado previamente!')

                }else{
                    toastr.error('Error', data.error)
                }
            }
        });
    });
</script>