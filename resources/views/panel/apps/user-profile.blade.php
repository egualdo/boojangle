@extends('panel.layouts.simple.master')
@section('title', 'User Profile')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>User Profile</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Users</li>
<li class="breadcrumb-item active">User Profile</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="edit-profile">
		<div class="row">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-header">
						{{-- <h4 class="card-title mb-0">My Profile</h4> --}}
						<div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
					</div>
					<div class="card-body">
						<form>
							<div class="row mb-2">
								<div class="profile-title">
									<div class="media">
										<img class="img-100 rounded-circle" alt="" src="{{ asset('assets/images/user/7.jpg')}}">
										<div class="media-body">
											<h3 class="mb-1"> {{ Auth::user()->name }}</h3>
											<p>{{ Auth::user()->role->name }}</p>
										</div>
									</div>
								</div>
							</div>

							<div class="mb-3">
								<label class="form-label">Email-Address</label>
								<input class="form-control" placeholder=" {{ Auth::user()->email }}" disabled>
							</div>

						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
@endsection

@section('script')

@endsection
