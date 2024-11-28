<div class="card-body">
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
        {{ __('Profil Saya') }}
    </h2>
    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
        {{ __("Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun") }}
    </p>                            

    <form method="POST" action="{{ route('user.profile.update', $user->id) }}" class="d-flex"  enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <input type="hidden" name="role" value="{{ old('role', $user->role ?? 0) }}">

        <!-- Form Section -->
        <div class="flex-fill">
            <div class="row mb-3">
                <div class="col-sm-2 mb-0">
                    <x-input-label for="name" :value="__('Name')"></x-input-label>
                </div>
                <div class="col-sm-9 text-secondary">
                    <x-text-input type="text" id="name" name="name" class="form-control" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-2">
                    <x-input-label for="email" :value="__('Email')"></x-input-label>
                </div>
                <div class="col-sm-9 text-secondary">
                    <x-text-input type="email" id="email" name="email" class="form-control" :value="old('email', $user->email)" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>
            </div>

            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-9 text-secondary">
                    <x-dark-button>{{ __('Save') }}</x-dark-button>
                </div>
            </div>
        </div>
        
        <div class="ml-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body ">
				<img id="preview" src="{{ asset('storage/' . Auth::user()->profile_image) }}">
                    <div class="text-center mt-5">
                    <input type="file" class="form-control d-none" id="image" name="profile_image" onchange="previewImage(event)">
                    <label for="image" class="custom-file-label" style="cursor: pointer;">
                        <div class="btn btn-dark">Pilih Gambar</div>
                    </label>
                    </div>
					
                </div>
            </div>
        </div>
    </form>
</div>

<script>
function previewImage(event) {
    const image = document.getElementById('preview');
    image.src = URL.createObjectURL(event.target.files[0]);
}
</script>
