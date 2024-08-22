
<div class="card-body">
<h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>
<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>							
    

    <form method="POST" action="{{ route('profile.update' , $user->id) }}" >
        @csrf
        @method('PATCH')
                         <div class="row mb-3">
                         <input type="hidden" name="role" value="{{ old('role', $user->role ?? 0) }}">

                            <div class="col-sm-3 mb-0">
									<x-input-label  for="name" :value="__('Name')"></x-input-label>
								</div>
								<div class="col-sm-9 text-secondary">
									<x-text-input type="text" id="name" name="name" class="form-control" :value="old('name', $user->name)" required autofocus autocomplete="name">
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" /></x-text-input>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
                                <x-input-label  for="email" :value="__('Emaill')"></x-input-label>
								</div>
								<div class="col-sm-9 text-secondary">
									<x-text-input type="text"  id="email" name="email" class="form-control" :value="old('name', $user->email)"></x-text-input>
                                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
								</div>
							</div>
							<div>
        </div>
        
        <div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
                                    <x-dark-button>{{ __('Save') }}</x-dark-button>
								</div>
								</div>
    </form>
