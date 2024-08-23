@extends('panel.layouts.simple.master')
@section('title', 'Create Headers')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3> {{__('Create')}} {{__('Headers')}}</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">{{__('Headers')}}</li>
<li class="breadcrumb-item active"> {{__('Create')}} {{__('Headers')}}</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="edit-profile">
        <div class="row">

            <div class="col-xl-12">
                <form method="POST" action="{{ route('header.store') }}" enctype="multipart/form-data" class="card">

                    @csrf
                    <div class="card-header">
                        {{-- <h4 class="card-title mb-0">{{ __('Create Header New') }}</h4> --}}
                        <div class="card-options"><a class="card-options-collapse" href="#"
                                data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                    class="fe fe-x"></i></a></div>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="country_id" class="form-label">{{ __('Country') }}</label>
                                <div class="col-md-12">
                                    <input type="checkbox" id="checkbox1" >{{ __('All') }}
                                    <select required name="country_id[]" id="country_id" class="form-control select2"
                                        multiple>
                                        {{-- <option value="" disabled>{{ __('Select a country') }}</option> --}}
                                        @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="city_id" class="form-label">{{ __('City') }}</label>
                                <div class="col-md-12">
                                <input type="checkbox" id="checkbox2" >{{ __('All') }}
                                    <select required name="city_id[]" id="city_id" class="form-control select2"
                                        multiple>
                                        {{-- <option value="" disabled>{{ __('Select a city') }}</option> --}}
                                        @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('city_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="idiom_id" class="form-label">{{ __('Language') }}</label>
                                <div class="col-md-12">
                                    <select required name="idiom_id[]" id="idiom_id" class="form-control select2"
                                        multiple>
                                        <option value="" disabled>{{ __('Select one or more languages') }}</option>
                                        @foreach ($idioms as $idiom)
                                        <option value="{{ $idiom->id }}">{{__($idiom->name)}}</option>
                                        @endforeach
                                    </select>
                                    @error('idiom_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            @foreach ($idioms as $idiom)
                            <div class="card">
                                <div id="idiom-fields" class="row">
                                    <div id="idiom-{{$idiom->id}}">
                                        <label
                                            class="form-label"><strong>{{ __('Write Content At') }}{{__($idiom->name)}}</strong></label>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="title_{{$idiom->id}}"
                                                    class="form-label">{{ __('Title') }}</label>

                                                <div class="col-md-12">
                                                    <input id="title_{{$idiom->id}}" type="text"
                                                        class="form-control @error('title_es') is-invalid @enderror"
                                                        name="title_{{$idiom->id}}" value="{{ old('title_es') }}"
                                                        autocomplete="title_es" >
                                                </div>
                                                <br />
                                                <label for="subtitle_{{$idiom->id}}"
                                                    class="form-label">{{ __('Subtitle') }}</label>

                                                <div class="col-md-12">
                                                    <input id="subtitle_{{$idiom->id}}" type="text"
                                                        class="form-control @error('subtitle_es') is-invalid @enderror"
                                                        name="subtitle_{{$idiom->id}}" value="{{ old('subtitle_es') }}">
                                                </div>
                                                <br />
                                                <label for="link_{{$idiom->id}}"
                                                    class="form-label">{{ __('Link') }}</label>

                                                <div class="col-md-12">
                                                    <input id="link_{{$idiom->id}}" type="text"
                                                        class="form-control @error('link_es') is-invalid @enderror"
                                                        name="link_{{$idiom->id}}" value="{{ old('link_es') }}"
                                                        autocomplete="link_es" >
                                                </div>
                                                <br />
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                 <label for="photo_{{$idiom->id}}"
                                                    class="form-label">{{ __('Photo') }}</label>
                                                     <img id="image-preview{{$idiom->id}}" src="#"
                                                     
                                                            alt="Previsualización de la imagen" class="img-thumbnail">

                                                    <input onchange="previewImage(event)" id="photo_{{$idiom->id}}" type="file"
                                                            class="form-control mt-2 @error('photo') is-invalid @enderror" name="photo_{{$idiom->id}}">

                                            </div>

                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>

                        {{-- <div class="row">
                            <div class="col-md-6 mb-3">
                                {{-- <label for="name"
                                                    class="form-label">{{ __('Nombre') }}</label>

                                <div class="col-md-12">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> --}}
                                {{-- <br />
                                                <label for="slug"
                                                    class="form-label">{{ __('Link') }}</label>

                                <div class="col-md-12">
                                    <input id="slug" type="text"
                                        class="form-control @error('slug') is-invalid @enderror" name="slug"
                                        value="{{ old('slug') }}">

                                    @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> 
                               
                            </div>

                            <div class="col-md-6 mb-3">
                                <br />
                            </div>
                        </div> --}}
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-primary" type="submit">{{ __('Save') }}</button>
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