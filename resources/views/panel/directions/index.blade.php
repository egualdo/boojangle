@extends('panel.layouts.simple.master')
@section('title', 'Direction Cards')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>{{__('List')}} {{__('Directions')}}</h3> <br>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"> {{__('Directions')}}</li>
<li class="breadcrumb-item active">{{__('List')}} {{__('Directions')}}</li>
@endsection

@section('content')
<div class="container-fluid">
    <h4>{{__('New Element')}}<a class="btn btn-outline-success"
            href="{{ route('directions.create') }}">{{__('here.')}}</a></h4>
    @if ($directions !== null && $directions->count() > 0)


    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID:</th>
                    <th>{{__('Acronym')}}:</th>
                    <th>{{__('Subtitle')}}:</th>
                    <th>{{__('Idioms')}}:</th>
                    <th>{{__('Countries')}}:</th>
                    <th>{{__('Cities')}}:</th>
                    <th>{{__('Edit')}}:</th>
                    <th>{{__('Show')}}:</th>
                    <th>{{__('Delete')}}:</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    @foreach ($directions as $direction)
                    <th>{{ $direction->id }}</th>
                    @if($direction->acronym)
                    <th>{{ $direction->acronym }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif
                    @if($direction->subtitle)
                    <th>{{ $direction->subtitle }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif
                    <th>
                        @foreach ($direction->idioms as $idiom)
                        <span class="badge badge-secondary">{{__($idiom->name)}}</span>
                        @endforeach
                    </th>
                    <th>
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
                    </th>
                    <th>
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
                    </th>
                    <th class="counter"><a href="{{ route('directions.edit', $direction->id) }}"
                            class="btn btn-outline-primary"><i data-feather="edit-2"></i></a></th>
                    <th class="counter"><a href="{{ route('directions.show', $direction->id) }}"
                            class="btn btn-outline-info"><i data-feather="eye"></i></a></th>
                    <th><span class="counter">
                            <form action="{{ route('directions.destroy', $direction->id) }}" method="POST"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar esta direccion?')"><i
                                        data-feather="trash-2"></i></button>
                            </form>
                        </span></th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p>No se encontraron direcciones</p>
    @endif

</div>
@endsection

@section('script')
@endsection