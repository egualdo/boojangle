@extends('panel.layouts.simple.master')
@section('title', 'Edit Countries')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3> {{__('Edit')}} {{__('Countries')}}</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">{{__('Countries')}}</li>
<li class="breadcrumb-item active"> {{__('Create')}} {{__('Countries')}}</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="edit-profile">
		<div class="row">

			<div class="col-xl-12">
				     <form method="POST" action="{{ route('countries.update', $country->id) }}">
                    @csrf
                    @method('PUT')

					<div class="card-header">
						{{-- <h4 class="card-title mb-0">{{ __('Edit New Country') }}</h4> --}}
						<div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
					</div>
					<div class="card-body">
						<div class="row">
                            <div class="col-md-12">
								<div class="mb-3">
									<label class="form-label" for="name">{{ __('Name') }}</label>
                                     <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $country->name) }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

								</div>
							</div>

					</div>
					</div>
					<div class="card-footer text-end">
						<button class="btn btn-primary" type="submit">{{ __('Edit') }}</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>
@endsection

@section('script')

@endsection
