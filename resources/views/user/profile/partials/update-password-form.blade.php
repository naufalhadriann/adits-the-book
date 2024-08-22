<div class="card-body">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
		<form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')
									<div class="row mb-2">
								<div class="col-sm-3">
									<x-input-label class="mb-0" for="update_password_current_password" :value="__('Current Password')" />
								</div>
								<div class="col-sm-9 text-secondary">
									<x-text-input id="update_password_current_password" name="currenct_password" type="password"  class="form-control" autocomplete="current-password"/>
									<x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2"/>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<x-input-label class="mb-0" for="update_password_password" :value="__('New Password')" />
								</div>
								<div class="col-sm-9 text-secondary">
								<x-text-input type="password" class="form-control" id="update_password_password" name="password" autocomplete="new-password"/>
								<x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<x-input-label for="update_password_password_confirmation" class="mb-0" :value="__('Confirm Password')" />
								</div>
								<div class="col-sm-9 text-secondary">
									<x-text-input type="password" id="update_password_password_confirmation" name="password_confirmation" class="form-control"  autocomplete="new-password"/>
									<x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2"/>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
                                    <x-dark-button>Save Changes</x-dark-button>
								</div>
								</div>
								</form>