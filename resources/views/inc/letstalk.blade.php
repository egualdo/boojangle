{{-- <link href="{{asset('homePublic/css/letstalk.css')}}" rel="stylesheet"> --}}
<link href="{{ asset('homePublic/css/newsletters.css') }}" rel="stylesheet">
<link href="{{ asset('homePublic/css/modalletstalk.css') }}" rel="stylesheet">
    
    {{-- <div class="news-subs">

            <div class="row">
                    <div class="titlenews">
                        <h5>Completa el formulario y nos contactaremos a la brevedad</h5>
                    </div>

                    <div class="col-6">

                        <div class="inputnews">
                            <input type="text" id="name" name="name" placeholder="name">
                        </div>

                        <div class="inputnews">
                            <input type="email" id="email" name="email" placeholder="email">
                        </div>

                        <div class="inputnews">
                            <input type="text" id="country_id" name="country_id" placeholder="country">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="inputnews">
                            <input type="text" id="lastname" name="lastname" placeholder="lastname">
                        </div>

                            <div class="inputnews">
                            <input type="text" id="phone" name="phone" placeholder="phone">
                        </div>

                            <div class="inputnews">
                            <input type="text" id="company" name="company" placeholder="company">
                        </div>
                    </div>
            </div>
                
            <div class="row">
                <div class="col-12">
                    <h5>Tipo de Proyecto</h5>
                </div>
            </div>
                    
            <div class="row">
                @foreach (App\Models\ProjectType::all() as $projectType)
                    <div class="col-4">
                        <label>
                            <input type="checkbox" id="{{$projectType->id}}" value="{{$projectType->name}}" />
                                {{$projectType->name}}
                        </label>
                        <br />
                    </div>
                @endforeach
            </div> 

            <div class="row">
                <div class="col-12">
                        <input type="textarea" id="comments" name="comments" placeholder="comments">
                </div>
            </div>

            <div class="row">
                        <label>
                            <input type="checkbox" id="newsletter" />
                                    Desea recibir notificaciones sobre nuestras ofertas e informacion nueva
                        </label>
            </div>
            
            <div class="row">
                 <div class="btn-news">
                <button class="form-control" id="sendContact">ENVIAR</button>
            </div>
            </div>
           
        
    </div> --}}
{{-- </div> --}}

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>        
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       

{{-- <script>

$("#newsletter").on('change', function() {
  if ($(this).is(':checked')) {
    $(this).attr('value', 'true');
  } else {
    $(this).attr('value', 'false');
  }
  
  $('#newsletter').text($('#newsletter').val());
});

    $(document).on('click', '#sendContact', function () {
        var email = $('#email').val();
        var comments = $('#comments').val();
        var name = $('#name').val();
        var country_id = $('#country_id').val();
        var lastname = $('#lastname').val();
        var phone = $('#phone').val();
        var company = $('#company').val();
        var newsletter = $('#newsletter').val();
        $.ajax({
            url: '{{ route('contactUsers') }}',
            method: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                email:email,
                name:name,
                country:country_id,
                lastname:lastname,
                phone:phone,
                company:company,
                comments:comments,
                newsletter:newsletter
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
</script> --}}