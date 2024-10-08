<x-guest-layout>
  @section('title','Register')
   @section('form')
   <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 py-2">
        <form method="POST" action="{{ route('register')}}" >
        @csrf
        <H3 style="text-align:center; margin-bottom:40px; font-weight:bold; color: #650f2c; font-style:italic; font-size:35px;">Register</H3>
          <div data-mdb-input-init class="form-outline mb-4">
          <x-input-label for="name" :value="__('Name')" />
          <x-text-input id="name" class="form-control form-control-lg" type="name" name="name" :value="old('name')" required autofocus autocomplete="name" />
          <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>    

          <div data-mdb-input-init class="form-outline mb-4">
         
          <x-input-label for="email" :value="__('Email')" />
          <x-text-input id="email" class="form-control form-control-lg" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>

          
          <div data-mdb-input-init class="form-outline mb-3">
          <x-input-label for="password" :value="__('Password')" />
          <x-text-input id="password" class="form-control form-control-lg"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
         <x-input-error :messages="$errors->get('password')" class="mt-2" />
          
          </div>

          <div data-mdb-input-init class="form-outline mb-3">
          <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="form-control form-control-lg"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

        

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn  btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem; background-color: #650f2c; color:white;  width:100%;">Register</button><!-- Checkbox -->
              <p class="small fw-bold mt-2 pt-1 mb-3 ">Sudah punya akun? <a href="{{ route('login')}}"
              class="link-danger">Login</a></p>
          </div>

        </form>
      </div>
   @endsection
</x-guest-layout>
