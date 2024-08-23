@extends('panel.layouts.simple.master')
@section('title', 'Create Data & Research')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3> {{__('Create')}} {{__('Data Researchs')}}</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"> {{__('Data Researchs')}}</li>
<li class="breadcrumb-item active"> {{__('Create')}} {{__('Data Researchs')}}</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="edit-profile">
        <div class="row">

            <div class="col-xl-12">
                <form method="POST" action="{{ route('dataResearchs.store') }}" enctype="multipart/form-data"
                    class="card">

                    @csrf
                    <div class="card-header">
                        {{-- <h4 class="card-title mb-0">{{ __('Create New Data & Research') }}</h4> --}}
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
                                                        autocomplete="title_es" autofocus>

                                                    @error('title_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <br />
                                                <label for="slug_{{$idiom->id}}"
                                                    class="form-label">{{ __('Link') }}</label>

                                                <div class="col-md-12">
                                                    <input id="slug_{{$idiom->id}}" type="text"
                                                        class="form-control @error('slug_es') is-invalid @enderror"
                                                        name="slug_{{$idiom->id}}" value="{{ old('slug_es') }}">

                                                    @error('slug_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <br />
                                                <label for="photo_{{$idiom->id}}"
                                                    class="form-label">{{ __('Photo') }}</label>

                                                   

                                                     <img id="image-preview{{$idiom->id}}" src="#"
                                                     {{-- {{ asset('/' . $array_data[$i][0]->photo) }}" --}}
                                                            alt="Previsualización de la imagen" class="img-thumbnail">

                                                    <input onchange="previewImage(event)" id="photo_{{$idiom->id}}" type="file"
                                                            class="form-control mt-2 @error('photo') is-invalid @enderror" name="photo_{{$idiom->id}}">

                                                    {{-- <div class="col-md-6 mb-3"> --}}
                                                    {{-- <label for="photo_{{$array_data[$i][0]->idiom_id}}" class="form-label">{{ __('Photo') }}</label> --}}

                                                    {{-- <div class="col-md-12">
                                                        @if($array_data[$i][0]->photo)
                                                        <img id="image-preview{{$array_data[$i][0]->idiom_id}}" src="{{ asset('/' . $array_data[$i][0]->photo) }}"
                                                            alt="{{ __('Preview') }}" class="img-thumbnail">
                                                        <br>
                                                        <input onchange="previewImage(event)" id="photo_{{$array_data[$i][0]->idiom_id}}" type="file"
                                                            class="form-control mt-2 @error('photo') is-invalid @enderror" name="photo_{{$array_data[$i][0]->idiom_id}}">
                                                        @else
                                                        <input onchange="previewImage(event)" id="photo_{{$array_data[$i][0]->idiom_id}}" type="file"
                                                            class="form-control @error('photo') is-invalid @enderror" name="photo_{{$array_data[$i][0]->idiom_id}}">
                                                        @endif
                                                        @error('photo')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div> --}}
                                                {{-- </div> --}}

                                                {{-- <div class="col-md-12">
                                                    <img id="image-preview{{$idiom->id}}" src="#" alt="Previsualización de la imagen"
                                                        width="350px" />
                                                    <br><br>

                                                    <input onchange="previewImage(event)" id="photo_{{$idiom->id}}"
                                                        type="file"
                                                        class="form-control @error('photo_es') is-invalid @enderror"
                                                        name="photo_{{$idiom->id}}">

                                                    @error('photo_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div> --}}
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="description_{{$idiom->id}}"
                                                    class="form-label">{{ __('Description') }}</label>

                                                <div class="col-md-12">
                                                    <textarea id="description_{{$idiom->id}}"
                                                        class="form-control @error('description_es') is-invalid @enderror"
                                                        name="description_{{$idiom->id}}">{{ old('description_es') }}</textarea>

                                                    @error('description_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <br />
                                                <label for="file_{{$idiom->id}}"
                                                    class="form-label">{{ __('File') }}</label>

                                                <div class="col-md-12">
                                                    <input id="file_{{$idiom->id}}" type="file"
                                                        class="form-control @error('file_es') is-invalid @enderror"
                                                        name="file_{{$idiom->id}}">

                                                    @error('file_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>
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