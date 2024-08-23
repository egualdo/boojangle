@extends('panel.layouts.simple.master')
@section('title', 'Edit Profile')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>{{ __('Editar usuario') }}</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item"> {{__('Users')}}</li>
<li class="breadcrumb-item active">{{__('Edit')}} {{__('Users')}}</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="edit-profile">
		<div class="row">

			<div class="col-xl-12">
                <form method="POST" action="{{ route('users.update', $user->id) }}">
                    @csrf
                    @method('PUT')

					<div class="card-header">
						{{-- <h4 class="card-title mb-0">{{ __('Editar usuario') }}</h4> --}}
						<div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
					</div>
					<div class="card-body">
						<div class="row">
                            <div class="col-md-12">
								<div class="mb-3">
									<label class="form-label" for="name">{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

								</div>
							</div>
                            <div class="col-md-12">
								<div class="mb-3">

                        <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>


                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
								</div>
							</div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                <label  for="role" class="form-label">Rol:</label>
                                <select class="form-control" name="role_id">
                                    @foreach ($roles as $role)
            <option value="{{ $role->id }}" @if ($user->role_id == $role->id) selected @endif>{{ $role->name }}</option>
        @endforeach
                                </select>
                            </div>
                            </div>
							<div class="col-md-12">
								<div class="mb-3">
                                <label for="password" class="cform-label">{{ __('Password') }}</label>


                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

								</div>
							</div>
                            <div class="col-md-12">
								<div class="mb-3">
                                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>


                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">

								</div>
							</div>
					</div>					</div>
					<div class="card-footer text-end">
						<button class="btn btn-primary" type="submit"> {{ __('Edit') }}</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>
@endsection

@section('script')

@endsection
