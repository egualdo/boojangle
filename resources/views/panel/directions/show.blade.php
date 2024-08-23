@extends('panel.layouts.simple.master')
@section('title', 'Show Directions')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3> {{__('Show')}} {{__('Directions')}}</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"> {{__('Directions')}}</li>
<li class="breadcrumb-item active"> {{__('Show')}} {{__('Directions')}}</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="edit-profile">
        <div class="row">

            <div class="col-xl-12">
                <form method="POST" action="{{ route('directions.update', $direction->id) }}"
                    enctype="multipart/form-data" class="card">

                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        {{-- <h4 class="card-title mb-0">{{ __('Show Direction') }}</h4> --}}
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
                                    @if (is_array($direction->country_id))
                                    @if(count($direction->country_id) > 0)
                                    @foreach ($countries as $country)
                                    @if (in_array($country->id, $direction->country_id))
                                    <span class="badge badge-primary">{{ $country->name }}</span>
                                    @endif
                                    @endforeach
                                    @else
                                    {{__('No Data')}}
                                    @endif
                                    @else
                                    @if ($direction->country_id)
                                    @foreach ($countries as $country)
                                    @if ($country->id == $direction->country_id)
                                    <span class="badge badge-primary">{{ $country->name }}</span>
                                    @endif
                                    @endforeach
                                    @else
                                    {{__('No Data')}}
                                    @endif
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="city_id" class="form-label"><strong>{{ __('City') }}</strong></label>
                                <div class="col-md-12">

                                    @if (is_array($direction->city_id))
                                    @if(count($direction->city_id) > 0)
                                    @foreach ($cities as $city)
                                    @if (in_array($city->id, $direction->city_id))
                                    <span class="badge badge-info">{{ $city->name }}</span>
                                    @endif
                                    @endforeach
                                    @else
                                    {{__('No Data')}}
                                    @endif
                                    @else
                                    @if ($direction->city_id)
                                    @foreach ($cities as $city)
                                    @if ($city->id == $direction->city_id)
                                    <span class="badge badge-info">{{ $city->name }}</span>
                                    @endif
                                    @endforeach
                                    @else
                                    {{__('No Data')}}
                                    @endif
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="city_id" class="form-label"><strong>{{ __('Idiom') }}</strong></label>
                                <div class="col-md-12">

                                    @foreach ($direction->idioms as $idiom)
                                    <span class="badge badge-secondary">{{__($idiom->name)}}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="acronym" class="form-label"><strong>{{ __('Acronym') }}</strong></label>

                                <div class="col-md-12">
                                    <p>{{$direction->acronym}}</p>

                                    @error('acronym')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="subtitle" class="form-label"><strong>{{ __('Subtitle') }}</strong></label>

                                <div class="col-md-12">
                                    <p>{{$direction->subtitle}}</p>
                                    @error('subtitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            @for($i=0;$i< count($array_data);$i++) <div class="card">

                                <div id="idiom-fields" class="row">
                                    <div id="idiom-{{$array_data[$i][0]->idiom_id}}">
                                        <label
                                            class="form-label"><strong>{{ __('Write Content At') }}{{$array_data[$i][0]->idiom->name}}</strong></label>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="slug_{{$idiom->id}}"
                                                    class="form-label"><strong>{{ __('Link') }}</strong></label>

                                                <div class="col-md-12">
                                                    <p>{{$array_data[$i][0]->slug}}</p>
                                                    @error('slug_es')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="direction_{{$idiom->id}}"
                                                    class="form-label"><strong>{{ __('Direction') }}</strong></label>

                                                <div class="col-md-12">
                                                    <p>{{$array_data[$i][0]->direction}}</p>
                                                    @error('direction_es')
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
                        @endfor
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