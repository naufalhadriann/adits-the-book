@extends('user.layouts.app')
@section('title','Profile')
@section('content')


<div class="container">
		<div class="main-body mt-5">
			<div class="row">
				<div class="col-lg-4 " >
					@include('user.profile.partials.aside')
					</div>
				<div class="col-lg-8">
					<div class="card">
                    @include('user.profile.partials.update-password-form')
                </div>
					</div>
					<div class="row mt-3">
					</div>
				</div>
			</div>
			@include('sweetalert::alert')

		</div>
	</div>

@endsection
