@extends('panel.layouts.simple.master')
@section('title', 'Header Cards')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>{{__('List')}} {{__('Headers')}}</h3> <br>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"> {{__('Headers')}}</li>
<li class="breadcrumb-item active">{{__('List')}} {{__('Headers')}}</li>
@endsection

@section('content')


<div class="container-fluid">
    <h4>{{__('New Element')}} <a class="btn btn-outline-success"
            href="{{ route('header.create') }}"> {{__('here.')}}</a></h4>
    @if ($headers !== null && $headers->count() > 0)
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID:</th>
                    {{-- <th>Titulo:</th> --}}
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

                    @foreach ($headers as $header)
                    <th>{{ $header->id }}</th>
                    <th>

                        @foreach(App\Models\HeaderIdiom::where('header_id',$header->id)->get()
                        as $t)
                        <span class="badge badge-success">{{ $t->title }}</span>
                        @endforeach
                    </th>

                    <th>
                        @foreach ($header->idioms as $idiom)
                        <span class="badge badge-secondary">{{__($idiom->name)}}</span>
                        @endforeach
                    </th>
                    <th>
                        @if (is_array($header->country_id))
                        @if(count($header->country_id) > 0)
                        @foreach ($countries as $country)
                        @if (in_array($country->id, $header->country_id))
                        <span class="badge badge-primary">{{ $country->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @else
                        @if ($header->country_id)
                        @foreach ($countries as $country)
                        @if ($country->id == $header->country_id)
                        <span class="badge badge-primary">{{ $country->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @endif
                    </th>
                    <th>
                        @if (is_array($header->city_id))
                        @if(count($header->city_id) > 0)
                        @foreach ($cities as $city)
                        @if (in_array($city->id, $header->city_id))
                        <span class="badge badge-info">{{ $city->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @else
                        @if ($header->city_id)
                        @foreach ($cities as $city)
                        @if ($city->id == $header->city_id)
                        <span class="badge badge-info">{{ $city->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @endif
                    </th>
                    <th class="counter"><a href="{{ route('header.edit', $header->id) }}"
                            class="btn btn-outline-primary"><i data-feather="edit-2"></i></a></th>
                    <th class="counter"><a href="{{ route('header.show', $header->id) }}"
                            class="btn btn-outline-info"><i data-feather="eye"></i></a></th>
                    <th><span class="counter">
                             <form action="{{ route('header.destroy', $header->id) }}" method="POST"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este elemento?')"><i
                                        data-feather="trash-2"></i></button>
                            </form>
                        </span></th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @else
    <p>No se encontraron Headers</p>
    @endif

</div>
@endsection

@section('script')

@endsection