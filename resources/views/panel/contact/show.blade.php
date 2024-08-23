@extends('panel.layouts.simple.master')
@section('title', 'Show contact')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3> {{__('Show')}} {{__('Contact')}}</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"> {{__('Contact')}}</li>
<li class="breadcrumb-item active"> {{__('Show')}} {{__('Contact')}}</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="edit-profile">
        <div class="row">

            <div class="col-xl-12">
                <form 
                {{-- method="POST" action="{{ route('contact.update', $contact->id) }}" enctype="multipart/form-data" --}}
                    class="card">

                    {{-- @csrf
                    @method('PUT') --}}
                    <div class="card-header">
                        {{-- <h4 class="card-title mb-0">{{ __('Show contact') }}</h4> --}}
                        <div class="card-options"><a class="card-options-collapse" href="#"
                                data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                    class="fe fe-x"></i></a></div>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="country_id" class="form-label"><strong>{{ __('Country') }}</strong></label>
                                <div class="col-md-12">
                                    @if ($contact->country)
                                    <span class="badge badge-primary">{{ $contact->country }}</span>
                                    @else
                                    {{__('No Data')}}
                                    @endif
                                </div>
                            </div>

                            

                            <div class="col-md-6 mb-3">
                                <label for="idiom_id" class="form-label"><strong>{{ __('Idiom') }}</strong></label>
                                <div class="col-md-12">
                                    
                                    <span class="badge badge-secondary">{{ App\Models\Idiom::find($contact->idiom_id)->name }}</span>
                                  
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label"><strong>{{ __('Name') }}</strong></label>

                                <div class="col-md-12">
                                    <p>{{$contact->name}}</p>
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="lastname" class="form-label"><strong>{{ __('lastName') }}</strong></label>

                                <div class="col-md-12">
                                    <p>{{$contact->lastname}}</p>
                                </div>
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label"><strong>{{ __('Email') }}</strong></label>

                                <div class="col-md-12">
                                    <p>{{$contact->email}}</p>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="company" class="form-label"><strong>{{ __('Company') }}</strong></label>

                                <div class="col-md-12">
                                    <p>{{$contact->company}}</p>
                                </div>
                            </div>

                             <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label"><strong>{{ __('Phone') }}</strong></label>

                                <div class="col-md-12">
                                    <p>{{$contact->phone}}</p>
                                </div>
                            </div>

                             <div class="col-md-6 mb-3">
                                <label for="projectType" class="form-label"><strong>{{ __('Cases') }}</strong></label>

                                <div class="col-md-12">
                                    @if ($contact->project_type_id)
                                        <p>{{App\Models\ProjectType::find($contact->project_type_id)->name}}</p>
                                    @else
                                        <p>{{__('No Data')}}</p>
                                    @endif
                                    
                                </div>
                            </div>

                             <div class="col-md-6 mb-3">
                                <label for="comments" class="form-label"><strong>{{ __('comments') }}</strong></label>

                                <div class="col-md-12">
                                    <p>{{$contact->comments}}</p>
                                </div>
                            </div>
                          
                    </div>
            </div>
            </form>
        </div>

    </div>
</div>
</div>


@endsection

@section('script')
<script>
function updateFields() {
    var selectedIdioms = $('#idiom_id').val();

    // Muestra todos los campos de idioma
    $('#idiom-fields > div').removeClass('d-none');

    // Oculta los campos que no corresponden a los idiomas seleccionados
    $('#idiom-fields > div').each(function() {
        var id = $(this).attr('id').replace('idiom-', '');
        if (selectedIdioms.indexOf(id) === -1) {
            $(this).addClass('d-none');
        }
    });
}

$(document).ready(function() {
    updateFields();

    $('#idiom_id').change(function() {
        updateFields();
    });
    $('.select2').select2();
});
</script>
@endsection