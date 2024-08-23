@extends('panel.layouts.simple.master')
@section('title', 'City Cards')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>{{__('List')}} {{__('Cities')}}</h3> <br>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">{{__('Cities')}}</li>
<li class="breadcrumb-item active">{{__('Cities')}} index</li>
@endsection

@section('content')
<div class="container-fluid">
    <h4>{{__('New Element')}} <a href="{{ route('cities.create') }}">{{__('here.')}}</a></h4>
	<div class="row">
         @foreach ($cities as $city)
		<div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
			<div class="card custom-card">
				<div class="text-center profile-details">
					<h4>{{ $city->name }}</h4>
				</div>
				<div class="card-footer row">

					<div class="col-4 col-sm-4">
						<h6>ID</h6>
						<h3><span class="counter">{{ $city->id }}</span></h3>
					</div>
                    <div class="col-4 col-sm-4">
						<h6>{{__('Edit')}}</h6>
						<h3 class="counter"><a href="{{ route('cities.edit', $city->id) }}" class="btn btn-outline-primary"><i data-feather="edit-2"></i></a></h3>
					</div>
					<div class="col-4 col-sm-4">
						<h6>{{__('Delete')}}</h6>
						<h3><span class="counter">  <form action="{{ route('cities.destroy', $city->id) }}" method="POST" style="display: inline-block">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta ciudad?')"><i data-feather="trash-2"></i></button>
                    </form></span></h3>
					</div>
				</div>
			</div>
		</div>
                      @endforeach

	</div>
</div>
@endsection

@section('script')

@endsection
