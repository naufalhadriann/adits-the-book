@extends('user.layouts.app')
@section('title','Profile')
@section('content')


<div class="container">
		<div class="main-body mt-4">
			<div class="row">
				<div class="col-lg-4 " >
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<img src="{{ Auth::user()->profile_image}}" alt="Admin" class="rounded-circle p-1 " width="110">
								<div class="mt-3">
									<h4>{{Auth::user()->name}}</h4>
								
									<button class="btn">Edit Photo</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="card">
                    @include('user.profile.partials.update-profile-information-form')
                </div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12">
							<div class="card">
                            @include('user.profile.partials.update-password-form')
							</div>
						</div>
					</div>
				</div>
			</div>
			@include('sweetalert::alert')

		</div>
	</div>
@endsection
