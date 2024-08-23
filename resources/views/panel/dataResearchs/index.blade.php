@extends('panel.layouts.simple.master')
@section('title', 'Data & Research Cards')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>{{__('List')}} {{__('Data Researchs')}}</h3> <br>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"> {{__('Data Researchs')}}</li>
<li class="breadcrumb-item active">{{__('List')}} {{__('Data Researchs')}}</li>
@endsection

@section('content')
<div class="container-fluid">
    <h4>{{__('New Element')}} <a class="btn btn-outline-success"
            href="{{ route('dataResearchs.create') }}">{{__('here.')}}</a></h4>
    @if ($dataResearchs !== null && $dataResearchs->count() > 0)
   <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID:</th>
                    <th>{{__('Title')}}:</th>
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

                    @foreach ($dataResearchs as $dataResearch)
                    <th>{{ $dataResearch->id }}</th>
                    <th>

                        @foreach(App\Models\DataResearchIdiom::where('data_research_id',$dataResearch->id)->get()
                        as $t)
                        <span class="badge badge-success">{{ $t->title }}</span>
                        @endforeach
                    </th>

                    <th>
                        @foreach ($dataResearch->idioms as $idiom)
                        <span class="badge badge-secondary">{{__($idiom->name)}}</span>
                        @endforeach
                    </th>
                    <th>
                        @if (is_array($dataResearch->country_id))
                        @if(count($dataResearch->country_id) > 0)
                        @foreach ($countries as $country)
                        @if (in_array($country->id, $dataResearch->country_id))
                        <span class="badge badge-primary">{{ $country->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @else
                        @if ($dataResearch->country_id)
                        @foreach ($countries as $country)
                        @if ($country->id == $dataResearch->country_id)
                        <span class="badge badge-primary">{{ $country->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @endif
                    </th>
                    <th>
                        @if (is_array($dataResearch->city_id))
                        @if(count($dataResearch->city_id) > 0)
                        @foreach ($cities as $city)
                        @if (in_array($city->id, $dataResearch->city_id))
                        <span class="badge badge-info">{{ $city->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @else
                        @if ($dataResearch->city_id)
                        @foreach ($cities as $city)
                        @if ($city->id == $dataResearch->city_id)
                        <span class="badge badge-info">{{ $city->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @endif
                    </th>
                    <th class="counter"><a href="{{ route('dataResearchs.edit', $dataResearch->id) }}"
                            class="btn btn-outline-primary"><i data-feather="edit-2"></i></a></th>
                    <th class="counter"><a href="{{ route('dataResearchs.show', $dataResearch->id) }}"
                            class="btn btn-outline-info"><i data-feather="eye"></i></a></th>
                    <th><span class="counter">
                             <form action="{{ route('dataResearchs.destroy', $dataResearch->id) }}" method="POST"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este data?')"><i
                                        data-feather="trash-2"></i></button>
                            </form>
                        </span></th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @else
    <p>No se encontraron Data & Research</p>
    @endif

</div>
@endsection

@section('script')

@endsection