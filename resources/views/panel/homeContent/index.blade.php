@extends('panel.layouts.simple.master')
@section('title', 'Home Content Cards')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>{{ trans('lang.HomeC') }}</h3> <br>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Home Content</li>
<li class="breadcrumb-item active">Home Content index</li>
@endsection

@section('content')
<div class="container-fluid">
    <h4>{{ trans('lang.News') }}</h4>
    @if ($news !== null && $news->count() > 0)
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID:</th>
                    <th>Titulo (ES):</th>
                    <th>Title (EN):</th>
                    <th>Titulo (PT):</th>
                    <th>Idiomas:</th>
                    <th>Paises:</th>
                    <th>Ciudades:</th>
                    <th>Home Status:</th>
                    <th>Mostrar completo:</th>
                    <th>Change status:</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    @foreach ($news as $new)
                    <th>{{ $new->id }}</th>
                    @if($new->title_es)
                    <th>{{ $new->title_es }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif
                    @if($new->title_en)
                    <th>{{ $new->title_en }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif
                    @if($new->title_pt)
                    <th>{{ $new->title_pt }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif
                    <th>
                        @if (is_array($new->idiom_id))
                        @if(count($new->idiom_id) > 0)
                        @foreach ($idioms as $idiom)
                        @if (in_array($idiom->id, $new->idiom_id))
                        <span class="badge badge-secondary">{{__($idiom->name)}}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @else
                        @if ($new->idiom_id)
                        @foreach ($idioms as $idiom)
                        @if ($idiom->id == $new->idiom_id)
                        <span class="badge badge-secondary">{{__($idiom->name)}}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @endif
                    </th>
                    <th>
                        @if (is_array($new->country_id))
                        @if(count($new->country_id) > 0)
                        @foreach ($countries as $country)
                        @if (in_array($country->id, $new->country_id))
                        <span class="badge badge-primary">{{ $country->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @else
                        @if ($new->country_id)
                        @foreach ($countries as $country)
                        @if ($country->id == $new->country_id)
                        <span class="badge badge-primary">{{ $country->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @endif
                    </th>
                    <th>
                        @if (is_array($new->city_id))
                        @if(count($new->city_id) > 0)
                        @foreach ($cities as $city)
                        @if (in_array($city->id, $new->city_id))
                        <span class="badge badge-info">{{ $city->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @else
                        @if ($new->city_id)
                        @foreach ($cities as $city)
                        @if ($city->id == $new->city_id)
                        <span class="badge badge-info">{{ $city->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @endif
                    </th>
                    <th class="counter" id="status-th-{{ $new->id }}-{{class_basename($new);}}">
                        @if ($new->home->id === 2)
                        <a href="#" class="btn btn-outline-success"><i class="fa-regular fa-circle-check"></i></a>
                        @elseif ($new->home->id === 1)
                        <a href="#" class="btn btn-outline-danger"><i class="fa-regular fa-circle-xmark"></i></a>
                        @else
                        <a href="#" class="btn btn-outline-info"><i class="fa-solid fa-circle-info"></i></a>
                        @endif
                    </th>
                    <th class="counter"><a href="{{ route('news.show', $new->id) }}" class="btn btn-outline-info"><i
                                class="fa-regular fa-eye"></i></a></th>
                    <th><span class="counter">
                            <form class="ajax-form"
                                action="{{ route('change.home.id', ['kind' => 'news', 'id' => $new->id]) }}"
                                method="POST" style="display: inline-block">
                                @csrf
                                <input class="d-none" type="text" value="{{ $new->id }}" name="status-change">
                                <input class="d-none" type="text" value="{{ class_basename($new); }}"
                                    name="status-change-2">
                                <button type="submit" class="btn btn-outline-warning"><i
                                        class="fa-solid fa-circle-info"></i></button>
                            </form>
                        </span></th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p>No se encontraron noticias</p>
    @endif

    <br><br>

    <h4>{{ trans('lang.Services') }}</h4>
    @if ($services !== null && $services->count() > 0)

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID:</th>
                    <th>Titulo (ES):</th>
                    <th>Title (EN):</th>
                    <th>Titulo (PT):</th>
                    <th>Idiomas:</th>
                    <th>Paises:</th>
                    <th>Ciudades:</th>
                    <th>Home Status:</th>
                    <th>Mostrar completo:</th>
                    <th>Change status:</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    @foreach ($services as $service)
                    <th>{{ $service->id }}</th>
                    @if($service->title_es)
                    <th>{{ $service->title_es }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif
                    @if($service->title_en)
                    <th>{{ $service->title_en }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif
                    @if($service->title_pt)
                    <th>{{ $service->title_pt }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif
                    <th>
                        @if (is_array($service->idiom_id))
                        @if(count($service->idiom_id) > 0)
                        @foreach ($idioms as $idiom)
                        @if (in_array($idiom->id, $service->idiom_id))
                        <span class="badge badge-secondary">{{__($idiom->name)}}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @else
                        @if ($service->idiom_id)
                        @foreach ($idioms as $idiom)
                        @if ($idiom->id == $service->idiom_id)
                        <span class="badge badge-secondary">{{__($idiom->name)}}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @endif
                    </th>
                    <th>
                        @if (is_array($service->country_id))
                        @if(count($service->country_id) > 0)
                        @foreach ($countries as $country)
                        @if (in_array($country->id, $service->country_id))
                        <span class="badge badge-primary">{{ $country->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @else
                        @if ($service->country_id)
                        @foreach ($countries as $country)
                        @if ($country->id == $service->country_id)
                        <span class="badge badge-primary">{{ $country->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @endif
                    </th>
                    <th>
                        @if (is_array($service->city_id))
                        @if(count($service->city_id) > 0)
                        @foreach ($cities as $city)
                        @if (in_array($city->id, $service->city_id))
                        <span class="badge badge-info">{{ $city->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @else
                        @if ($service->city_id)
                        @foreach ($cities as $city)
                        @if ($city->id == $service->city_id)
                        <span class="badge badge-info">{{ $city->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @endif
                    </th>
                    <th class="counter" id="status-th-{{ $service->id }}-{{class_basename($service);}}">
                        @if ($service->home->id === 2)
                        <a href="#" class="btn btn-outline-success"><i class="fa-regular fa-circle-check"></i></a>
                        @elseif ($service->home->id === 1)
                        <a href="#" class="btn btn-outline-danger"><i class="fa-regular fa-circle-xmark"></i></a>
                        @else
                        <a href="#" class="btn btn-outline-info"><i class="fa-solid fa-circle-info"></i></a>
                        @endif
                    </th>
                    <th class="counter"><a href="{{ route('service.show', $service->id) }}"
                            class="btn btn-outline-info"><i class="fa-regular fa-eye"></i></a></th>
                    <th><span class="counter">
                            <form class="ajax-form"
                                action="{{ route('change.home.id', ['kind' => 'service', 'id' => $service->id]) }}"
                                method="POST" style="display: inline-block">
                                @csrf
                                <input class="d-none" type="text" value="{{ $service->id }}" name="status-change">
                                <input class="d-none" type="text" value="{{ class_basename($service); }}"
                                    name="status-change-2">
                                <button type="submit" class="btn btn-outline-warning"><i
                                        class="fa-solid fa-circle-info"></i></button>
                            </form>
                        </span></th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p>No se encontraron servicios</p>
    @endif

    <br><br>
    <h4>{{ trans('lang.Directions') }}</h4>

    @if ($directions !== null && $directions->count() > 0)

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID:</th>
                    <th>Acronimo:</th>
                    <th>Subtitulo:</th>
                    <th>Idiomas:</th>
                    <th>Paises:</th>
                    <th>Ciudades:</th>
                    <th>Home Status:</th>
                    <th>Mostrar completo:</th>
                    <th>Change status:</th>
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
                        @if (is_array($direction->idiom_id))
                        @if(count($direction->idiom_id) > 0)
                        @foreach ($idioms as $idiom)
                        @if (in_array($idiom->id, $direction->idiom_id))
                        <span class="badge badge-secondary">{{__($idiom->name)}}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @else
                        @if ($direction->idiom_id)
                        @foreach ($idioms as $idiom)
                        @if ($idiom->id == $direction->idiom_id)
                        <span class="badge badge-secondary">{{__($idiom->name)}}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @endif
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
                    <th class="counter" id="status-th-{{ $direction->id }}-{{class_basename($direction);}}">
                        @if ($direction->home->id === 2)
                        <a href="#" class="btn btn-outline-success"><i class="fa-regular fa-circle-check"></i></a>
                        @elseif ($direction->home->id === 1)
                        <a href="#" class="btn btn-outline-danger"><i class="fa-regular fa-circle-xmark"></i></a>
                        @else
                        <a href="#" class="btn btn-outline-info"><i class="fa-solid fa-circle-info"></i></a>
                        @endif
                    </th>
                    <th class="counter"><a href="{{ route('directions.show', $direction->id) }}"
                            class="btn btn-outline-info"><i class="fa-regular fa-eye"></i></a></th>
                    <th><span class="counter">
                            <form class="ajax-form"
                                action="{{ route('change.home.id', ['kind' => 'direction', 'id' => $direction->id]) }}"
                                method="POST" style="display: inline-block">
                                @csrf
                                <input class="d-none" type="text" value="{{ $direction->id }}" name="status-change">
                                <input class="d-none" type="text" value="{{ class_basename($direction); }}"
                                    name="status-change-2">
                                <button type="submit" class="btn btn-outline-warning"><i
                                        class="fa-solid fa-circle-info"></i></button>
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

    <br><br>
    <h4>Staff</h4>

    @if ($staffs !== null && $staffs->count() > 0)

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID:</th>
                    <th>Nombre:</th>
                    <th>LinkedIn:</th>
                    <th>Idiomas:</th>
                    <th>Paises:</th>
                    <th>Ciudades:</th>
                    <th>Editar:</th>
                    <th>Mostrar completo:</th>
                    <th>Eliminar:</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    @foreach ($staffs as $staff)
                    <th>{{ $staff->id }}</th>
                    @if($staff->name)
                    <th>{{ $staff->name }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif
                    @if($staff->linkedin)
                    <th>{{ $staff->linkedin }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif
                    <th>
                        @if (is_array($staff->idiom_id))
                        @if(count($staff->idiom_id) > 0)
                        @foreach ($idioms as $idiom)
                        @if (in_array($idiom->id, $staff->idiom_id))
                        <span class="badge badge-secondary">{{__($idiom->name)}}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @else
                        @if ($staff->idiom_id)
                        @foreach ($idioms as $idiom)
                        @if ($idiom->id == $staff->idiom_id)
                        <span class="badge badge-secondary">{{__($idiom->name)}}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @endif
                    </th>
                    <th>
                        @if (is_array($staff->country_id))
                        @if(count($staff->country_id) > 0)
                        @foreach ($countries as $country)
                        @if (in_array($country->id, $staff->country_id))
                        <span class="badge badge-primary">{{ $country->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @else
                        @if ($staff->country_id)
                        @foreach ($countries as $country)
                        @if ($country->id == $staff->country_id)
                        <span class="badge badge-primary">{{ $country->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @endif
                    </th>
                    <th>
                        @if (is_array($staff->city_id))
                        @if(count($staff->city_id) > 0)
                        @foreach ($cities as $city)
                        @if (in_array($city->id, $staff->city_id))
                        <span class="badge badge-info">{{ $city->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @else
                        @if ($staff->city_id)
                        @foreach ($cities as $city)
                        @if ($city->id == $staff->city_id)
                        <span class="badge badge-info">{{ $city->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @endif
                    </th>
                    <th class="counter" id="status-th-{{ $staff->id }}-{{class_basename($staff);}}">
                        @if ($staff->home->id === 2)
                        <a href="#" class="btn btn-outline-success"><i class="fa-regular fa-circle-check"></i></a>
                        @elseif ($staff->home->id === 1)
                        <a href="#" class="btn btn-outline-danger"><i class="fa-regular fa-circle-xmark"></i></a>
                        @else
                        <a href="#" class="btn btn-outline-info"><i class="fa-solid fa-circle-info"></i></a>
                        @endif
                    </th>
                    <th class="counter"><a href="{{ route('staffs.show', $staff->id) }}" class="btn btn-outline-info"><i
                                class="fa-regular fa-eye"></i></a></th>
                    <th><span class="counter">
                            <form class="ajax-form"
                                action="{{ route('change.home.id', ['kind' => 'staff', 'id' => $staff->id]) }}"
                                method="POST" style="display: inline-block">
                                @csrf
                                <input class="d-none" type="text" value="{{ $staff->id }}" name="status-change">
                                <input class="d-none" type="text" value="{{ class_basename($staff); }}"
                                    name="status-change-2">
                                <button type="submit" class="btn btn-outline-warning"><i
                                        class="fa-solid fa-circle-info"></i></button>
                            </form>
                        </span></th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @else
    <p>No se encontraron miembros del staff</p>
    @endif

    <br><br>
    <h4>Data & Research</h4>
    @if ($dataResearchs !== null && $dataResearchs->count() > 0)

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID:</th>
                    <th>Titulo (ES):</th>
                    <th>Title (EN):</th>
                    <th>Titulo (PT):</th>
                    <th>Idiomas:</th>
                    <th>Paises:</th>
                    <th>Ciudades:</th>
                    <th>Home Status:</th>
                    <th>Mostrar completo:</th>
                    <th>Change status:</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    @foreach ($dataResearchs as $dataResearch)
                    <th>{{ $dataResearch->id }}</th>
                    @if($dataResearch->title_es)
                    <th>{{ $dataResearch->title_es }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif
                    @if($dataResearch->title_en)
                    <th>{{ $dataResearch->title_en }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif
                    @if($dataResearch->title_pt)
                    <th>{{ $dataResearch->title_pt }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif
                    <th>
                        @if (is_array($dataResearch->idiom_id))
                        @if(count($dataResearch->idiom_id) > 0)
                        @foreach ($idioms as $idiom)
                        @if (in_array($idiom->id, $dataResearch->idiom_id))
                        <span class="badge badge-secondary">{{__($idiom->name)}}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @else
                        @if ($dataResearch->idiom_id)
                        @foreach ($idioms as $idiom)
                        @if ($idiom->id == $dataResearch->idiom_id)
                        <span class="badge badge-secondary">{{__($idiom->name)}}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @endif
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
                    <th class="counter" id="status-th-{{ $dataResearch->id }}-{{class_basename($dataResearch);}}">
                        @if ($dataResearch->home->id === 2)
                        <a href="#" class="btn btn-outline-success"><i class="fa-regular fa-circle-check"></i></a>
                        @elseif ($dataResearch->home->id === 1)
                        <a href="#" class="btn btn-outline-danger"><i class="fa-regular fa-circle-xmark"></i></a>
                        @else
                        <a href="#" class="btn btn-outline-info"><i class="fa-solid fa-circle-info"></i></a>
                        @endif
                    </th>
                    <th class="counter"><a href="{{ route('dataResearchs.show', $dataResearch->id) }}"
                            class="btn btn-outline-info"><i class="fa-regular fa-eye"></i></a></th>
                    <th><span class="counter">
                            <form class="ajax-form"
                                action="{{ route('change.home.id', ['kind' => 'dataResearch', 'id' => $dataResearch->id]) }}"
                                method="POST" style="display: inline-block">
                                @csrf
                                <input class="d-none" type="text" value="{{ $dataResearch->id }}" name="status-change">
                                <input class="d-none" type="text" value="{{ class_basename($dataResearch); }}"
                                    name="status-change-2">
                                <button type="submit" class="btn btn-outline-warning"><i
                                        class="fa-solid fa-circle-info"></i></button>
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
    <br><br>
    <h4>Project Types</a></h4>
    @if ($projectTypes !== null && $projectTypes->count() > 0)

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID:</th>
                    <th>Tipo de Proyecto (ES):</th>
                    <th>Type of project (EN):</th>
                    <th>Tipo de projeto (PT):</th>
                    <th>Idiomas:</th>
                    <th>Paises:</th>
                    <th>Ciudades:</th>
                    <th>Home Status:</th>
                    <th>Change status:</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    @foreach ($projectTypes as $projectType)
                    <th>{{ $projectType->id }}</th>
                    @if($projectType->projectType_es)
                    <th>{{ $projectType->projectType_es }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif
                    @if($projectType->projectType_en)
                    <th>{{ $projectType->projectType_en }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif
                    @if($projectType->projectType_pt)
                    <th>{{ $projectType->projectType_pt }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif
                    <th>
                        @if (is_array($projectType->idiom_id))
                        @if(count($projectType->idiom_id) > 0)
                        @foreach ($idioms as $idiom)
                        @if (in_array($idiom->id, $projectType->idiom_id))
                        <span class="badge badge-secondary">{{__($idiom->name)}}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @else
                        @if ($projectType->idiom_id)
                        @foreach ($idioms as $idiom)
                        @if ($idiom->id == $projectType->idiom_id)
                        <span class="badge badge-secondary">{{__($idiom->name)}}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @endif
                    </th>
                    <th>
                        @if (is_array($projectType->country_id))
                        @if(count($projectType->country_id) > 0)
                        @foreach ($countries as $country)
                        @if (in_array($country->id, $projectType->country_id))
                        <span class="badge badge-primary">{{ $country->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @else
                        @if ($projectType->country_id)
                        @foreach ($countries as $country)
                        @if ($country->id == $projectType->country_id)
                        <span class="badge badge-primary">{{ $country->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @endif
                    </th>
                    <th>
                        @if (is_array($projectType->city_id))
                        @if(count($projectType->city_id) > 0)
                        @foreach ($cities as $city)
                        @if (in_array($city->id, $projectType->city_id))
                        <span class="badge badge-info">{{ $city->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @else
                        @if ($projectType->city_id)
                        @foreach ($cities as $city)
                        @if ($city->id == $projectType->city_id)
                        <span class="badge badge-info">{{ $city->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @endif
                    </th>
                    <th class="counter" id="status-th-{{ $projectType->id }}-{{class_basename($projectType);}}">
                        @if ($projectType->home->id === 2)
                        <a href="#" class="btn btn-outline-success"><i class="fa-regular fa-circle-check"></i></a>
                        @elseif ($projectType->home->id === 1)
                        <a href="#" class="btn btn-outline-danger"><i class="fa-regular fa-circle-xmark"></i></a>
                        @else
                        <a href="#" class="btn btn-outline-info"><i class="fa-solid fa-circle-info"></i></a>
                        @endif
                    </th>
                    <th><span class="counter">
                            <form class="ajax-form"
                                action="{{ route('change.home.id', ['kind' => 'projectType', 'id' => $projectType->id]) }}"
                                method="POST" style="display: inline-block">
                                @csrf

                                <input class="d-none" type="text" value="{{ $projectType->id }}" name="status-change">
                                <input class="d-none" type="text" value="{{ class_basename($projectType); }}"
                                    name="status-change-2">
                                <button type="submit" class="btn btn-outline-warning"><i
                                        class="fa-solid fa-circle-info"></i></button>
                            </form>
                        </span></th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p>No se encontraron Tipos de Proyectos</p>
    @endif
    <br><br>
    <h4>Processes</h4>
    @if ($processes !== null && $processes->count() > 0)

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID:</th>
                    <th>Titulo (ES):</th>
                    <th>Title (EN):</th>
                    <th>Titulo (PT):</th>
                    <th>Idiomas:</th>
                    <th>Paises:</th>
                    <th>Ciudades:</th>
                    <th>Home Status:</th>
                    <th>Mostrar completo:</th>
                    <th>Change status:</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    @foreach ($processes as $process)
                    <th>{{ $process->id }}</th>
                    @if($process->title_es)
                    <th>{{ $process->title_es }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif
                    @if($process->title_en)
                    <th>{{ $process->title_en }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif
                    @if($process->title_pt)
                    <th>{{ $process->title_pt }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif
                    <th>
                        @if (is_array($process->idiom_id))
                        @if(count($process->idiom_id) > 0)
                        @foreach ($idioms as $idiom)
                        @if (in_array($idiom->id, $process->idiom_id))
                        <span class="badge badge-secondary">{{__($idiom->name)}}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @else
                        @if ($process->idiom_id)
                        @foreach ($idioms as $idiom)
                        @if ($idiom->id == $process->idiom_id)
                        <span class="badge badge-secondary">{{__($idiom->name)}}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @endif
                    </th>
                    <th>
                        @if (is_array($process->country_id))
                        @if(count($process->country_id) > 0)
                        @foreach ($countries as $country)
                        @if (in_array($country->id, $process->country_id))
                        <span class="badge badge-primary">{{ $country->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @else
                        @if ($process->country_id)
                        @foreach ($countries as $country)
                        @if ($country->id == $process->country_id)
                        <span class="badge badge-primary">{{ $country->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @endif
                    </th>
                    <th>
                        @if (is_array($process->city_id))
                        @if(count($process->city_id) > 0)
                        @foreach ($cities as $city)
                        @if (in_array($city->id, $process->city_id))
                        <span class="badge badge-info">{{ $city->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @else
                        @if ($process->city_id)
                        @foreach ($cities as $city)
                        @if ($city->id == $process->city_id)
                        <span class="badge badge-info">{{ $city->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @endif
                    </th>
                    <th class="counter" id="status-th-{{ $process->id }}-{{class_basename($process);}}">
                        @if ($process->home->id === 2)
                        <a href="#" class="btn btn-outline-success"><i class="fa-regular fa-circle-check"></i></a>
                        @elseif ($process->home->id === 1)
                        <a href="#" class="btn btn-outline-danger"><i class="fa-regular fa-circle-xmark"></i></a>
                        @else
                        <a href="#" class="btn btn-outline-info"><i class="fa-solid fa-circle-info"></i></a>
                        @endif
                    </th>
                    <th class="counter"><a href="{{ route('processes.show', $process->id) }}"
                            class="btn btn-outline-info"><i class="fa-regular fa-eye"></i></a></th>
                    <th><span class="counter">
                            <form class="ajax-form"
                                action="{{ route('change.home.id', ['kind' => 'process', 'id' => $process->id]) }}"
                                method="POST" style="display: inline-block">
                                @csrf
                                <input class="d-none" type="text" value="{{ $process->id }}" name="status-change">
                                <input class="d-none" type="text" value="{{ class_basename($process); }}"
                                    name="status-change-2">
                                <button type="submit" class="btn btn-outline-warning"><i
                                        class="fa-solid fa-circle-info"></i></button>
                            </form>
                        </span></th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p>No se encontraron procesos</p>
    @endif
    <br><br>
    <h4>Tools</h4>
    @if ($tools !== null && $tools->count() > 0)

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID:</th>
                    <th>Titulo (ES):</th>
                    <th>Title (EN):</th>
                    <th>Titulo (PT):</th>
                    <th>Idiomas:</th>
                    <th>Paises:</th>
                    <th>Ciudades:</th>
                    <th>Home Status:</th>
                    <th>Mostrar completo:</th>
                    <th>Change status:</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    @foreach ($tools as $tool)
                    <th>{{ $tool->id }}</th>
                    @if($tool->title_es)
                    <th>{{ $tool->title_es }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif
                    @if($tool->title_en)
                    <th>{{ $tool->title_en }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif
                    @if($tool->title_pt)
                    <th>{{ $tool->title_pt }}</th>
                    @else
                    <th>{{__('No Data')}}</th>
                    @endif
                    <th>
                        @if (is_array($tool->idiom_id))
                        @if(count($tool->idiom_id) > 0)
                        @foreach ($idioms as $idiom)
                        @if (in_array($idiom->id, $tool->idiom_id))
                        <span class="badge badge-secondary">{{__($idiom->name)}}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @else
                        @if ($tool->idiom_id)
                        @foreach ($idioms as $idiom)
                        @if ($idiom->id == $tool->idiom_id)
                        <span class="badge badge-secondary">{{__($idiom->name)}}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @endif
                    </th>
                    <th>
                        @if (is_array($tool->country_id))
                        @if(count($tool->country_id) > 0)
                        @foreach ($countries as $country)
                        @if (in_array($country->id, $tool->country_id))
                        <span class="badge badge-primary">{{ $country->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @else
                        @if ($tool->country_id)
                        @foreach ($countries as $country)
                        @if ($country->id == $tool->country_id)
                        <span class="badge badge-primary">{{ $country->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @endif
                    </th>
                    <th>
                        @if (is_array($tool->city_id))
                        @if(count($tool->city_id) > 0)
                        @foreach ($cities as $city)
                        @if (in_array($city->id, $tool->city_id))
                        <span class="badge badge-info">{{ $city->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @else
                        @if ($tool->city_id)
                        @foreach ($cities as $city)
                        @if ($city->id == $tool->city_id)
                        <span class="badge badge-info">{{ $city->name }}</span>
                        @endif
                        @endforeach
                        @else
                        {{__('No Data')}}
                        @endif
                        @endif
                    </th>
                    <th class="counter" id="status-th-{{ $tool->id }}-{{class_basename($tool);}}">@if ($tool->home->id
                        === 2)
                        <a href="#" class="btn btn-outline-success"><i class="fa-regular fa-circle-check"></i></a>
                        @elseif ($tool->home->id === 1)
                        <a href="#" class="btn btn-outline-danger"><i class="fa-regular fa-circle-xmark"></i></a>
                        @else
                        <a href="#" class="btn btn-outline-info"><i class="fa-solid fa-circle-info"></i></a>
                        @endif
                    </th>
                    <th class="counter"><a href="{{ route('tools.show', $tool->id) }}" class="btn btn-outline-info"><i
                                class="fa-regular fa-eye"></i></a></th>
                    <th><span class="counter">
                            <form class="ajax-form"
                                action="{{ route('change.home.id', ['kind' => 'tool', 'id' => $tool->id]) }}"
                                method="POST" style="display: inline-block">
                                @csrf
                                <input class="d-none" type="text" value="{{ $tool->id }}" name="status-change">
                                <input class="d-none" type="text" value="{{ class_basename($tool); }}"
                                    name="status-change-2">
                                <button type="submit" class="btn btn-outline-warning"><i
                                        class="fa-solid fa-circle-info"></i></button>
                            </form>
                        </span></th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p>No se encontraron herramientas</p>
    @endif
    <br><br>

</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('.ajax-form').on('submit', function (event) {
            event.preventDefault();
            const form = $(this);
            const url = form.attr('action');
            const method = form.attr('method');
            const data = form.serialize();

            $.ajax({
                url: url,
                method: method,
                data: data,
                success: function (response) {
                    const dataSearchParams= new URLSearchParams(data);
                    const idInput = dataSearchParams.get('status-change');
                    const idInput2 = dataSearchParams.get('status-change-2');
                    const newHomeId = response.new_home_id;
                    const thId = form.data('th-id');
                    const th = $('#status-th-' + idInput + '-' + idInput2);

                    if (newHomeId === 2) {
                        th.html('<a href="#" class="btn btn-outline-success"><i class="fa-regular fa-circle-check"></i></a>');
                    } else if (newHomeId === 1) {
                        th.html('<a href="#" class="btn btn-outline-danger"><i class="fa-regular fa-circle-xmark"></i></a>');
                    } else {
                        th.html('<a href="#" class="btn btn-outline-info"><i class="fa-solid fa-circle-info"></i></a>');
                    }

                },
                error: function (xhr, textStatus, errorThrown) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
@endsection